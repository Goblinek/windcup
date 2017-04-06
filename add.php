<!DOCTYPE html>
 
<html>
<head>
	<title>WindCup | Registrácia</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body> 
    <div id="bg">
    <form method="POST" action="add.php">
        <h4>Nadpis:</h4>
        <input type="text" name="Nadpis" class="Nadpis" required>
        <h4>Datum:</h4>
        <input type="text" name="datum" class="datum" required>
        <h4>Admin:</h4>
        <input type="text" name="napsal" class="napsal" required>
        
        <h4>Novinka</h4>
        <textarea name="novinka" class="novinka" placeholder='Novinka' required></textarea>
        <br>
        <input type="submit" name="odoslat" value="Odoslať" class="odoslat">
    </form>
    </div>

    <?php
    $Nadpis = $_POST["Nadpis"];
    $datum = $_POST["datum"];
    $admin = $_POST["napsal"];
    $novinka = $_POST["novinka"];
 
    $db = new PDO("mysql:host=localhost;dbname=windcup", "root", "killmcserv24865");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dotazText = "INSERT INTO news(Nadpis, datum, napsal, novinka) VALUES ('$Nadpis', '$datum', '$napsal', '$novinka')";
   try {
        $db->query($dotazText);
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    ?>
	
</body>
</html>