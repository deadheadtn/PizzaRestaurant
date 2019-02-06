<?php $image="false"; ?>
<script type="text/javascript" language="javascript"  >
var k=0;
function changename() {
document.getElementById("nom").innerHTML='<input  class="form-control" placeholder="Entrer le nouveau nom du produit" name="nomproduit" />&nbsp;&nbsp;&nbsp;&nbsp; <a href="#" onclick="annulernom();testbutton()">Annuler</a>';

k++;
}
function changeprice() {
document.getElementById("price").innerHTML='<input type="number" step="0.1" class="form-control" placeholder="Entrer le nouveau prix du produit" name="prixproduit" />&nbsp;&nbsp;&nbsp;&nbsp; <a href="#" onclick="annulerprice();testbutton()">Annuler</a>';

k++;
}

function changeref() {
document.getElementById("ref").innerHTML='<input class="form-control" placeholder="Entrer la nouvelle reference du produit" name="refproduit" />&nbsp;&nbsp;&nbsp;&nbsp; <a href="#" onclick="annulerref();testbutton()">Annuler</a>';

k++
}
function changecatg() {
document.getElementById("catg").innerHTML='<input class="form-control" placeholder="Entrer la nouvelle categorie du produit" name="catgproduit" />&nbsp;&nbsp;&nbsp;&nbsp; <a href="#" onclick="annulercatg();testbutton()">Annuler</a>';

k++;
}
function changedesc() {
document.getElementById("desc").innerHTML='<input class="form-control" placeholder="Entrer la nouvelle description du produit" name="descproduit" />&nbsp;&nbsp;&nbsp;&nbsp; <a href="#" onclick="annulerdesc();testbutton()">Annuler</a>';

k++;
}
function changeimg() {
document.getElementById("img").innerHTML='<input type="file" name="photo"  class="form-control"  id="photo"/>&nbsp;&nbsp;&nbsp;&nbsp; <a href="#" onclick="annulerimg();testbutton()">Annuler</a>';
<?php $image="true"; ?>
k++;
}
function annulernom() {
	document.getElementById("nom").innerHTML='<label >Nom du produit : <?php echo $produit->nom;?> </label>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onclick="changename();testbutton()">Modifier</a>';
	
	k--;
}
function annulerimg() {
	document.getElementById("img").innerHTML='<label>Image du produit :<img  src="../../<?php echo $produit->image;?>" height="200" width="200" id="imageproduit"  /></label>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onclick="changeimg();testbutton()">Modifier</a>' ;
	<?php $image="false"; ?>
	k--;
}
function annulerdesc() {
	document.getElementById("desc").innerHTML='  <label>Description du produit : <?php echo $produit->description;?>  </label>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onclick="changedesc();testbutton()">Modifier</a>';
	
	k--;
}
function annulerprice() {
	document.getElementById("price").innerHTML='<label>Prix du produit : <?php echo $produit->prix;?> TND </label>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onclick="changeprice();testbutton()">Modifier</a>';

	k--;
}
function annulerref() {
	document.getElementById("ref").innerHTML='<label >Reference du produit : <?php echo $produit->reference;?> </label> &nbsp;&nbsp;&nbsp;&nbsp; <a href="#" onclick="changeref();testbutton()">Modifier</a>';
	
	k--;
}
function annulercatg() {
	document.getElementById("catg").innerHTML='<label >categorie du produit : <?php echo $produit->categorie;?> </label> &nbsp;&nbsp;&nbsp;&nbsp; <a href="#" onclick="changecatg();testbutton()">Modifier</a>';
	
	k--;
}
function showbutton() {
document.getElementById("button").innerHTML='<button type="submit"  class="btn btn-default" >Submit Button</button> <button type="reset" class="btn btn-default">Reset Button</button>';	
}
function hidebutton() {
	document.getElementById("button").innerHTML='';
}
function testbutton(){
	if(k==0){
		hidebutton();
	}else {
		showbutton();
	
	}
}


</script>
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Basic Form Elements
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action='?controller=produits&action=modifier&id=<?php echo $produit->id_produit?>&catg=<?php echo $produit->categorie ?>&img=<?php echo $image; ?>'  method="post" enctype="multipart/form-data">     
<div class="form-group" >
                                            <label >id du produit : <?php echo $produit->id_produit;?> </label>
                                           
                                        </div> 									
                                        <div class="form-group" id="nom">
                                            <label >Nom du produit : <?php echo $produit->nom;?> </label>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onclick="changename();testbutton()">Modifier</a>
                                           
                                        </div>                              
                                        <div class="form-group" id="ref">
                                            <label >Reference du produit : <?php echo $produit->reference;?> </label> &nbsp;&nbsp;&nbsp;&nbsp; <a href="#" onclick="changeref();testbutton()">Modifier</a>
                                           
                                        </div>
										<div class="form-group" id="catg">
                                            <label >categorie du produit : <?php echo $produit->categorie;?> </label> &nbsp;&nbsp;&nbsp;&nbsp; <a href="#?" onclick="changecatg();testbutton()">Modifier</a>
                                           
                                        </div>
										<div class="form-group" id="price">
                                            <label>Prix du produit : <?php  echo $produit->prix;?> TND </label>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onclick="changeprice();testbutton()">Modifier</a>
                                           
                                        </div>
										<div class="form-group" id="img">
                                            <label>Image du produit :
										<img  src="../../<?php  echo $produit->image;?> " height="200" width="200" id="imageproduit"/>
										</label>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#?" onclick="changeimg();testbutton()">Modifier</a>
										 </div>
                                        <div class="form-group" id="desc">
                                            <label>Description du produit : <?php echo $produit->description;?>  </label>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#" onclick='changedesc();testbutton()'>Modifier</a>
                                           
                                        </div>

                                        <br><br>
                                         <div class="form-group" id="button">
                                        
										</div>
                                    </form>
                                    <div align="right">
                                    <a href="?controller=produits&action=supprimer&id=<?php echo $produit->id_produit?>">Supprimer</a>
                                    </div>
                                </div>
								</div>
								</div>
								</div>
								</div>