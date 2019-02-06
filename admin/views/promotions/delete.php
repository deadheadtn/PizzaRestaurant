<h2>Suppression de modèle</h2>

<form role="form" method="post" action="?controller=promotions&action=remove">
    
    <p>Etes-vous sûr de vouloir supprimer la promotion
    <?php echo $promotions->getDescription(); ?></p>
    <input name="id" type="hidden" value="<?php echo $promotions->getId_prom(); ?>">
    <button type="submit" >Supprimer</button>
    <a href="?controller=promotions&action=index">Annuler</a>
	
</form>