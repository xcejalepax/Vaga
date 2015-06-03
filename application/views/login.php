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
<?php $this->load->view('partials/navbar'); ?>

    <div class="container form-login">

      <div class="starter-template">
        <h1>Prijavi se</h1>
        <?php if (isset($errors)) { ?>
        <div class="errors alert alert-danger">
            <ul>
            <?php foreach ($errors as $error) { ?>
                <li><?php echo $error?></li>
            <?php } ?>
            </ul>
        </div>
        <?php } ?>
        <form class="form-horizontal" role="form" action="/login/submit" method="post">
  <div class="form-group">
    <label for="korisnicko_ime" class="col-sm-4 control-label">Korisničko Ime</label>
    <div class="col-sm-8">
      <input type="text" class="form-control" id="korisnicko_ime" name="korisnicko_ime" placeholder="Unesite korisnicko ime" min="8" max="20" required>
    </div>
  </div>
   <div class="form-group">
    <label for="lozinka" class="col-sm-4 control-label">Lozinka</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="lozinka" name="lozinka" placeholder="Unesite lozinku" min="8" max="20" required>
    </div>
  </div>


  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
      <button type="submit" class="btn btn-default">OK</button>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-8">
      <a class="btn" href="/join" class="btn btn-default">Kreiraj Nalog</a>
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
