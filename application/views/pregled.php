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

        <div class="container">

            <div class="starter-template">
                <h1>Pregled merenja</h1>
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

		
		
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Datum</th>
						<th>Kilogrami</th>
						<th>Masti</th>
						<th>Mišići</th>
						<th>Voda</th>
						<th>Kosti</th> 
					</tr>
				</thead>
				<tbody>
                                    <? if (!empty($results)) { ?>
					<? foreach($results as $row) { ?>
							<tr data-id_merenja="<?= $row['id_merenja'] ?>">
									<td><?= date('Y-m-d', strtotime($row['datum'])) ?></td>
									<td><?= $row['tezina'] ?></td>
									<td><?= $row['masti'] ?></td>
									<td><?= $row['misici'] ?></td>
									<td><?= $row['voda'] ?></td>
									<td><?= $row['kosti'] ?></td>
									<td><a class="btn" data-action="edit">Edit</a><a class="btn" data-action="delete">Delete</a></td>
							</tr>
					<? } ?>
                                    <? } ?>
				</tbody>
			</table>
			
            </div>

        </div><!-- /.container -->


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="/assets/js/jquery.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
    </body>
</html>


<script type="text/javascript">
jQuery(function() {
    // kada se klikne na "a" tag koji ima klasu "btn", a nalazi se u "tr" elementu, izvrsi ovu funkciju
    jQuery('tr a.btn').on('click', function(e) {
        // this se odnosi na elemenat koji je kliknut, znaci "a" tag
        // a primetila si da smo unutar "tr" elementa stavili id_merenja data atribut koji nam cuva id reda iz baze
        // tako da mozemo da pronadjemo "tr" elemenat i procitamo id_merenja iz data atributa
        var id_merenja = jQuery(this).parents('tr').data('id_merenja');

        // hajde da procitamo vrednost iz data-action atributa "a" taga da bismo znali da li je kliknuto Delete ili Edit 
        var action = jQuery(this).data('action');

        switch (action) {
            case 'edit':
                location.href = "/merenja/edit/" + id_merenja;
                break;
            case 'delete':
                if (confirm("Da li ste sigurni da zelite da obrisete ovo merenje?")) {
                    location.href = "/merenja/delete/" + id_merenja;
                }
                break;
        }

        return false;
    });
});
</script>
