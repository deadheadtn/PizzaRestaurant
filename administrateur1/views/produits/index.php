<?php 

require_once('models/produit.php'); ?>
    
<table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
									<th>Nom</th>
                                        <th>Id</th>
                                    
                                        <th>reference</th>
										<th>categorie</th>
                                        <th>quantité</th>
                                        <th>prix</th>
                                    </tr>
                                </thead>
                                <tbody>
								<?php foreach($produits as $produit) { 
                                    if($produit->quantite!=0 && $produit->quantite<100)
                                        {?>
								<tr class="danger" >
                                <?php }else { ?>
                                    <tr  >
                                    <?php } ?>
									<td><a href='?controller=produits&action=show&id=<?php echo $produit->id_produit;?>'><?php echo $produit->nom; ?></a></td>
                                        <td><?php echo $produit->id_produit; ?></td>
                                        
                                        <td><?php echo $produit->reference; ?></td>
										<td><?php echo $produit->categorie; ?></td>
                                        <td class="center"><?php echo $produit->quantite; ?></td>
                                        <td class="center"><?php echo $produit->prix; ?></td>
										
                                    </tr>
									
                                   <?php } ?>

                                </tbody>
                            </table>
                            <a href="?controller=produits&action=formulaire">Ajouter un produit</a>