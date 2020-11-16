<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>OOP</title>
 <link rel="stylesheet" href="pages/css/style.css">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
</head>

<body>

    <?php
    if (isset($_GET['page'])) //bestaat de variable page in de URL
        $page = $_GET['page'];
    else $page = 'home'; //standaard pagina die wordt ingeladen

    if (preg_match('/^[a-z0-9\-]+$/', $page)) //veiligheid
    {
        $inserted = include 'pages/' . $page . '.php';
        if (!$inserted)
            echo ('De pagina die u zoekt bestaat niet!');
    } else echo ('Foute pagina gegevens');
    ?>
</body>

</html>