<!DOCTYPE html>
 
<html>
<head>
	<title>WindCup | Registrácia</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body> 
    <div id="bg">
    <form method="POST" action="index.php">
     <h4>Jméno Teamu:</h4>
        <input type="text" name="jmenoteamu" class="jmenoteamu" required>
        <h4>Meno a Priezvisko kapitána tímu</h4>
        <input type="text" name="meno" class="meno" required>
        <h4>Email kapitána teamu</h4>
        <input type="text" name="mail" class="mail" required>
        <h4>SteamID kapitána teamu</h4>
        <input type="text" name="predmet" class="predmet" required>
        <h4>Logo tímu</h4>
        <input type="file" name="pic" class="pic" accept="image/*" required>
        <h4>Hráč 2:</h4>
        <input type="text" name="clen1" class="clen1" required>
        <h4>Hráč 3:</h4>
        <input type="text" name="clen2" class="clen2" required>
        <h4>Hráč 4:</h4>
        <input type="text" name="clen3" class="clen3" required>
        <h4>Hráč 5:</h4>
        <input type="text" name="clen4" class="clen4" required>
        
        <h4>Jména náhradníků v odrážkách</h4>
        <textarea class="sprava" placeholder='Meno "nick" Priezvisko' required></textarea>
        <br>
        <input type="submit" name="odoslat" value="Odoslať" class="odoslat">
    </form>
    </div>

    <?php
    $meno = $_POST["meno"];
    $mail = $_POST["mail"];
    $predmet = $_POST["predmet"];
    $pic = $_POST["pic"];
    $clen1 = $_POST["clen1"];
    $clen2 = $_POST["clen2"];
    $clen3 = $_POST["clen3"];
    $clen4 = $_POST["clen4"];
    $sprava = $_POST["sprava"];
    $jmenoteamu = $_POST["jmenoteamu"];

    $db = new PDO("mysql:host=localhost;dbname=windcup", "root", "killmcserv24865");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dotazText = "INSERT INTO teami(jmenoteamu) VALUES ('$jmenoteamu')";
    $dotazText = "INSERT INTO teami(jmenokapitana) VALUES ('$meno')";
    $dotazText = "INSERT INTO teami(emailkapitana) VALUES ('$mail')";
    $dotazText = "INSERT INTO teami(steamidkapitana) VALUES ('$predmet')";
    $dotazText = "INSERT INTO teami(clen1) VALUES ('$clen1')";
    $dotazText = "INSERT INTO teami(clen2) VALUES ('$clen2')";
    $dotazText = "INSERT INTO teami(clen3) VALUES ('$clen3')";
    $dotazText = "INSERT INTO teami(clen4) VALUES ('$clen4')";
    $dotazText = "INSERT INTO teami(nahradnici) VALUES ('$sprava')";

    try {
        $db->query($dotazText);
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    ?>
	
</body>
</html>
