<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Frankfurter Allgemeine</title>
    <style>footer{position: fixed; bottom: 0;}</style>
</head>
<body>

    
<?php

    include('header.php');

    if(!empty($_POST['title']) && !empty($_POST['about']) && !empty($_POST['content'])){

        $naslov = $_POST['title'];
        $ksadrzaj = $_POST['about'];
        $sadrzaj = $_POST['content'];
        $kategorija = $_POST['category'];
        $arhivirano = isset($_POST['archive']);
        $datum = date('Y-m-d');
    
        if(isset($_FILES['photo'])){
            if($_FILES['photo']['error'] == 0){

                $dir = "./images";
                $filename = strval(time()) . ".png";
                $newFile = $dir . "/" . $filename;

                if(move_uploaded_file($_FILES['photo']['tmp_name'], $newFile)){
                    
                    $dbc = mysqli_connect('localhost','root','','projekt') or die("Nije se moguće spojiti na bazu.");
                    $stmt = $dbc->prepare("INSERT INTO vijesti(id, datum, naslov, ukratko, sadrzaj, slika, kategorija, arhivirano) 
                                            VALUES(NULL, ?, ?, ?, ?, ?, ?, ?);");
                    $stmt->bind_param('ssssssi', $datum, $naslov, $ksadrzaj, $sadrzaj, $newFile, $kategorija, $arhivirano);
                    $stmt->execute();

                    echo "<h1 style=\"text-align: center;\">Vijest uspješno unesena!</h1>
                        <form class=\"forma\" action=\"unos.php\">
                        <button type=\"submit\">Povratak</button></form>";

                    
                }else{
                    echo "Došlo je do pogreške u uploadu.";
                }

            }else{
                echo "Došlo je do pogreške u uploadu.";
            }
        }else{
            echo "Slika nije odabrana!";
        }
    
    }else{
        echo "Nisu ispunjeni svi parametri!";
    }

    include('footer.php');
    mysqli_close($dbc);

?>
    
</body>
</html>
