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

<?php $this->load->view('partials/navbar')?>

        <div class="container form-join">

            <div class="starter-template">
                <h1>Kreirajte novi nalog</h1>
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
                <form class="form-horizontal" role="form" action="/join/submit" method="post">
                    <div class="form-group">
                        <label for="ime" class="col-sm-4 control-label">Ime</label>
                        <div class="col-sm-8">
                            <input type="text" value="<?php echo set_value('ime'); ?>" class="form-control" name="ime" id="ime" placeholder="Unesite ime" min="2" max="15" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="prezime" class="col-sm-4 control-label">Prezime</label>
                        <div class="col-sm-8">
                            <input type="text" value="<?php echo set_value('prezime'); ?>" class="form-control" name="prezime" id="prezime" placeholder="Unesite prezime" min="2" max="25" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="korisnicko_ime" class="col-sm-4 control-label">Korisničko Ime</label>
                        <div class="col-sm-8">
                            <input type="text" value="<?php echo set_value('korisnicko_ime'); ?>" class="form-control" name="korisnicko_ime" id="korisnicko_ime" placeholder="Unesite korisnicko ime" min="8" max="20" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lozinka" class="col-sm-4 control-label">Lozinka</label>
                        <div class="col-sm-8">
                            <input type="password" value="<?php echo set_value('lozinka'); ?>" class="form-control" name="lozinka" id="lozinka" placeholder="Unesite lozinku" min="8" max="20" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="potvrda_lozinke" class="col-sm-4 control-label">Potvrda Lozinke</label>
                        <div class="col-sm-8">
                            <input type="password" value="<?php echo set_value('potvrda_lozinke'); ?>" class="form-control" name="potvrda_lozinke" id="potvrda_lozinke" placeholder="Potvrdite lozinku" min="8" max="20" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="datum_rodjenja" class="col-sm-4 control-label">Datum rodjenja</label>
                        <div class="col-sm-8">
                            <input type="date" value="<?php echo set_value('datum_rodjenja'); ?>" class="form-control" name="datum_rodjenja" id="datum_rodjenja" placeholder="Unesite datum rodjenja" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="visina" class="col-sm-4 control-label">Visina</label>
                        <div class="col-sm-8">
                            <input type="number" value="<?php echo set_value('visina'); ?>" class="form-control" name="visina" id="visina" placeholder="Unesite visinu" step="0.01" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pol" class="col-sm-4 control-label">Pol</label>
                        <div class="col-sm-8">
                            <select class="form-control" name="pol" value="<?php echo set_value('pol'); ?>">
                                <option value="male">male</option>
                                <option value="female">female</option>
                            </select>
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
