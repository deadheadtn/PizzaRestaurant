<?php

class Promotion{
	private $id_prom;
	private $id_prod;
	private $description;
	private $date_debut;
	private $date_fin;
	private $coupon;

	public function __construct(){}
	public function setId_prom($id_prom)
	{
		$this->id_prom=$id_prom;
	}
	public function getId_prom()
	{
		return $this->id_prom;
	}
	public function setId_prod($id_prod)
	{
		$this->id_prod=$id_prod;
	}
	public function getId_prod()
	{
	return $this->id_prod;
	}
	public function setDescription($description)
	{
		$this->description=$description;
	}
	public function getDescription()
	{
		return $this->description;
	}
	public function setDate_debut($date_debut)
	{
		$this->date_debut=$date_debut;
	}
	public function getDate_debut()
	{
		return $this->date_debut;
	}
	public function setDate_fin($date_fin)
	{
		$this->date_fin=$date_fin;
	}
	public function getDate_fin()
	{
		return $this->date_fin;
	}
	public function setCoupon($coupon)
	{
		$this->coupon=$coupon;
	}
	public function getCoupon()
	{
		return $this->coupon;
	}

	public function Create()
	{
		$db=Db::getInstance();
		$req= $db->query("INSERT INTO promotion (id_prod, description, date_debut, date_fin, coupon) VALUES (".$this->id_prod.",'".$this->description."','".$this->date_debut."','".$this->date_fin."','".$this->coupon."') ");
	}
     
    public static function all(){
    	$list =[];
    	$db = Db::getInstance();
    	$req= $db->query('SELECT * FROM promotion');
    	foreach($req->fetchall() as $temp){
    		$promotion= new Promotion();
    		$promotion->setId_prom($temp['id_prom']);
    		$promotion->setId_prod($temp['id_prod']);
    		$promotion->setDescription($temp['description']);
    		$promotion->setDate_debut($temp['date_debut']);
    		$promotion->setDate_fin($temp['date_fin']);
    		$promotion->setCoupon($temp['coupon']);
    		$list[]=$promotion;
    	}
    	return $list;

    }

    public static function findById ($id_prom){
    	$db=Db::getInstance();
    	$id_prom= intval($id_prom);
    	$req = $db->prepare('select * from promotion where id_prom = :id_prom');
    	$req->execute(array('id_prom'=>$id_prom));
    	$temp =$req->fetch();
    	$promotion=new Promotion();
    	$promotion->setId_prom($temp['id_prom']);
    	$promotion->setId_prod($temp['id_prod']);
    	$promotion->setDescription($temp['description']);
    	$promotion->setDate_debut($temp['date_debut']);
    	$promotion->setDate_fin($temp['date_fin']);
    	$promotion->setCoupon($temp['coupon']);

    	return $promotion;
    }

    public static function findByDescription($description){
    	$db=Db::getInstance();
    	$description= strtolower($description);
    	$req = $db->prepare("select * from promotion where description like '%".$description."%'");

    	$req->execute();
    	$list =[];
    	foreach($req->fetchAll() as $temp)
    	{
    	$promotion=new Promotion();
    	$promotion->setId_prom($temp['id_prom']);
    	$promotion->setId_prod($temp['id_prod']);
    	$promotion->setDescription($temp['description']);
    	$promotion->setDate_debut($temp['date_debut']);
    	$promotion->setDate_fin($temp['date_fin']);
    	$promotion->setCoupon($temp['coupon']);
    	$list[]=$promotion;
    }

    	return $list;

    }

    public function update()
    {
    	$db= Db::getInstance();
    	$req= $db->query("UPDATE promotion SET id_prod=".$this->id_prod.",description='".$this->description."',date_debut='".$this->date_debut."',date_fin='".$this->date_fin."',coupon='".$this->coupon."' where id_prom=".$this->id_prom);

    }

    public function remove()
    {
    	$db = Db::getInstance();
    	$req = $db->query("DELETE FROM promotion WHERE id_prom=".$this->id_prom);
    }



}
?>