
<?php
//Hier komen alleen ondersteunende functies om te helpen bij Movie gerelateerde probleempjes
class MovieHelper
{
    private static $title = '';
	
	/* voor toekomstige aanpassingen, als een bepaalde 
	//actie altijd eerst uitgevoerd moet worden
    //check of de API url in de lucht is?
	
	private static function initialize()
    {
		echo'In de INITIZLIAZE van Helper!';
    }
	*/

    public static function ReplaceTitle($title)
    {
        //self::initialize(); // 'De constructor'

		$replaceChars = array(' ');
		self::$title = str_replace($replaceChars , '_', $title);
		return self::$title;
    }
	
	public static function setURLConfig($waarde)
	{
		$apiUrl = "http://www.omdbapi.com/?apikey=186be766";
		
		if($waarde[0] == 't' && $waarde[1] == 't') //ofwel ID(tt uit de DB)
			$apiUrl = $apiUrl . '&i='; 
		else
			$apiUrl = $apiUrl . '&t=';
		
		return $apiUrl;
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
