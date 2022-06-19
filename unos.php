<?php

    session_start();

    if(!isset($_SESSION['username'])){
        header('Location: login.php');
    }else if($_SESSION['level'] != 1){
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
    <title>Unos</title>
</head>
<body>
    
<?php

    include('header.php');

?>

<main>

<div class="forma">
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <div class="form-item">
            <label for="title">Naslov vijesti (5 do 30 znakova):</label>
            <div class="form-field">
                <input type="text" name="title" id="title" class="form-field-textual">
                <p class="error" id="titleError"></p>
            </div>
        </div>

        <div class="form-item">
            <label for="about">Kratki sadržaj vijesti (10 do 100 znakova):</label>
            <div class="form-field">
                <textarea name="about" id="about" cols="30" rows="10" class="form-field-textual"></textarea>
                <p class="error" id="aboutError"></p>
            </div>
        </div>

        <div class="form-item">
            <label for="content">Sadržaj vijesti:</label>
            <div class="form-field">
                <textarea name="content" id="content" cols="30" rows="10" class="form-field-textual"></textarea>
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
                    <option value="politik">POLITIK</option>
                    <option value="sport">SPORT</option>
                </select>
            </div>
        </div>

        <div class="form-item">
            <label for="archive">Arhiviraj:</label>
            <div class="form-field">
                <input type="checkbox" name="archive" >
            </div>
        </div>

        <div class="form-item">
            <button type="reset" value="Poništi">Poništi</button>
            <button type="submit" id="caffeBarGumbek" value="Prihvati">Prihvati</button>
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

        if(!document.getElementById('photo').files.length){
            document.getElementById('photo').style.borderColor = "red";
            document.getElementById('photoError').innerHTML = "Mora biti odabrana datoteka!";
            submit = false;
        }

        //kategoriju neću validirat jer nema opcije da nije odabrana

        if(!submit){
            event.preventDefault();
        }

    }

</script>

<?php

    include("footer.php");

?>

</body>
</html>