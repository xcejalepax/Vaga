
<? 
get_instance()->assets->add_css_file('djole.css');

$this->add_css_files(array(
    'bootstrap.min.css', 'theme.css'
)); 
$this->add_js_files(array(
    'jquery.min.js', 'bootstrap.min.js'
), Assets::BODY_END); ?>
<?php $this->load->view('partials/navbar')?>

        <div class="container form-join">

            <div class="starter-template">
                <h1>Izmenite nalog</h1>
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

                <form class="form-horizontal" role="form" action="/account/submit" method="post">
                    <div class="form-group">
                        <label for="ime" class="col-sm-4 control-label">Ime</label>
                        <div class="col-sm-8">
                            <input type="text" value="<?php echo set_value('ime', trim($user['ime']) ); ?>" class="form-control" name="ime" id="ime"  placeholder="Unesite ime" min="2" max="15" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="prezime" class="col-sm-4 control-label">Prezime</label>
                        <div class="col-sm-8">
                            <input type="text" value="<?php echo set_value('prezime', trim($user['prezime'])); ?>" class="form-control" name="prezime" id="prezime"  placeholder="Unesite prezime" min="2" max="25" required>
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
                            <input type="password" value="" class="form-control" name="potvrda_lozinke" id="potvrda_lozinke" placeholder="Potvrdite lozinku" min="8" max="20" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="datum_rodjenja" class="col-sm-4 control-label">Datum rodjenja</label>
                        <div class="col-sm-8">
                            <input type="date" value="<?php echo set_value('datum_rodjenja', trim($user['datum_rodjenja'])); ?>" class="form-control" name="datum_rodjenja" id="datum_rodjenja" placeholder="Unesite datum rodjenja" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="visina" class="col-sm-4 control-label">Visina</label>
                        <div class="col-sm-8">
                            <input type="number" value="<?php echo set_value('visina', trim($user['visina'])); ?>" class="form-control" name="visina" id="visina"  placeholder="Unesite visinu" step="0.01" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pol" class="col-sm-4 control-label">Pol</label>
                        <div class="col-sm-8">
                            
                            <select class="form-control" name="pol">
                                <option value="male" <?php echo 'Male' == $user['pol'] ? "selected='selected'" : "" ?>>male</option>
                                <option value="female" <?php echo 'Female' == $user['pol'] ? "selected='selected'" : "" ?>>female</option>
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
