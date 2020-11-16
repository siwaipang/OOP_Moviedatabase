<?php
include 'classes/Database.class.php'; //bewerkingen uitvoeren (CRUD)
include 'classes/Movie.class.php'; //sourcebekijken.php?page=../classes/Movie.class
include 'home.php';

$dbObj = new Database(); //wordt hier automatisch altijd de constructor, constructor bouwt het object

//INSERT
$dbObj->SQLBewerking('SELECT imdbID FROM film WHERE Algezien = 0');
$dbObj->Uitvoeren();
$Qres = $dbObj->ResultaatUitDB();

//TODO: Toon in kolom Film de poster/Naam(2 kollommen) van een film Dmv JsonConversie + Movie class ophalen van de post obv de imdBID

echo '<table>';
foreach ($Qres as $film) //voor iedere film in de database, zet om naar filmObject
{
	$movieObj = new Movie($film['imdbID']); //op basis van
	echo '
	<tr>
        <td>' . $movieObj->Title() . '</td>
        <td><img src="' . $movieObj->Poster() . '" height="300"></td>
		<td><a href="index.php?page=updatefilmstatus&imdbID=' . $movieObj->ImdbID() . '">
		<button class="btn btn-primary" style="background:darkblue">Wijzig naar bekeken</button></a></td>
	</tr>
	';
}
echo '</table>';
