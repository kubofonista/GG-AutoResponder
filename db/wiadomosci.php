<?php
include('config.php');
session_start();

if($_SESSION["__ggr_{$gg}"] != true) { Header('Location: auth.php'); die; }
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kubofonista AutoResponder</title>
</head>
<body>
<?php
$wiad = file_get_contents('wiadomosci.txt');
$wiad = htmlspecialchars($wiad);
$wiad = nl2br($wiad);
$wiad = preg_replace('/gg\:\/\/([0-9]+)/', '<a href="gg://$1">GG:$1</a>', $wiad);
echo $wiad;
?>
</body>
</html>