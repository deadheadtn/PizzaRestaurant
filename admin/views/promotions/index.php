<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Tables</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <form action="?controller=promotions&action=search" method="post">
                <input type="text" name="search" placeholder="Rechercher par description">
                <input type="submit" value="Rechercher">
                </form>

            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
            <?php /* {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
 } */?>
            <?php /*if (isset($_SESSION['testiw'])): */?>
                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>produit</th>
                            <th>Description</th>
                            <th>Date début</th>
                            <th>Date fin</th>
                            <th>pourcentage</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($promotions as $promotion) {?>
                        <tr>
                            <td><?php echo $promotion->getNomProduit(); ?></td>
                            <td><?php echo $promotion->getDescription(); ?></td>
                            <td><?php echo $promotion->getDate_debut(); ?></td>
                            <td><?php echo $promotion->getDate_fin(); ?></td>
                            <td><?php echo $promotion->getPourcentage(); ?></td>
                            <td><a href="?controller=promotions&action=edit&id_prom=<?php echo $promotion->getId_prom(); ?>">Modifier</a></td>
                            <td><a href="?controller=promotions&action=delete&id_prom=<?php echo $promotion->getId_prom(); ?>">Supprimer</a></td>

                        </tr> <?php } ?>

                        
                    </tbody>
                </table>
            <?php //endif; ?>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-6 -->
</div>
    