<?php
include('config.php');
session_start();

if($_SESSION["__ggr_{$gg}"] != true) { Header('Location: auth.php'); die; }
?>
<html>
<head>
<title>Kubofonista AutoResponder</title>
</head>
<body>
<center>
<h1><a href="wiadomosci.php">Zobacz wiadomosci &raquo;</a></h1>
<h1><a href="contacts.php">Edytuj liste kontaktow &raquo;</a></h1>
<h1><a href="opis.php">Zmien opis respondera &raquo;</a></h1>
</center>
</body>
</html>