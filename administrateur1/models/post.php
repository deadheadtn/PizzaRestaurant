<?php
  class Modele {
    // we define 3 attributes
    // they are public so that we can access them using $Modele->author directly
    private $id;
    private $libelle;
    private $pays;

    public function __construct() {}
public function setId ($id) {
	$this->id=$id;
}
public function setlibelle ($libelle) {
	$this->libelle=$libelle;
}
public function setpays ($pays) {
	$this->pays=$pays;
}
public function getId () {
	 return $this->id;
}
public function getlibelle () {
	return $this->libelle;
}
public function getpays () {
	return $this->pays;
}
public function Create () {
	 $db = Db::getInstance();
      $req = $db->query("insert into Modeles(pays,modele) values('".$this->libelle."','".$this->pays."')"); 	
}
    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM Modeles');

      // we create a list of Modele objects from the database results
      foreach($req->fetchAll() as $Modele) {
        $list[] = new Modele($Modele['id'], $Modele['author'], $Modele['content']);
      }

      return $list;
    }

    public static function find($id) {
      $db = Db::getInstance();
      // we make sure $id is an integer
      $id = intval($id);
      $req = $db->prepare('SELECT * FROM Modeles WHERE id = :id');
      // the query was prepared, now we replace :id with our actual $id value
      $req->execute(array('id' => $id));
      $Modele = $req->fetch();

      return new Modele($Modele['id'], $Modele['author'], $Modele['content']);
    }
  }
?>