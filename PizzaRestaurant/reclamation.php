
<?PHP
class reclamation {
	private $name;
	private $email;
	private $texte;
	private $state;
	private $date;
	/*******************************/
	public function __construct($name,$email,$texte,$state,$date){
		$this->name=$name;
		$this->email=$email;
		$this->texte=$texte;
		$this->state=$state;
		$this->date=$date;
		
	}

	public function getName(){
		return $this->name;
	}
	public  function getEmail(){
		return $this->email;
	}
	public function getTexte(){
		return $this->texte;
	}
	
	public  function getDate(){
		return $this->date;
}	
	public  function getState(){
		return $this->state;

}
	public function setName($name){
		$this->name=$name;
	}
	public function setEmail($email){
		$this->email=$email;
	}
	public function setTexte($texte){
		$this->texte=$texte;
	}
	
    public function setDate($date){
		$this->date=$date;
	}
	public function setState($state){
		$this->state=$state;
	}
	
	}

?>