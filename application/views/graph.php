<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>Starter Template for Bootstrap</title>

        <!-- Bootstrap core CSS -->
        <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="/assets/css/theme.css" rel="stylesheet">

        <link href="/assets/css/rickshaw.min.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <script src="/assets/js/d3.v3.min.js"></script>
        <script src="/assets/js/rickshaw.js"></script>
        <script src="/assets/js/my.rickshaw.js"></script>
        <script src="/assets/js/my.rickshaw.js"></script>
    </head>

    <body>

        <?php $this->load->view('partials/navbar') ?>

        <div class="container">

            <div class="">
                <h1>Statistika</h1>
                <?php if (isset($errors)) { ?>
                    <div class="errors alert alert-danger">
                        <ul>
                            <?php foreach ($errors as $field_name => $error) { ?>
                                <li>
                                    <?php echo $error ?>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>



                <? $axis_width = 40; ?>
                <div class="pp">
                    <div id="graph"></div>
                    <div id="legend" style="width:150px;"></div>
                </div>

            </div>

        </div><!-- /.container -->
        <? if (count($series) && isset($series[0]['data']) && count($series[0]['data'])) { ?>

            <script src="/assets/js/jquery.min.js"></script>
            <script src="/assets/js/jquery-ui.min.js"></script>
            <script src="/assets/js/bootstrap.min.js"></script>
            <script type="text/javascript">
                jQuery(function() {
                        
                    /**
                     * DateFormat 
                     * 
                     * @access public
                     * @return void
                     */
                    var DateFormat = {
                        formatSymbols: { 
                            y:['getFullYear', null],
                            m:['getMonth',  function(v) { return ("0"+(v+1)).substr(-2,2)}],
                            n:['getMonth',  function(v) { return ["Jan","Feb","Mar","Apr","Maj","Jun","Jul","Avg","Sep","Okt","Nov","Dec"][v]}],
                            d:['getDate',   function(v) { return ("0"+v).substr(-2,2)}], 
                            w:['getDay',    function(v) { return ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"][v]}],
                            H:['getHours',  function(v) { return ("0"+v).substr(-2,2)}],
                            M:['getMinutes',function(v) { return ("0"+v).substr(-2,2)}],
                            S:['getSeconds',function(v) { return ("0"+v).substr(-2,2)}],
                            i:['toISOString', null]
                        }
                        ,format: function(ts, fmt) {
                            var formatSymbols = DateFormat.formatSymbols;
                            var date = ts;
                            if (!(date instanceof Date)) {
                                date = new Date(date * 1000);
                            }
                            var dateTxt = fmt.replace(/%(.)/g, function(m, p) {
                                var rv = date[(formatSymbols[p])[0]]();
                                if (formatSymbols[p][1] != null) {
                                    rv = formatSymbols[p][1](rv);
                                }
                                return rv
                            });

                            return dateTxt
                        }
                    }

                    var series = <?= json_encode($series) ?>;

                    var graph = new Rickshaw.Graph({
                        element: document.getElementById("graph"),
                        height: <?= $height ?>,
                        renderer: 'line',
                        series: series
                    });
                    var detail = new Rickshaw.Graph.HoverDetail({
                        graph: graph,
                        xFormatter: function(x) {
                            return DateFormat.format(new Date(x*1000), '%y-%m-%d');
                        },
                        yFormatter: function(y) {
                            return y;
                        }
                    });
                    var click = new ClickDetail({
                        graph: graph,
                        onPointClick: function(point) {
                            var d = DateFormat.format(new Date(point.value.x*1000), '%y-%m-%d');
                            console.log(d);
                        }
                    });
                    var yAxis = new Rickshaw.Graph.Axis.Y({
                        graph: graph
                    });
                    yAxis.render();

                    var time = new Rickshaw.Fixtures.Time();
                    var timeUnit = time.unit('date');
                    var xAxis = new SpacedTimeAxis({
                        graph: graph,
                        timeUnit: timeUnit
                    });
                    xAxis.render();

                    var legend = new Rickshaw.Graph.Legend({
                        graph: graph,
                        element: document.querySelector('#legend')
                    });
                    var shelving = new Rickshaw.Graph.Behavior.Series.Toggle({
                        graph: graph,
                        legend: legend
                    });
                    var highlighter = new Rickshaw.Graph.Behavior.Series.Highlight({
                        graph: graph,
                        legend: legend
                    });
                    var order = new Rickshaw.Graph.Behavior.Series.Order({
                        graph: graph,
                        legend: legend
                    });


                    graph.render();
                });
            </script>
        <? } ?>

    </body>
</html>
