<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <style>footer{position: fixed; bottom: 0;}</style>
    <title>Login</title>
</head>
<body>

    <?php
        include('header.php');
    ?>

    <main id="main">

        <form action="" method="POST" class="forma">
            <div class="form-item">
                <label for="about">Korisničko ime:</label>
                <div class="form-field">
                    <input type="text" name="uname" id="uname">
                    <p class="error" id="unameError"></p>
                </div>
            </div>

            <div class="form-item">
                <label for="about">Lozinka:</label>
                <div class="form-field">
                    <input type="password" name="pass" id="pass">
                    <p class="error" id="passError"></p>
                </div>
            </div>

            <div class="form-item">
                <button type="submit" name="login" id="login" value="Registraciaj">Prijava</button><br>
                <a href="registracija.php">Nemaš račun?</a>
            </div>

        </form>

    </main>

    <script type="text/javascript">
    
        document.getElementById('login').onclick = function(event){

            submit = true;

            if(document.getElementById('uname').value.length == 0){
                submit = false;
                document.getElementById('uname').style.borderColor = "red";
                document.getElementById('unameError').innerHTML = "Korisničko ime mora biti uneseno!";
            }

            if(document.getElementById('pass').value.length == 0){
                submit = false;
                document.getElementById('pass').style.borderColor = "red";
                document.getElementById('passError').innerHTML = "Lozinka mora biti unesena!";
            }

            if(!submit){
                event.preventDefault();
            }

        }    

    </script>
    
    <?php

        if(isset($_POST['login'])){

            $uname = $_POST['uname'];
            $pass = $_POST['pass'];

            $dbc = mysqli_connect('localhost','root','','projekt') or die("Nije se moguće spojiti na bazu.");
            $stmt = $dbc->prepare("SELECT korisnicko_ime, lozinka, razina FROM korisnik WHERE korisnicko_ime = ?;");
            $stmt->bind_param('s', $uname);
            $stmt->execute();
            mysqli_stmt_store_result($stmt);
            mysqli_stmt_bind_result($stmt, $uname, $pass1, $level);
            mysqli_stmt_fetch($stmt);

            if(password_verify($pass, $pass1) && mysqli_stmt_num_rows($stmt) > 0){

                if($level == 1){
                    $admin = true;
                }else{
                    $admin = false;
                }

                session_start();
                $_SESSION['username'] = $uname;
                $_SESSION['level'] = $level;

                header('Location: administracija.php');

            }else{
                echo "<script type=\"text/javascript\">document.getElementById('passError').innerHTML = \"Netočna lozinka ili korisničko ime!\";</script>";
            }

        }
        include('footer.php');
    ?>

</body>
</html>