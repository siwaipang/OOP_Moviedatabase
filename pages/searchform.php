<?php

echo '
<form class="form-group" action="index.php?page=searchmovie" method="POST" style="display:flex;">
        <input type="text" class="form-control search" placeholder="Search which movie" name="title" style="width: 70%;">
        <button type="submit" class="btn btn-primary" name="sb" style="background:darkblue; margin-left:10px;">Search</button>
    </form>';

/*
OOP structuur:

SEARCHFORM.PHP -> SEARCHMOVIE.PHP(VERWERKING) -> MOVIE.CLASS.PHP -> JSONCONVERSIE.CLASS.PHP (Je toont een film aan de voorzijde)

	HELPERCLASS (BEVAT ALGEMENE FUNCTIES DIE JE ONDERSTEUNT IN ALLE ANDERE BESTANDEN)
		MOVIEHELPER ondersteunt in Movie class met een AANTAL 'problemen' specifieke gericht op movies
		DATABASEHELPER ondersteunt bij specifiek database 'problemen'


ADDMOVIEDB.PHP(toevoegen in de de db)															//INSERT query
WATCHLIST.PHP (toon alle films die de waarde Algezien = 0, ofwel wleke films wil ik nog zien 	//(SELECT)UPDATE query (Algezien =1, Rating = Cijfer)
MOVIESWATCHED.PHP (films al beken met een rating, Algezien  = 1)								//SELECT query
-----

DATABASE.CLASS  (DATABASEHELPER.CLASS) / DatabaseConfig.php
JSONCONVERSIE.CLASS
MOVIE.CLASS -> MOVIEHELPER.CLASS
*/
