<?php
include('classes/JsonConversie.class.php');
include('classes/MovieHelper.class.php');

class Movie
{
	//eigenschappen
	private $waarde = "";
	
	private $title = "";
	private $year = "";
	private $imdbID = "";
	private $poster = "";

	//ngo 20 properties
	
	//constuctor
	function __construct($waarde) //Movie object wordt gevuld obv 2 waardes, (bij search movie door title en bij de watchlist door de ID
	{
		$this->waarde = $waarde; //Bad_boys  of ID
		//echo'TEST: Het object is aangemaakt';
		$this->setMovieProperties();
	}
	
	//methodes
	public function Title()
	{
		return $this->title;
	}
	
	public function Year()
	{
		return $this->year;
	}
	
	public function Poster()
	{
		return $this->poster;
	}
	
	public function ImdbID()
	{
		return $this->imdbID;
	}
	
	public function setMovieProperties() //$waarde kan zijn of een ID of een TITLE
	{
		
		$apiUrl = MovieHelper::setURLConfig($this->waarde); //warde wordt gebruikt om de juiste URL te pakken
		
		//hier kroep je de Json class aan om de eigenschappen van de film te vullen
		$jsonconversie = new JsonConversie($this->waarde); //ID of FILM //TITEL wordt niet opgehaald, maar ingevuld door de gebruiker obv titel halen we de rest op dmv de API
		$jsonconversie->setAPIUrl($apiUrl); //JSON URL
		
		$jsonconversie->Conversie();
			
		//TODO: dit moet GENERIEK, doorloop de properties en doorloop de array, kijk op overeenkomsten
		$this->year = $jsonconversie->getInfo("Year");
		$this->imdbID = $jsonconversie->getInfo("imdbID");
		$this->poster = $jsonconversie->getInfo("Poster");
		$this->title = $jsonconversie->getInfo("Title");

		
		/*
		//TODO: Nu ik weet welke proprties de movie class heeft, kijk of deze proprties in de jsonconversie array voorkomt en koppel ze aanelkaar.
		//In de toekomst hoef ik dan alleen de proprtieslist aan te passen voor extra info en hoeft in deze fuctie niets te gebeuren
		
		$class_properties = get_class_vars(get_class($this)); //$this refereert naar eigen class, anders: get_class_vars(get_class(new movie)); 
		echo'<hr>PROPERTIES:';
		foreach ($class_properties as $name => $value) { 
			echo '<br />' . $name ; //eventueel kun je de value printen
			//TODO: Ccheck of deze propties voorkomen in de Jsonconversie array, zoja:
			// Dan geef je de waarde van jsonconversie aan de propertie.
		}
		*/
	}
}

?>

<!-- ______                               _ 
    (_____ \         copyright           (_)
     _____) )  ___   _____  ____   _____  _ 
    |  ____/  / _ \ | ___ ||  _ \ (____ || |
    | |      | |_| || ____|| | | |/ ___ || |
    |_|       \___/ |_____)|_| |_|\_____||_|
-->
