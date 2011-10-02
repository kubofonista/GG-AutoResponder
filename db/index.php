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
					<ul>
<!-- menu -->
						<li class="page current_page"><a href="index.php">Start</a></li>
						<li class="page"><a href="wiadomosci.php">Lista wiadomości</a></li>
						<li class="page"><a href="opis.php">Opis AutoRespondera</a></li>
						<li class="page"><a href="contacts.php">Lista kontaktów</a></li>
						<li class="page"><a href="info.php">Informacje</a></li>
						<li class="page"><a href="wyloguj.php">Wyloguj się</a></li>
<!-- menu end -->
					</ul>
				</div>
				<div id="content" style="background:#fff;padding:15px;-moz-border-radius-bottomleft:5px;-moz-border-radius-bottomright:5px;-webkit-border-bottom-left-radius: 5px;-webkit-border-bottom-right-radius: 5px; border-bottom-right-radius: 5px; border-bottom-left-radius: 5px;">
<!-- body -->
					<h1>Witaj w panelu GG-AutoRespondera</h1>
					<div>GG-AutoResponder czyli bot Gadu-Gadu działający na platformie GG (nie na komputerze użytkownika) dzięki czemu nasz numer może być online 24 godz. na dobę. Pozwala na ustawienie własnego opisu, listę ignorowanych osób, własną treść auto-odpowiedzi oraz forward (przekierowanie) otrzymanych wiadomości pod inny numer GG lub ich zapis do pliku. Więcej szczegółów na temat tego bota znajdziesz w zakładce "Informacje".
					</div>
					<br />
					<ul>
						<li><a href="wiadomosci.php"><b>Zobacz listę wiadomości &raquo;</b></a></li>
						<li><a href="opis.php"><b>Zmień opis AutoRespondera &raquo;</b></a></li>
						<li><a href="contacts.php"><b>Wgraj listę kontaktów &raquo;</b></a></li>
						<li><a href="info.php"><b>Informacje &raquo;</b></a></li>
						<li><a href="wyloguj.php"><b>Wyloguj się &raquo;</b></a></li>
					</ul>
					<?php
					$aktualna = file_get_contents('ver.txt');
					$najnowsza = file_get_contents('https://raw.github.com/kubofonista/GG-AutoResponder/master/db/ver.txt');
					
					if($najnowsza > $aktualna) {
						echo '<br /><div style="background: #FFFFDD; padding: 10px; margin: 6px; border: 1px dashed #000; font-size:15px; color:brown"><b>Dostępna jest nowsza wersja respondera! <a href="https://github.com/kubofonista/GG-AutoResponder/zipball/master">Pobierz &raquo;</a></b><br /><br />';
						echo '<div style="background: #EDEDD2; padding: 10px; border: 1px dotted #A0522D; font-size:11px; color:black;"><b>Changelog projektu:</b><br />';
						$zmiany = file_get_contents('https://api.github.com/repos/kubofonista/gg-autoresponder/commits');
						$zmiany = json_decode($zmiany,true);
						foreach ($zmiany as $nic=>$zmianyy) {
							$data = strtotime($zmianyy['commit']['author']['date']);
							$data = date('d.m.Y G:i',$data);
							$tresc = $zmianyy['commit']['message'];
							$url = $zmianyy['commit']['url'];
							$url = str_replace('api.','',$url);
							$url = str_replace('repos/','',$url);
							$url = str_replace('git/','',$url);
							$url = str_replace('commits','commit',$url);
							echo "[{$data}] - {$tresc} | <a href='{$url}' target='_blank'>Lista zmian w plikach &raquo;</a><br />";
						}
						echo '</div></div>';
					}
					?>
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