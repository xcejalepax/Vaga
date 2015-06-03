<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Aplikacija za merenje</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <? if (isset($user)) { ?>
                    <li><a href="/account/edit">Izmeni Nalog</a></li>
                    <li><a href="/merenja">Novo Merenje</a></li>
                    <li><a href="/pregled">Lista Merenja</a></li>
                    <li><a href="/graph">Grafikon</a></li>
                    <li><a href="/login/logout">Logout</a></li>
                <? } ?>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>