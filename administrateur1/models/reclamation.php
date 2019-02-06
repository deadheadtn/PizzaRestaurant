<?php
  class reclamation{
    // we define 3 attributes
    // they are public so that we can access them using$reclamation->author directly
    
    private $id_reclamation_reclamation;
    private $name;
  private $email;
  private $texte;
  private $state;
  private $datee;

    public function __construct($id_reclamation,$name,$email,$texte,$state,$datee) {
    $this->id_reclamation=$id_reclamation;
    $this->name=$name;
    $this->email=$email;
    $this->texte=$texte;
    $this->state=$state;
    $this->datee=$datee;
    
    }

    public function getname(){
    return $this->name;
  }
  public  function getemail(){
    return $this->email;
  }
  public function gettexte(){
    return $this->texte;
  }
  
  public  function getdatee(){
    return $this->datee;
} 
  public  function getState(){
    return $this->state;

}
  public function setName($name){
    $this->name=$name;
  }
    public  function getid(){
    return $this->id_reclamation;

}
  public function setid($id){
    $this->id_reclamation=$id;
  }
  public function setEmail($email){
    $this->email=$email;
  }
  public function setTexte($texte){
    $this->texte=$texte;
  }
  
    public function setdatee($datee){
    $this->datee=$datee;
  }
  public function setState($state){
    $this->state=$state;
  }

    public static function all() {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('SELECT * FROM reclamation');

      // we create a list of reclamationobjects from the database results
      foreach($req->fetchAll() as$reclamation) {
        $list[] = new reclamation($reclamation['id_reclamation'],$reclamation['name'],$reclamation['email'],$reclamation['texte'],$reclamation['state'],$reclamation['datee']);
      }

      return $list;
    }
     public static function update($id_reclamation) {
      $list = [];
      $db = Db::getInstance();
      $req = $db->query('UPDATE reclamation SET state=0 WHERE id_reclamation ='.$id_reclamation);
      // the query was prepared, now we replace :id_reclamation with our actual $id_reclamation value
     $req = $db->query('SELECT * from reclamation  WHERE id_reclamation ='.$id_reclamation);
    $rec=$req->fetch();
    $reclamation = new reclamation($rec['id_reclamation'],$rec['name'],$rec['email'],$rec['texte'],$rec['state'],$rec['datee']);
return $reclamation;
 
    }

    public static function delete($id_reclamation) {
      $db = Db::getInstance();
      // we make sure $id_reclamation is an integer
      $id_reclamation = intval($id_reclamation);
      $req = $db->prepare('DELETE FROM reclamation WHERE id_reclamation = :id_reclamation');
      // the query was prepared, now we replace :id_reclamation with our actual $id_reclamation value
      $req->execute(array('id_reclamation' => $id_reclamation));
    }
  }
?>