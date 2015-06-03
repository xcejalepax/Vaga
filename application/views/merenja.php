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

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>

        <?php $this->load->view('partials/navbar') ?>

        <div class="container form-join">

            <div class="starter-template">
                <h1>Merenje</h1>
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

                <form class="form-horizontal" role="form" action="/merenja/submit" method="post">

                    <input type="hidden" value="<?php echo $action ?>" class="form-control" name="action" >
                    
                    <?php if ($action == 'edit'){ ?>
                        <input type="hidden" value="<?php echo $merenje['id_merenja'] ?>" class="form-control" name="id_merenja" >
                    <?php }?>

                    <div class="form-group">
                        <label for="tezina" class="col-sm-4 control-label">Kilogrami</label>
                        <div class="col-sm-8">
                            <input type="number" value="<?php echo set_value('tezina', trim($merenje['tezina'])); ?>" class="form-control" name="tezina" placeholder="Unesite kilograme" step="0.01" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="masti" class="col-sm-4 control-label">Masti</label>
                        <div class="col-sm-8">
                            <input type="number" value="<?php echo set_value('masti', trim($merenje['masti'])); ?>" class="form-control" name="masti" placeholder="Unesite procenat masti" step="0.01" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="misici" class="col-sm-4 control-label">Mišići</label>
                        <div class="col-sm-8">
                            <input type="number" value="<?php echo set_value('misici', trim($merenje['misici'])); ?>" class="form-control" name="misici" placeholder="Unesite procenat mišića" step="0.01" required>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="voda" class="col-sm-4 control-label">Voda</label>
                        <div class="col-sm-8">
                            <input type="number" value="<?php echo set_value('voda', trim($merenje['voda'])); ?>" class="form-control" name="voda" placeholder="Unesite procenat vode" step="0.01" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kosti" class="col-sm-4 control-label">Kosti</label>
                        <div class="col-sm-8">
                            <input type="number" value="<?php echo set_value('kosti', trim($merenje['kosti'])); ?>" class="form-control" name="kosti" placeholder="Unesite procenat kostiju" step="0.01" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="datum" class="col-sm-4 control-label">Datum</label>
                        <div class="col-sm-8">
                            <input type="date" value="<?php echo set_value('datum', trim($merenje['datum'])); ?>" class="form-control" name="datum" placeholder="Unesite datum" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-8">
                            <button type="submit" class="btn btn-default">Sačuvaj</button>
                        </div>
                    </div>
                </form>
            </div>

        </div><!-- /.container -->


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="/assets/js/jquery.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
    </body>
</html>
