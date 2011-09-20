<?php
include('config.php');
session_start();

if($_SESSION["__ggr_{$gg}"] != true) { Header('Location: auth.php'); die; }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>GG-AutoResponder by Kubofonista</title>
		<meta name="description" content="AutoResponder Gadu-Gadu">
		<link rel="stylesheet" href="sitefile/style.css" type="text/css">
		<link rel="shortcut icon" href="sitefile/favicon.ico" type="image/x-icon">
	</head>
	<body>
		<div id="body">
			<div style="width:1000px;margin:0 auto">
				<div style="position:relative;height:80px">
					<a href="#" style="text-decoration:none">
						<img src="sitefile/gg.png" style="position:absolute;top:10px;left:10px" />
						<div style="position:absolute;top:30px;left:80px;text-shadow:2px 1px 1px #FFFFFF;color:#3A3939;font-size:18px;">GG-AutoResponder</div>
					</a>
				</div>
				<div id="menu">
<!-- menu -->
					<ul>
						<li class="page"><a href="index.php">Start</a></li>
						<li class="page"><a href="wiadomosci.php">Lista wiadomości</a></li>
						<li class="page"><a href="opis.php">Opis AutoRespondera</a></li>
						<li class="page current_page"><a href="contacts.php">Lista kontaktów</a></li>
						<li class="page"><a href="info.php">Informacje</a></li>
						<li class="page"><a href="wyloguj.php">Wyloguj się</a></li>
					</ul>
<!-- menu end -->
				</div>
				<div id="content" style="background:#fff;padding:15px;-moz-border-radius-bottomleft:5px;-moz-border-radius-bottomright:5px;-webkit-border-bottom-left-radius: 5px;-webkit-border-bottom-right-radius: 5px; border-bottom-right-radius: 5px; border-bottom-left-radius: 5px;">
<!-- body -->
					<h1>Wgraj listę kontaktów</h1>
					<div style="background: #FFFFDD; padding: 10px; margin: 6px; border: 1px dashed #000;"><i><b>Info:</b> Tutaj możesz wgrać swoją wcześniej weksportowaną listę kontaktów z komunikatora. Dzięki temu na liście wiadomości prócz numerów osób piszących będą widoczne także ich nazwy. Kontakty należy wkleić w formacie z GG7 bądź starszym (np. można pobrać je za pomocą komunikatora WTW i wyeksportować do pliku).</i>
					</div>
					<br />
					<?php
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
						echo "<font color='green'><b>Zapisano pomyślnie!</b></font>";
					}
					?>
					<form action="" method="POST">
						<b>Treść listy kontaktów:</b><br />
						<textarea name="kontakty" rows="20" cols="100"></textarea><br />
						<input type="submit" value="Zapisz &raquo;" />
					</form>
<!-- body end -->
				</div>
				<div id="stopka" style="text-align:center;padding-top:14px">
					<a href="http://kubofonista.net">Strona www autora</a> | 
					<a href="https://github.com/kubofonista/GG-AutoResponder">Strona projektu</a> | 
					<a href="https://github.com/kubofonista/GG-AutoResponder/zipball/master">Pobieranie</a>
					<br />Powered by Kubofonista.NET GG-AutoResponder ver 1.1 
				</div>
				<div style="clear:both"></div>
			</div>
		</div>
	</body>
</html>