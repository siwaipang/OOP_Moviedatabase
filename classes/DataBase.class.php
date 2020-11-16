<?php  
include_once('config/DatabaseConfig.php');; //vaste configuratie

class Database{
	
	//eigenschappen
	private $host = DB_HOST;  
	private $user = DB_USER;  
	private $pass = DB_PASS;  
	private $dbname = DB_NAME;
		
	private $dbh; //PDO connectie (handler) 
	private $error;  	

	
	public $stmt;  //query
		
	//constuctor
	public function __construct(){

		//DSN (DB source name(connection string))  
		$dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname; //voor gebruik verschillende databases 
		//echo '--> ' . $dsn . '<br />';
		//echo '-->' . $this->user . '<br />'; 
		
		try {  
			$this->dbh = new PDO($dsn, $this->user, $this->pass); //creeert een conectie
			//echo"U bent succesvol verbonden met de database: " . $this->dbname . '<hr />';
		}   
		catch (PDOException $e) {  
			$this->error = $e->getMessage();  
			echo 'Er is een error ontstaan bij het verbinden: ' . $this->error . '<hr />';
		} 	
	}  
		
	//methoden	
	//STAP 1: Maak een query 
	public function SQLBewerking($query){  
		$this->stmt = $this->dbh->prepare($query);  
		//var_dump($this->stmt);
	}  
	
	//STAP 2: Eventueel variablen koppelen aan je query
	public function GeefWaardeMee($param, $value, $type){
		if (is_null($type)) {  
			switch (true) {  
				case is_int($value):  
					$type = PDO::PARAM_INT;  
				break;  
				case is_bool($value):  
					$type = PDO::PARAM_BOOL;  
				break;  
				case is_null($value):  
					$type = PDO::PARAM_NULL;  
				break;  
				default:  
					$type = PDO::PARAM_STR;  
			}  
		}
		/*
		echo 'param: '. $param . '<br />';
		echo 'value: '. $value . '<br />';
		echo 'type: '. $type . '<br />';	
		*/
		$this->stmt->bindValue($param, $value, $type); 
		//print_r($this->stmt);
	}  
	
	//STAP 3
	public function Uitvoeren(){  
		return $this->stmt->execute();  
	}
	
	public function ResultaatUitDB(){   
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);  
	}  
}  

?>