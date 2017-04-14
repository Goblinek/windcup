<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style/style.css">
	<title>WindCup | Registrácia</title>
</head>
<body>
    <div id="nav_wrap">
        <div class="nav">
        <a href="index.html"><img src="images/logo.png"></a>
    	    <ul>
    	    	<li><a href="index.html">Domov</a></li>
    	    	<li><a href="teams.html">Teamy</a></li>
    	    	<li><a href="register.html" class="active">Registrácia</a></li>
    	    	<li><a href="rules.html">Pravidlá</a>
    	    	<li><a href="contact.html">Kontakt</a></li>
    	    </ul>
    	</div>
    </div>
    <div id="main_wrap">
    	<div class="main">
    		<form method="POST" action="register.php" accept="image/png" enctype="multipart/form-data">
    		    <div style="float: left; margin-left: 150px;">
                    <h4>Meno Teamu</h4>
                    <input type="text" name="jmenoteamu" class="jmenoteamu" placeholder="Meno Teamu" required>
                    <h4>Meno a Priezvisko kapitána tímu</h4>
                    <input type="text" name="meno" class="meno" placeholder="Meno Priezvisko" required>
                    <h4>Email kapitána teamu</h4>
                    <input type="text" name="mail" class="mail" placeholder="email@domena.sk" required>
                    <h4>SteamID kapitána teamu</h4>
                    <input type="text" name="predmet" class="predmet" placeholder="https://www.steamcommunity.com/id/***" required>
                </div>
                <div style="float: right; margin-right: 150px;">
                    <h4>Hráč 2:</h4>
                    <input type="text" name="clen1" class="clen1" placeholder='Meno "nick" Priezvisko' required>
                    <h4>Hráč 3:</h4>
                    <input type="text" name="clen2" class="clen2" placeholder='Meno "nick" Priezvisko' required>
                    <h4>Hráč 4:</h4>
                    <input type="text" name="clen3" class="clen3" placeholder='Meno "nick" Priezvisko' required>
                    <h4>Hráč 5:</h4>
                    <input type="text" name="clen4" class="clen4" placeholder='Meno "nick" Priezvisko' required>
                </div>
                <div style="clear: both; padding-top: 20px;">
                    <h4>Logo tímu (png obrázok)</h4>
                    <input type="file" name="picUpload" id="picUpload" class="pic" required>
                    <h4>Mená náhradníkov v odrážkách</h4>
                    <textarea name="sprava" class="sprava" placeholder='Meno "nick" Priezvisko' required></textarea>
                    <br>
                <input type="submit" name="odoslat" value="Odoslať" class="odoslat">
                </div>

               <?php
                // Odoslanie do tabuľky
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
 
                $db = new PDO("mysql:host=localhost;dbname=windcup", "******", "******");
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $dotazText = "INSERT INTO teami(jmenoteamu, jmenokapitana, emailkapitana, steamidkapitana, clen1, clen2, clen3, clen4, nahradnici) VALUES ('$jmenoteamu', '$meno', '$mail', '$predmet', '$clen1', '$clen2', '$clen3', '$clen4', '$sprava')";
                try {
                    $db->query($dotazText);
                } catch (PDOException $e) {
                  echo $e->getMessage();
                }
                
                // Odoslanie obrázka
                $odoslat_do = "images/teams/";
                $odoslat_subor = $odoslat_do . basename($_FILES["picUpload"]["name"]);
                $uploadOk = 1;
                $typObrazka = pathinfo($odoslat_subor, PATHINFO_EXTENSION);
                // Pozrieť či je obrázok naozaj obrázkom alebo je to fejk
                if(isset($_POST["submit"])) {
                	$pozriet = getimagesize($_FILES["picUpload"]["tmp_name"]);
                	if($pozriet !== false) {
                		$uploadOk = 1;
                	} else {
                		echo "<p>Obrázok nie je obrázkom.</p>";
                		$uploadOk = 0;
                	}
                }
                // Ak obrázok v priečinku už existuje
                if(file_exists($odoslat_subor)) {
                	echo "<p>Prepáčte, ale obrázok s týmto názvom už existuje.</p>";
                	$uploadOk = 0;
                }
                // Ak obrázok presahuje povolené množstvo veľkosti súboru (10MB = 10 000 000B)
                if($_FILES["picUpload"]["size"] > 10000000) {
                	echo "<p>Prepáčte, váš obrázok je príliš veľký</p>";
                	$uploadOk = 0;
                }
                // Povoliť len png formát obrázku
                if($imageFileType != "png") {
                	echo "<p>Prepáčte, ale povolený formát obrázka je v png formáte.</p>";
                	$uploadOk = 0;
                }
                // Obrázok sa nenahral kvôli "0" chybe
                if($uploadOk = 0) {
                    echo "<p>Prepáčte, váš obrázok nebol nahratý.</p>";
                // ak je všetko ok, nahrať obrázok
                } else {
                    if(move_uploaded_file($_FILES["picUpload"]["tmp_name"], $odoslat_subor)) {
                        echo "<p>Obrázok " . basename($_FILES["picUpload"]["name"]) . " bol úspešne nahratý.</p>";
                    } else {
                        echo "<p>Prepáčte, vyskytol sa nejaký problém s nahrávím vášho obrázka. Prosím skúste to znova neskôr.</p>";
                    }
                }

                ?>

            </form>
    	</div>
    </div>
</body>
</html>