 <script>
        function verifier(id){
            $.get("index.php", {controller:"commande",action:"status", id:id}, function(data){
            if(data.indexOf('deglawi')!==-1){
                //alert("ok");
                document.getElementById('check'+id).innerHTML = '0';
                document.getElementById('button'+id).innerHTML = 'Commande verifier';
            }else{
                alert('l ajout a echouer');
            }
        });
        }
    </script>
 <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID commande</th>
                                        <th>Nom et prenom</th>
                                        <th>Prix totale</th>
                                        <th>Date de Creation</th>
                                        <th>Date de modification</th>
                                        <th>Status</th>
                                        <th>verifier</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach($commandes as $commande)
                                    {
                                        if($commande->getstatus()==1)
                                            echo "<tr class='table-active'>";
                                        else
                                            echo "<tr>";
                                        echo "<tr>";
                                        echo "<td>".$commande->getid()."</td>";
                                        echo "<td>".$commande->getnom()." ".$commande->getprenom()."</td>";
                                        echo "<td>".$commande->gettotal_price()."</td>";
                                        echo "<td>".$commande->getcreated()."</td>";
                                        echo "<td>".$commande->getmodified()."</td>";
                                        echo "<td id=check".$commande->getid().">".$commande->getstatus()."</td>";
                                        if($commande->getstatus()==1)
                                            echo "<td id=button".$commande->getid()."><input  value='verifier' type='button' onclick='verifier(".$commande->getid().")'></td>";
                                        else
                                            echo "<td> Commande verifier</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>