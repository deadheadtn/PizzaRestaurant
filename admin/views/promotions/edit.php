<?php 
require_once("connection.php");
$db = Db::getInstance();
$query=$db->query("select * from produit");
$produit=$query->fetchAll();
?>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Modif</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Entrez les détails de la promotion
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" method="POST" action="?controller=promotions&action=update">
                                         <div class="form-group">
                                            
                                            <input style=" display: none " class="form-control" type="hiden" placeholder="Enter text" name="id_prom" value="<?php echo $_GET['id_prom'] ?>">
                                        </div>
                                           <div class="form-group">
                                            <label>Choix du produit</label>
                                            <select name="id_prod">
                                                <?php
                                                foreach ($produit as $prod) {
                                                    echo '<option value='.$prod['id_produit'].'>'.$prod['nom'].'</option>';
                                                }
                                                ?>
                                            </select>
                                            
                                        </div>

                                        <div class="form-group">
                                            <label>Description</label>
                                            <input class="form-control" placeholder="Enter text" name="description"
                                            >
                                        </div>
                                        <div class="form-group">

                                            <label>Date début</label>
                                            <input type="Date" class="form-control" id="date_debut" name="date_debut" onchange="dateDeb()" >
                                            <p id="dateDebDebTakTess" style="display:none; color:red">this date should be greater than the system date</p>
                                        </div>
                                        <div class="form-group">
                                            <label>Date fin</label>
                                            <input type="Date" class="form-control" id="date_fin"  name="date_fin" onchange="dateFin()">
                                            <p id="dateFinFinTess" style="display:none; color:red">this date should be greater than the start date</p>
                                        </div>
                                        <div class="form-group">
                                        <label>Pourcentage</label>
                                            <input  type="number" class="form-control" id="pourcentage"  name="pourcentage" onchange="pourcent()">
                                            <p id="pr" style="display:none; color:red">this number should be greater than 0</p>

                                        </div>
                                         <input type="submit" value="Enregistrer" id="submit">
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                                 <!-- /.panel -->
                </div>

               <script type="text/javascript">
                    function dateDeb () {
                        var date = new Date(document.getElementById("date_debut").value);
                        var now = new Date();
                        if (date<now) {
                            document.getElementById('dateDebDebTakTess').style.display = "block";
                            document.getElementById('submit').disabled = true;
                        }
                        else{
                            document.getElementById('dateDebDebTakTess').style.display = "none";
                            document.getElementById('submit').disabled = false;
                        }
                    }
                    function dateFin () {
                        var dateDebDeb = new Date(document.getElementById("date_debut").value);
                        var date = new Date(document.getElementById("date_fin").value);
                        if (dateDebDeb>date) {
                            document.getElementById('dateFinFinTess').style.display = "block";
                            document.getElementById('submit').disabled = true;
                        }
                        else{
                            document.getElementById('dateFinFinTess').style.display = "none";
                            document.getElementById('submit').disabled = false;
                        }
                    }
                    function pourcent (){
                        var pour = document.getElementById("pourcentage").value;
                        if (pour<0)
                        {
                            document.getElementById('pr').style.display = "block";
                            document.getElementById('submit').disabled = true;

                        }

                        else{
                            document.getElementById('pr').style.display = "none";
                            document.getElementById('submit').disabled = false;
                        }
                    }
                    
                </script>
             