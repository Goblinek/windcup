<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style/style.css">
	<title>WindCup | Kontakt</title>
	<script src="js/nocopy.js"></script>
    <link rel="shortcut icon" href="images/logo.png">
</head>
<body>
    <div id="nav_wrap">
        <div class="nav">
        <a href="index.php"><img src="images/logo.png"></a>
    	    <ul>
    	    	<li><a href="index.php">Domov</a></li>
    	    	<!-- <li><a href="teams.html">Tímy</a></li> -->
    	    	<li><a href="register.php">Registrácia</a></li>
    	    	<li><a href="rules.php">Pravidlá</a>
    	    	<li><a href="contact.php" class="active">Kontakt</a></li>
    	    </ul>
    	</div>
    </div>
    <div id="main_wrap">
    	<div class="main">

            <?php
                if(isset($_POST["submit"])) {
                    $meno = $_POST['meno'];
                    $mail = $_POST['mail'];
                    $sprava = $_POST['sprava'];
                    $pre = 'dadkop@gmail.com';
                    $predmet = $_POST['predmet'];

                    $telo = "Od: $meno\n Email: $mail\n Správa:\n $sprava";
                    $mail = mail($pre, $predmet, $telo, $mail);

                    if($meno != '' && $mail != '' && $predmet != '' && $sprava != '') {
                        if($mail) {
                             echo "<br><p style='color: #ffb900; text-align: center; font-size: 15px;'>Vaša správa bola odoslaná!</p>";
                        } else {
                            echo "<br><p style='color: #ffb900; text-align: center; font-size: 15px;'>Niečo sa nepodarilo, vráťte sa späť a skúste to znova!</p>";
                        }
                    } else {
                        echo "<br><p style='color: #ffb900; text-align: center; font-size: 15px;'>Musíte odpovedať na všetky potrebné položky!</p>";
                    }
                }
            ?>

    	    <form method="POST" action="contact.php">
                <h4>Vaše meno (povinné)</h4>
                    <input type="text" name="meno" class="jmenoteamu" placeholder="Vaše Meno" required>
                    <h4>Váš email (povinné)</h4>
                    <input type="mail" name="mail" class="meno" placeholder="email@domena.sk" required>
                    <h4>Predmet (povinné)</h4>
                    <input type="text" name="predmet" class="mail" placeholder="Predmet" required>
                    <h4>Vaša správa (povinné)</h4>
                    <textarea name="sprava" class="sprava" placeholder='Vaša správa' required></textarea>
                    <br>
                <input type="submit" name="submit" value="Odoslať" class="odoslat">
            </form>
    	</div>
    </div>
    <div id="footer_wrap">
        <div class="footer footer-abs">
            <p>Designed and coded by <a href="#">PepeDesign</a> &copy; 2017</p>
        </div>
    </div>
</body>
</html>
