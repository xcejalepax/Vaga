(function(window) {
    
    window.SpacedTimeAxis = function(args) {

        var self = this;

        this.graph = args.graph;
        this.elements = [];
        this.ticksTreatment = args.ticksTreatment || 'plain';
        this.fixedTimeUnit = args.timeUnit;

        var time = args.timeFixture || new Rickshaw.Fixtures.Time();

        this.appropriateTimeUnit = function() {

            var unit;
            var units = time.units;

            var domain = this.graph.x.domain();
            var rangeSeconds = domain[1] - domain[0];

            units.forEach( function(u) {
                if (Math.floor(rangeSeconds / u.seconds) >= 2) {
                    unit = unit || u;
                }
            } );

            return (unit || time.units[time.units.length - 1]);
        };
        this.tickOffsets = function() {
            var domain = this.graph.x.domain();
            var unit = this.fixedTimeUnit || this.appropriateTimeUnit();

            var tickSpacing = args.tickSpacing || unit.seconds;
            var count = Math.ceil((domain[1] - domain[0]) / tickSpacing);

            var runningTick = domain[0];
            var offsets = [];

            for (var i = 0; i < count; i++) {
                var tickValue = time.ceil(runningTick, unit);
                runningTick = tickValue + tickSpacing;

                offsets.push( { value: tickValue, unit: unit } );
            }
            return offsets;
        };

        this.render = function() {

            this.elements.forEach( function(e) {
                e.parentNode.removeChild(e);
            } );

            this.elements = [];

            var offsets = this.tickOffsets();

            offsets.forEach( function(o) {

                if (self.graph.x(o.value) > self.graph.x.range()[1]) return;

                var element = document.createElement('div');
                element.style.left = self.graph.x(o.value) + 'px';
                element.classList.add('x_tick');
                element.classList.add(self.ticksTreatment);

                var title = document.createElement('div');
                title.classList.add('title');
                title.innerHTML = o.unit.formatter(new Date(o.value * 1000));
                element.appendChild(title);

                self.graph.element.appendChild(element);
                self.elements.push(element);

            } );
        };

        this.graph.onUpdate( function() { self.render() } );
    };

    window.ClickDetail = Rickshaw.Class.create({
        initialize: function(args) {
            this.onPointClick = args.onPointClick || function(){};
            var graph = this.graph = args.graph;
            this.graph.element.addEventListener(
                'click',
                function(e) {
                    if (this.nearestPoint) {
                        this.onPointClick(this.nearestPoint);
                    }
                }.bind(this),
                false
            );
            this.graph.element.addEventListener(
                'mousemove',
                function(e) {
                    this.update(e);
                }.bind(this),
                false
            );
        },
        update: function(e) {
            e = e || this.lastEvent;
            if (!e) return;
            this.lastEvent = e;
            this.nearestPoint = false;

            if (!e.target.nodeName.match(/^(path|svg|rect|circle)$/)) return;

            var graph = this.graph;

            var eventX = e.offsetX || e.layerX;
            var eventY = e.offsetY || e.layerY;

            var j = 0;
            var nearestPoint;

            this.graph.series.active().forEach( function(series) {

                var data = this.graph.stackedData[j++];

                if (!data.length)
                    return;

                var domainX = graph.x.invert(eventX);

                var domainIndexScale = d3.scale.linear()
                    .domain([data[0].x, data.slice(-1)[0].x])
                    .range([0, data.length - 1]);

                var approximateIndex = Math.round(domainIndexScale(domainX));
                if (approximateIndex == data.length - 1) approximateIndex--;

                var dataIndex = Math.min(approximateIndex || 0, data.length - 1);

                for (var i = approximateIndex; i < data.length - 1;) {

                    if (!data[i] || !data[i + 1]) break;

                    if (data[i].x <= domainX && data[i + 1].x > domainX) {
                        dataIndex = Math.abs(domainX - data[i].x) < Math.abs(domainX - data[i + 1].x) ? i : i + 1;
                        break;
                    }

                    if (data[i + 1].x <= domainX) { i++ } else { i-- }
                }

                if (dataIndex < 0) dataIndex = 0;
                var value = data[dataIndex];

                var distance = Math.sqrt(
                    Math.pow(Math.abs(graph.x(value.x) - eventX), 2) +
                    Math.pow(Math.abs(graph.y(value.y + value.y0) - eventY), 2)
                );

                var point = {
                    series: series,
                    value: value,
                    distance: distance,
                    order: j,
                    name: series.name
                };

                if (!nearestPoint || distance < nearestPoint.distance) {
                    nearestPoint = point;
                }

            }, this );

            if (!nearestPoint) return;

            nearestPoint.active = true;
            this.nearestPoint = nearestPoint;
        }
    });

})(window);

