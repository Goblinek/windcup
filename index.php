<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="generator" content="PSPad editor, www.pspad.com">
   <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="style/style.css">
	<title>WindCup | Domov</title>
</head>
<body>
    <div id="nav_wrap">
        <div class="nav">
        <a href="index.php"><img src="images/logo.png"></a>
    	    <ul>
    	    	<li><a href="index.php" class="active">Domov</a></li>
    	    	<li><a href="teams.php">Teamy</a></li>
    	    	<li><a href="register.php">Registrácia</a></li>
    	    	<li><a href="rules.php">Pravidlá</a>
    	    	<li><a href="contact.php">Kontakt</a></li>
    	    </ul>
    	</div>
    </div>
        <center><br />
        <br />
        <br />
        <br />
        <br /><br><br />
        <br />
        <br />
        <br />
        <br />
          <?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "******", "*******", "windcup");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Attempt select query execution
$sql = "SELECT * FROM news";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>Nadpis</th>";
                echo "<th>napsal</th>";
                echo "<th>datum</th>";
                echo "<th>novinka</th>";
            echo "</tr>";
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['Nadpis'] . "</td>";
                echo "<td>" . $row['napsal'] . "</td>";
                echo "<td>" . $row['datum'] . "</td>";
                echo "<td>" . $row['novinka'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
 
// Close connection
mysqli_close($link);
?>             </center>
  </body>
</html>
