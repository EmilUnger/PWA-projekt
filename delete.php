<?php

    session_start();
    if(!isset($_SESSION['username'])){
        header('Location: login.php');
    }else if($_SESSION['level'] != 1){
        header('Localtion: administracija.php');
    }else{
        $dbc = mysqli_connect('localhost','root','','projekt') or die("Nije se moguće spojiti na bazu.");
        $id = $_GET['id'];
        $stmt = $dbc->prepare("SELECT naslov FROM vijesti WHERE id = ?");
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = mysqli_fetch_array($result);
        $naslov = $row['naslov'];
    }

    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Delete</title>
</head>
<body>

    <?php
        include('header.php');
    ?>
    
    <main>

        <form action="" class="forma" method="POST">
            <h2>Jeste li sigurni da želite izbrisati vijest: <?php echo $naslov;?>?</h2>
            <div class="form-item">

                    <button name="odustani" value="Ne">Ne</button>

                <button type="submit" name="caffeBarGumbek" id="caffeBarGumbek" value="Da">Da</button>
            </div>
        </form>

    </main>

    <?php
        include('footer.php');

        if(isset($_POST['caffeBarGumbek'])){
            $stmt = $dbc->prepare("DELETE FROM vijesti WHERE id = ?;");
            $stmt->bind_param('i', $id);
            $stmt->execute();
        

            mysqli_close($dbc);

            echo "<script type=\"text/javascript\">window.location.href = \"administracija.php\";</script>";

        }

        if(isset($_POST['odustani'])){
            mysqli_close($dbc);
            echo "<script type=\"text/javascript\">window.location.href = \"administracija.php\";</script>";
        }
    ?>

</body>
</html>