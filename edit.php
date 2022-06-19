<?php

    session_start();
    if(!isset($_SESSION['username'])){
        header('Location: login.php');
    }else if($_SESSION['level'] != 1){
        header('Localtion: administracija.php');
    }else{

        $dbc = mysqli_connect('localhost','root','','projekt') or die("Nije se moguće spojiti na bazu.");
        $id = $_GET['id'];
        $stmt = $dbc->prepare("SELECT * FROM vijesti WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = mysqli_fetch_array($result);
        $naslov = $row['naslov'];
        $ukratko = $row['ukratko'];
        $sadrzaj = $row['sadrzaj'];
        $slika = $row['slika'];
        $kategorija = $row['kategorija'];
        $arhivirano = $row['arhivirano'];

    }

?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Edit</title>
</head>
<body>

    <?php
        include('header.php');
    ?>

    <main>

        <main>

            <div class="forma">

                <h2>Uređivanje vijesti: </h2>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="form-item">
                        <label for="title">Naslov vijesti (5 do 30 znakova):</label>
                        <div class="form-field">
                            <input type="text" name="title" id="title" class="form-field-textual" value="<?php echo $naslov;?>">
                            <p class="error" id="titleError"></p>
                        </div>
                    </div>
            
                    <div class="form-item">
                        <label for="about">Kratki sadržaj vijesti (10 do 100 znakova):</label>
                        <div class="form-field">
                            <textarea name="about" id="about" cols="30" rows="10" class="form-field-textual"><?php echo $ukratko;?></textarea>
                            <p class="error" id="aboutError"></p>
                        </div>
                    </div>
            
                    <div class="form-item">
                        <label for="content">Sadržaj vijesti:</label>
                        <div class="form-field">
                            <textarea name="content" id="content" cols="30" rows="10" class="form-field-textual"><?php echo $sadrzaj;?></textarea>
                            <p class="error" id="contentError"></p>
                        </div>
                    </div>
            
                    <div class="form-item">
                        <label for="photo">Slika:</label>
                        <div class="form-field">
                            <input type="file" name="photo" id="photo" class="input-text" accept="image/jpeg" style="border: 2px solid white;">
                            <p class="error" id="photoError"></p>
                        </div>
                    </div>
            
                    <div class="form-item">
                        <label for="category">Kategorija:</label>
                        <div class="form-field">
                            <select name="category" class="form-field-textual">
                                <option value="politik" <?php if($kategorija == "politik"){echo "selected=\"selected\"";}?>>POLITIK</option>
                                <option value="sport" <?php if($kategorija == "sport"){echo "selected=\"selected\"";}?>>SPORT</option>
                            </select>
                        </div>
                    </div>
            
                    <div class="form-item">
                        <label for="archive">Arhiviraj:</label>
                        <div class="form-field">
                            <input type="checkbox" name="archive" <?php if($arhivirano == 1){echo "checked";}?>>
                        </div>
                    </div>
            
                    <div class="form-item">
                        <button type="reset" value="Poništi">Poništi</button>
                        <button type="submit" id="caffeBarGumbek" name="caffeBarGumbek" value="Prihvati">Prihvati</button>
                    </div>
            
                </form>
            
            </div>
            
            </main>
            
            <script type="text/javascript">
            
                document.getElementById('caffeBarGumbek').onclick = function(event){
            
                    var submit = true;
            
                    if(document.getElementById('title').value.length < 5 || document.getElementById('title').value.length > 30){
                        document.getElementById('title').style.borderColor = "red";
                        document.getElementById('titleError').innerHTML = "Naslov mora imati 5 do 30 znakova!";
                        submit = false;
                    }
            
                    if(document.getElementById('about').value.length < 10 || document.getElementById('about').value.length > 100){
                        document.getElementById('about').style.borderColor = "red";
                        document.getElementById('aboutError').innerHTML = "Kratki sadržaj mora imati od 10 do 100 znakova!";
                        submit = false;
                    }
            
                    if(document.getElementById('content').value.length < 1){
                        document.getElementById('content').style.borderColor = "red";
                        document.getElementById('contentError').innerHTML = "Vijest mora imati sadržaj!";
                        submit = false;
                    }
            
                    //kategoriju neću validirat jer nema opcije da nije odabrana
            
                    if(!submit){
                        event.preventDefault();
                    }
            
                }
            
            </script>

    </main>

    <?php
        include('footer.php');

        if(isset($_POST['caffeBarGumbek'])){

            $naslov = $_POST['title'];
            $ukratko = $_POST['about'];
            $sadrzaj = $_POST['content'];
            $kategorija = $_POST['category'];
            $arhivirano = isset($_POST['archive']);
        
            $dbc = mysqli_connect('localhost','root','','projekt') or die("Nije se moguće spojiti na bazu.");
            $stmt = $dbc->prepare("UPDATE vijesti
                                    SET naslov = ?,
                                        ukratko = ?,
                                        sadrzaj = ?,
                                        slika = ?,
                                        kategorija = ?,
                                        arhivirano = ?
                                    WHERE id = ?;");

            $newFile = $slika;

            if($_FILES['photo']['size'] != 0){
                if(!$_FILES['photo']['error']){

                    $dir = "./images";
                    $filename = strval(time()) . ".png";
                    $newFile = $dir . "/" . $filename;

                    move_uploaded_file($_FILES['photo']['tmp_name'], $newFile);
                }
            }         

            $stmt->bind_param('sssssii', $naslov, $ukratko, $sadrzaj, $newFile, $kategorija, $arhivirano, $id);
            $stmt->execute();

            mysqli_close($dbc);
            echo "<script type=\"text/javascript\">window.location.href = \"clanak.php?id=$id\";</script>";
            

        }
        
    ?>
    
</body>
</html>