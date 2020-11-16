<?php
//BussinessLogic Laag == OBJECT GEORIENTEERD 
//Filename: "SEARCHMOVIE.PHP"
include('classes/Movie.class.php'); //sourcebekijken.php?page=../classes/Movie.class
include 'home.php';



$postTitle = $_POST['title']; //URL balk variable(GET) of form input HTML(POST)

//OBSTAKEL: Bad Boys wordt Bad_Boys -> replace spaces with underscores vanwege API
$newTitle = MovieHelper::ReplaceTitle($postTitle);

//Maak object
$movieObj = new Movie($newTitle); //bad boys geef ik mee, om de rest van deze film info op te halen

//Tonen object
echo '	<h1 style="color:white;">		' . $movieObj->Title()    . '</h1>		';
echo '	<img src="	' . $movieObj->Poster()    . '" /><h6/>';


//Doorsturen naar DB (pagina) //Verwerkings pagina om naar DB te schrijven
echo '<a href="index.php?page=addmoviedb&imdbID=' . $movieObj->ImdbID() . '">
<button class="btn btn-primary" style="background:darkblue">Toevoegen aan mijn watchlist</button></a>';
//javascript benadering 
//echo '<button onlick="/?page=addmoviedb&imdbID='.$movieObj->ImdbID().'">toevoegen aan mijn watchlist: '.$movieObj->ImdbID().'</button>';

//
