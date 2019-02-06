
  <div class="col-lg-12">
                    <h1 class="page-header">Ajouter admin</h1>
                </div>  
<div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                      
                        <div class="panel-body">
                            <div class="row">

                                <div class="col-lg-6">
                                    <form role="form" action="?controller=Users&action=ajouter" method="POST">
                                    <h1>Personel information</h1>
                                        <div class="form-group">
                                            <label>Nom: </label>
                                            <input class="form-control" placeholder="Enter votre nom..." name="name" required>
                                            <p class="help-block">Example: John, Nacim, Nejm, Selim, Samih,....</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Prénom: </label>
                                            <input class="form-control" placeholder="Enter votre prénom...." name="prenom" required>
                                            <p class="help-block">Example: Gastli, Khechine, Layeb, Mattar....</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Sexe: </label>
                                            <div class="radio" >
                                                <label>
                                                    <input type="radio" name="sexe" value="Homme" required>Homme
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="sexe" value="Femme">Femme
                                                </label>
                                            </div>
                                            </div>
                                            <div class="form-group">
                                            <label>Date de naissance: </label>
                                            <input class="form-control" type="Date" man="1979-12-31" name="date_naissance" required>

                                        </div>
                                        <div class="form-group">
                                            <label>CIN: </label>
                                            <input class="form-control" type="text" maxlength="8" placeholder="Enter votre CIN..." name="CIN" required>
                                            <p class="help-block">Example: 01234567</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Adresse domicile: </label>
                                            <input class="form-control" type="text"  placeholder="Enter votre adresse domicile..." name="adresse" required>
                                            <p class="help-block">Example: 14, cité Neapolis, Rue des Palimiers, 8000 Nabeul</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Numéro de téléphone: </label>
                                            <input class="form-control" type="tel" maxlength="8" placeholder="Enter votre numéro de téléphone ..." name="num_tel" required>
                                            <p class="help-block">Example: (+216)55938853</p>

                                        </div>
                                      

                                        
                    
                                        <button type="submit" onclick="creer()" class="btn btn-default">Submit Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>
                                    
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <h1>Login information</h1>
                                         <label>Username: </label>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">@</span>
                                            <input type="text" class="form-control" placeholder="Username" name="username" required>
                                        </div>

                                         <div class="form-group">
                                            <label>Adresse mail: </label>
                                            <input class="form-control" type="text" name="email" placeholder="Enter votre adresse mail...."  required>
                                            <p class="form-control-static">email@example.com</p>
                                        </div>
                                        <div id="creercheck"></div>
                                         <div class="form-group">
                                            <label>Mot de passe: </label>
                                            <input class="form-control" type="password" placeholder="Enter votre mot de passe...." name="password" id="pwd" required>
                                        </div>
                                       

                                         <div class="form-group">
                                            <label>Confirmer votre mot de passe: </label>
                                            <input class="form-control" type="password" placeholder="Confirmer votre mot de passe...." name="password_verif" id="pwdverif" required>
                                        </div>
                                          <div class="form-group">
                                            <label>Photo de profil: </label>
                                            <input type="file">
                                        </div>
                                </div>
                                </form>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
    <!-- /#wrapper -->
