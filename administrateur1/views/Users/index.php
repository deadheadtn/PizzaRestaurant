<?php 

require_once('models/User.php'); ?>
  <div class="col-lg-12">
                    <h1 class="page-header">Affichage Users</h1>
                </div> 
                 <a href="?controller=Users&action=formulaire">Ajouter un admin</a>

<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
									
                                        <th>Id</th>
                                        <th>Username</th>
										<th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Sexe</th>
                                        <th>Date de naissance</th>
                                         <th>Adresse</th>
                                          <th>CIN</th>
                                           <th>Numéro de téléphone</th>
                                           <th>Email</th>
                                            <th>Nombre de points</th>
                                            <th>Status</th>

                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach($Users as $User) { ?>
								
                                    <tr class="odd gradeX" >
                                     <?php
                                            if($User->privilege==0)
                                            {
                                            ?>
									
                                    <?php
                                        }
                                        else {
                                            ?>
                                        <td><?php echo $User->id_user; ?></td>
                                        <?php }?>
                                        <td class="center"><?php echo $User->username; ?></td>
                                        <td class="center"><?php echo $User->nom; ?></td>
                                        <td class="center"><?php echo $User->prenom; ?></td>
										<td class="center"><?php echo $User->sexe; ?></td>
                                        <td class="center"><?php echo $User->date_naissance; ?></td>
                                        <td class="center"><?php echo $User->adresse; ?></td>
                                        <td class="center"><?php echo $User->CIN; ?></td>
                                        <td class="center"><?php echo $User->num_tel; ?></td>
                                        <td class="center"><?php echo $User->email; ?></td>
                                            <?php
                                            if($User->privilege==0)
                                            {
                                            ?>
                                        <td class="center"><?php echo $User->nbr_point; ?></td>
										     <?php
                                            }
                                        else {
                                            ?>
                                        <td class="center">Admin</td>
                                        <?php }?>

                                        <td class="center"><?php echo $User->status; ?></td>
                                    </tr>
									
                                   <?php } ?>

                                </tbody>
                            </table>
                           