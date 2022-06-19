<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Registracija</title>
</head>
<body>

    <?php

        include('header.php');

    ?>

    <main>

        <form action="" method="POST" class="forma">
            <div class="form-item">
                <label for="about">Korisničko ime:</label>
                <div class="form-field">
                    <input type="text" name="uname" id="uname">
                    <p class="error" id="unameError"></p>
                </div>
            </div>

            <div class="form-item">
                <label for="about">Ime:</label>
                <div class="form-field">
                    <input type="text" name="name" id="name">
                    <p class="error" id="nameError"></p>
                </div>
            </div>

            <div class="form-item">
                <label for="about">Prezime:</label>
                <div class="form-field">
                    <input type="text" name="lastname" id="lastname">
                    <p class="error" id="lastnameError"></p>
                </div>
            </div>

            <div class="form-item">
                <label for="about">Lozinka:</label>
                <div class="form-field">
                    <input type="password" name="pass" id="pass">
                </div>
            </div>

            <div class="form-item">
                <label for="about">Ponovi lozinku:</label>
                <div class="form-field">
                    <input type="password" name="pass1" id="pass1">
                    <p class="error" id="passError"></p>
                </div>
            </div>

            <div class="form-item">
                <button type="reset" name="odustani" value="Odustani">Odustani</button>
                <button type="submit" name="caffeBarGumbek" id="caffeBarGumbek" value="Registraciaj">Registracija</button>
                <p class="success" id="registrationSuccess"></p>
            </div>

        </form>

    </main>

    <script type="text/javascript">
    
        document.getElementById('caffeBarGumbek').onclick = function(event){

            var submit = true;

            if(document.getElementById('uname').value.length < 1){
                submit = false;
                document.getElementById('uname').style.borderColor = "red";
                document.getElementById('unameError').innerHTML = "Korisničko ime mora biti upisano!";
            }

            if(document.getElementById('name').value.length < 1){
                submit = false;
                document.getElementById('name').style.borderColor = "red";
                document.getElementById('nameError').innerHTML = "Ime mora biti upisano!";
            }

            if(document.getElementById('lastname').value.length < 1){
                submit = false;
                document.getElementById('lastname').style.borderColor = "red";
                document.getElementById('lastnameError').innerHTML = "Prezime mora biti upisano!";
            }

            if(document.getElementById('pass').value.length < 1 || document.getElementById('pass1') < 1){
                submit = false;
                document.getElementById('pass').style.borderColor = "red";
                document.getElementById('pass1').style.borderColor = "red";
                document.getElementById('passError').innerHTML = "Potrebno je upisati lozinku dvaput!";
            }else if(document.getElementById('pass').value != document.getElementById('pass1').value ){
                submit = false;
                document.getElementById('pass').style.borderColor = "red";
                document.getElementById('pass1').style.borderColor = "red";
                document.getElementById('passError').innerHTML = "Lozinke se ne podudaraju!";
            }

            if(!submit){
                event.preventDefault();
            }

        }

    </script>

    <?php

        include('footer.php');

        if(isset($_POST['caffeBarGumbek'])){
            $uname = $_POST['uname'];
            $name = $_POST['name'];
            $lastname = $_POST['lastname'];
            $pass = $_POST['pass'];

            $dbc = mysqli_connect('localhost','root','','projekt') or die("Nije se moguće spojiti na bazu.");
            $stmt = $dbc->prepare("SELECT * FROM korisnik WHERE korisnicko_ime = ?");
            $stmt->bind_param('s', $uname);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if(mysqli_num_rows($result) > 0){
                echo "<script type=\"text/javascript\">document.getElementById('unameError').innerHTML = \"Korisničko ime već postoji!\";</script>";
            }else{

                $passhash = password_hash($pass, CRYPT_BLOWFISH);

                $stmt = $dbc->prepare("INSERT INTO korisnik(ime, prezime, korisnicko_ime, lozinka) VALUES(?,?,?,?);");
                $stmt->bind_param('ssss', $name, $lastname, $uname, $passhash);
                $stmt->execute();

                echo "<script type=\"text/javascript\">document.getElementById('registrationSuccess').innerHTML = \"Registracija uspješna!\";</script>";
                mysqli_close($dbc);
            }

        }else if(isset($_POST['odustani'])){

            include('footer.php');
            mysqli_close($dbc);

            echo "<script type=\"text/javascript\">window.location.href = \"index.php\";</script>";

        }

    ?>
    
</body>
</html>