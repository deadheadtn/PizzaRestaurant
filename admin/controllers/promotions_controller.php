<?php
require_once('models/promotion.php');

class PromotionController {
	public function save()
{
	$promotion = new promotion();
	$promotion->setId_prod($_POST['id_prod']);
	$promotion->setDescription($_POST['description']);
	$promotion->setDate_debut($_POST['date_debut']);
	$promotion->setDate_fin($_POST['date_fin']);
	$promotion->setPourcentage($_POST['pourcentage']);

	$promotion->Create();
	$this->index();
}
public function stat()
{
	require_once('views/promotions/stats.php');
}
public function add()
{
	require_once('views/promotions/add.php');
}

public function index()
{
	$promotions = Promotion::all();
	require_once('views/promotions/index.php');
}

public function search()
{
	if(!isset($_POST['search']))
		return call('pages','error');
	$promotions=Promotion::findByDescription($_POST['search']);
	require_once('views/promotions/index.php');
}
public function edit()
{
	if(!isset($_GET['id_prom']))
		return call('pages','error');
	$promotions= Promotion::findById($_GET['id_prom']);
	require_once('views/promotions/edit.php');

}
public function update()
{
	$promotions = Promotion::findById($_POST['id_prom']);
	$promotions->setId_prod($_POST['id_prod']);
	$promotions->setDescription($_POST['description']);
	$promotions->setDate_debut($_POST['date_debut']);
	$promotions->setDate_fin($_POST['date_fin']);
    $promotions->setPourcentage($_POST['pourcentage']);
    $promotions->update();
    $this->index();

}

public function delete()
{
	if(!isset($_GET['id_prom']))
		return call('pages','error');
	$promotions= Promotion::findById($_GET['id_prom']);
	require_once('views/promotions/delete.php');
}

public function remove()
{
	$promotions= Promotion::findById($_POST['id']);
	$promotions->remove();
	$this->index();
}



}