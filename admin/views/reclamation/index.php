<?php 

require_once('models/reclamation.php'); ?>
    
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
									<th>Nom</th>
                                        <th>email</th>
                                    
                                        <th>contenu</th>
										<th>statut</th>
                                        <th>Date de reclamation</th>
                                        <th>Supprimer</th>
                                        <th>repondre</th>

                                    </tr>
                                </thead>
                                <tbody>
								 <?php
                                       foreach ($reclamations as $reclamation) { ?>
                                        <tr>

                                        
                                      
                                        <td><a href="?controller=reclamation&action=show&id=<?php echo $reclamation->getid()?>"><?php echo $reclamation->getname()?></a></td>
                                        <td><?php echo $reclamation->getemail()?></a></td>
                                        <td><?php if(strlen($reclamation->gettexte())<42) {echo $reclamation->gettexte();} else {echo substr($reclamation->gettexte(), 0 , 40);echo "..";}?></td>
                                  
                                        <?php if($reclamation->getstate()==1)
                                            echo "<td> non lu </td>";
                                        else
                                            echo "<td> lu </td>";?>

                                               
                                        <td><?php echo $reclamation->getdatee()?></td>
                                        <td><center><a class="delete" data-confirm="Voulez vous Supprimer cette reclamation?" href="?controller=reclamation&action=supprimer&id=<?php echo $reclamation->getid()?>"> Supprimer </a></center></td>
                                     <td><a href="?controller=mail&action=show&email=<?php echo $reclamation->getemail()?>">repondre</td>
                                        </tr>
                                       
                                   <?php }

                                    ?>

                                </tbody>
                            </table>
                      