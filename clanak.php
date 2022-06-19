<?php

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

?>
<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title><?php echo $naslov;?></title>
</head>
<body>

<?php include('header.php');?>
    
    <main>
    <h1><?php echo $naslov;?></h1>
    
    <figure>
        <img src="<?php echo $slika;?>" alt="Image">
    </figure>
    <article>
        <h3><?php echo $ukratko;?></h3>
        <p class="glavniParagraf"><?php echo $sadrzaj;?></p>
    </article>
    </main>

    <?php

        include('footer.php');
        mysqli_close($dbc);

    ?>
</body>
</html>