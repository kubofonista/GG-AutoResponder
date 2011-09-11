<?php
include('config.php');
session_start();

if($_SESSION["__ggr_{$gg}"] == true) { Header('Location: index.php'); die; }

if(!empty($haslopanel) AND $_POST['haslo'] == $haslopanel) {
	$_SESSION["__ggr_{$gg}"] = true;
	Header('Location: index.php');
} else {
	echo "<font color='red'><b>Niepoprawne haslo!</b></font>";
}

?>
<html>
<head>
<title>Kubofonista AutoResponder</title>
</head>
<body>
<center>
<form action="" method="POST">
<input type="password" name="haslo" /> <br />
<input type="submit" value="Zaloguj" />
</form>
</center>
</body>
</html>