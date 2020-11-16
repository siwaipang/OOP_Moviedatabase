<?php
if (isset($_GET['title'])) {

    $titleGET = $_GET['title']; //url balk of via form

    $replaceChars = array(' ');
    $title = str_replace($replaceChars, '_', $titleGET); //replace spaces with underscore

    $json = file_get_contents('http://www.omdbapi.com/?t=' . $titleGET . '&apikey=186be766');

    $data = json_decode($json, true); //conversie naar PHP array

    $movieObject = $data['Poster']; //returnt jpg

    // echo '<h1>'  .$movieObject . '</h1>';

    if (empty($movieObject)) {
        // error_reporting(0);
        echo "Geen bestaande foto op imdb.com";
    }

    echo '<img src=" ' . $movieObject . ' " /><br><br>';
    echo '<button> Toevoegen aan Watchlist </button>';
    //  print_r($movieObject);
}
else {
    echo 'Geef een title mee aan de API!';
}
