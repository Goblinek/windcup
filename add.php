<!DOCTYPE html>
 
<html>
<head>
	<title>WindCup | Přidávání novinek</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="style/style.css">
</head>
<body> 
    <div id="bg">
    <div class="main">
    <form method="POST" action="add.php">
        <h4>Nadpis:</h4>
        <input type="text" name="Nadpis" class="Nadpis" required>
        <h4>Admin:</h4>
        <input type="text" name="napsal" class="napsal" required>
        
        <h4>Novinka</h4>
        <textarea name="novinka" class="novinka" placeholder='Novinka' required></textarea>
        <br>
        <input type="submit" name="odoslat" value="Odoslať" class="odoslat">
    </form>
    </div>
    </div>

    <?php
    $Nadpis = $_POST["Nadpis"];
    $datum = date("d.m.y", strtotime($_POST['datum']));
    $napsal = $_POST["napsal"];
    $novinka = $_POST["novinka"];
 
    $db = new PDO("mysql:host=localhost;dbname=windcup", "************", "**************");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (isset($_POST['odoslat'])) {
    $dotazText = "INSERT INTO news(Nadpis, datum, napsal, novinka) VALUES ('$Nadpis', '$datum', '$napsal', '$novinka')";
   try {
        $db->query($dotazText);
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    }
    ?>
	
</body>
</html>
