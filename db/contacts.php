<?php
include('config.php');
session_start();

if($_SESSION["__ggr_{$gg}"] != true) { Header('Location: auth.php'); die; }

if($_POST) {
	$kontakty = $_POST['kontakty'];
	$kontakt = explode("\n",$kontakty);
	
	$karr = Array();
	foreach ($kontakt as $ktory=>$kdata) {
		$dane = explode(';',$kdata);
		$nazwa = $dane[2];
		$numer = $dane[6];
		
		$karr[$numer] = $nazwa;
	}
	file_put_contents('kontakty.txt',serialize($karr));
	echo "<font color='green'><b>Zapisano pomyslnie!</b></font>";
}
?>
Wklejamy kontakty w formacie z GG7. Mozna np pobrac je za pomoca WTW i wyeksportowac do pliku <br />
<form action="" method="POST">
<textarea name="kontakty" rows=20 cols=100></textarea><br />
<input type="submit" value="Zapisz &raquo;" />
</form>