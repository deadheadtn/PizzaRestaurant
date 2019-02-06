
<script type="text/javascript" language="javascript"  >
	 function validateForm()
    {
	var a=document.forms["Form"]["nomproduit"].value;
	var b=document.forms["Form"]["refproduit"].value;
	var c=document.forms["Form"]["descproduit"].value;
	
	var d=document.forms["Form"]["catgproduit"].value;
	var e=document.forms["Form"]["qttproduit"].value;
	var f=document.forms["Form"]["prixproduit"].value;
	var g=document.forms["Form"]["photo"].files.length;
 if (a==null || a=="" , b==null || b=="" , c==null || c=="" , d==null || d=="" , e==null || e=="" , f==null || f=="" ||  g==0) {
 	alert("Please fill all the required fields");
 	return false;
 }
return true;
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
                                    <form name="Form" role="form" action='?controller=produits&action=ajouter' onsubmit="return validateForm()"  method="post" enctype="multipart/form-data">     
									
                                        <div class="form-group" >
                                            <label >Nom du produit : <input  class="form-control" placeholder="Entrer le  nom du produit" name="nomproduit" id="nomproduit"  />
                                           
                                        </div>                              
                                        <div class="form-group" >
                                            <label >Reference du produit : <input class="form-control" placeholder="Entrer la  reference du produit" name="refproduit" />
                                           
                                        </div>
										<div class="form-group" >
                                            <label >categorie du produit : 
                                            <select class="form-control" name="catgproduit" >

                                            <option>pizza</option>
                                            <option>sandwich</option>
                                            <option>hamburger</option>
                                            </select>
                                            </label>
                                           
                                        </div>
										<div class="form-group" >
                                            <label>Prix du produit : <input type="number" step="0.1" class="form-control" placeholder="Entrer le prix du produit" name="prixproduit" />
                                           
                                        </div>
										<div class="form-group" >
                                            <label>Image du produit :
										<input type="file" name="photo"  class="form-control"  id="photo"/>
										 </div>
										 <div class="form-group" >
                                            <label>Quantité du produit :<input class="form-control" placeholder="Entrer la  quantité du produit" name="qttproduit" />
                                           
                                        </div>
                                        <div class="form-group" >
                                            <label>Description du produit :<input class="form-control" placeholder="Entrer la  description du produit" name="descproduit" />
                                           
                                        </div>
                                        
                                        <br><br>
                                         <div class="form-group" id="button">
                                        <button type="submit"  class="btn btn-default" >Submit Button</button> <button type="reset" class="btn btn-default">Reset Button</button>'
										</div>
                                    </form>

                                </div>
								</div>
								</div>
								</div>
								</div>