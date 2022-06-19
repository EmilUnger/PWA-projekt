<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Frankfurter Allgemeine</title>
</head>
<body>
    <?php

        include('./header.php');

        $dbc = mysqli_connect('localhost','root','','projekt') or die("Nije se moguće spojiti na bazu.");

    ?>

    <main>

        <section>
            <aside>
                <hr>
                <h4>POLITIK</h4>
            </aside>

            <?php

                $query = "SELECT * FROM vijesti
                            WHERE kategorija = \"politik\"
                            AND arhivirano = 0
                            ORDER BY datum DESC
                            LIMIT 3;";
                $result = mysqli_query($dbc, $query);
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
                    }
            
            ?>
            
        </section>

        <section>
        <aside>
                <hr>
                <h4>SPORT</h4>
        </aside>

        <?php

            $query = "SELECT * FROM vijesti
                        WHERE kategorija = \"sport\"
                        AND arhivirano = 0
                        ORDER BY id DESC
                        LIMIT 3;";

            $result = mysqli_query($dbc, $query);
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
                }

        ?>

        </section>

    </main>    

    <?php

        include('./footer.php');
        mysqli_close($dbc);
        
    ?>
</body>
</html>