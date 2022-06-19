<?php

    session_start();

    if(!isset($_SESSION['username'])){
        header('Location: login.php');
    }

    $level = $_SESSION['level'];

    

?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Administracija</title>
</head>
<body>
      
    <?php
        include('header.php');
    ?>

    <main>
        
        <aside class="odjava">
            <a href="logout.php">Odjava</a>
        </aside>
        

        <?php

            if($level == 0){
                echo "<h2>Uspješno ste prijavljeni, ali nemate ovlasti pristupa administraciji.</h2>";
            }else{
                
                $dbc = mysqli_connect('localhost','root','','projekt') or die("Nije se moguće spojiti na bazu.");

                $query = "SELECT * FROM vijesti
                ORDER BY datum DESC;";

                $result = mysqli_query($dbc, $query);

                echo "<div class=\"tablica\">
                <table>
                    <tr>
                        <th>Naslov</th>
                        <th>Sažetak</th>
                        <th>Slika</th>
                        <th>Kategorija</th>
                        <th>Arhivirano</th>
                        <th>Uredi</th>
                        <th>Izbriši</th>
                    </tr>";

                while($row = mysqli_fetch_array($result)){

                    echo "<tr>
                            <td>" . $row['naslov'] . "</td>
                            <td>" . $row['ukratko'] . "</td>
                            <td><a href=\"" . $row['slika'] . "\">" . $row['slika'] . "</a></td>
                            <td>" . $row['kategorija'] . "</td>";

                        if($row['arhivirano'] == 0){
                            echo "<td>Ne</td>";
                        }else{
                            echo "<td>Da</td>";
                        }

                        echo "<td><a href=\"edit.php?id=" . $row['id'] . "\">Uredi</a></td>
                            <td><a href=\"delete.php?id=" . $row['id'] . "\">Izbriši</a></td>
                            </tr>";

                }

                echo "<tr><td colspan=\"7\"><a href=\"unos.php\">Dodaj vijest</a></td></tr>";

                echo "</table></div>";

            }

        ?>


    </main>

    <?php
        include('footer.php');
    ?>

</body>
</html>