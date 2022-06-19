<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title><?php echo strtoupper($_GET['kategorija']);?></title>
</head>

<body>
    

<?php

    $kategorija = $_GET['kategorija'];
    include('header.php');
    $dbc = mysqli_connect('localhost','root','','projekt') or die("Nije se moguće spojiti na bazu.");
    $query = "SELECT * FROM vijesti
                WHERE kategorija = \"". $kategorija ."\"
                AND arhivirano = 0
                ORDER BY id DESC;";
    $result = mysqli_query($dbc,$query);

?>

<main>


<?php
    
    echo "<section>";
    $stupac = 1;

    while($row = mysqli_fetch_array($result)){

        echo "<article>
        <a href=\"clanak.php?id=" . $row['id'] . "\">
        <figure>
            <img src=\"" . $row['slika'] . "\" alt=\"Image\">
        </figure>
        <h4>" . $row['naslov'] ."</h4>
        <p>" . $row['ukratko'] . "</p>
        </a>
        </article>";

        if($stupac % 3 === 0){
            echo "</section><section>";

        }
        $stupac++;
    }
    echo "</section>"

?>

</main>

<?php

    include('footer.php');
    mysqli_close($dbc);

?>

</body>
</html>
