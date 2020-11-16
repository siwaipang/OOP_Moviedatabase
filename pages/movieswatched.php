
<?php
include 'classes/Database.class.php'; //bewerkingen uitvoeren (CRUD)
include 'classes/Movie.class.php';
include 'home.php';

$dbObj = new Database(); //wordt hier automatisch altijd de constructor, constructor bouwt het object

$dbObj->SQLBewerking('SELECT imdbID,Rating FROM film WHERE Algezien = 1'); 
$dbObj->Uitvoeren();
$Qres = $dbObj->ResultaatUitDB();

//TODO: Toon in kolom Film de poster/Naam(2 kollommen) van een film Dmv JsonConversie + Movie class ophalen van de post obv de imdBID

echo'<table>';
foreach($Qres as $film) //voor iedere film in de database, zet om naar filmObject
{
	$movieObj = new Movie($film['imdbID']); //op basis van
	echo '<tr>
		<td>' . $movieObj->Title() . '</td>
		<td><img src="'. $movieObj->Poster() . '" height="300"></td>
		<td>
			<button class="btn btn-primary" style="background:darkblue;cursor:auto">Bekeken</button>
		</td>
		<td>'.$film['Rating'].'</td>
	</tr>';
}
echo'</table>';

?>

