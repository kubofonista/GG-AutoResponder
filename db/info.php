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
							<li class="page"><a href="index.php">Start</a></li>
							<li class="page current_page"><a href="info.php">Informacje</a></li>
<!-- menu end -->
						</ul>
					</div>
					<div id="content" style="background:#fff;padding:15px;-moz-border-radius-bottomleft:5px;-moz-border-radius-bottomright:5px;-webkit-border-bottom-left-radius: 5px;-webkit-border-bottom-right-radius: 5px; border-bottom-right-radius: 5px; border-bottom-left-radius: 5px;">
<!-- body -->
						<h1>Informacje o GG-AutoResponderze by Kubofonista</h1>

						<h3>Co to jest ?</h3>

						<p>Jest to moja wersja AutoRespondera gdyż ten od GG nie podobał mi się, nie umożliwiał zmiany opisów ani innych zaawansowanych opcji jak chociażby pełnego ignorowania (można było tylko ignorować rejestrowanie tych wiadomości), ponadto nie zamieniał numerów GG na ich odpowiedniki z listy kontaktów więc zrobiłem coś swojego :)</p>

						<h3>Funkcjonalności</h3>

						<ul>
							<li>Bot uruchamia się TYLKO gdy nie ma nas na komunikatorze</li>
							<li>Własny opis oraz GG podczas nieobecności</li>
							<li>Rejestrowanie wiadomości lub wysyłanie ich również pod nasz drugi numer GG</li>
							<li>Możliwość zdalnego zmieniania opisu (za pomocą innego numeru GG)</li>
							<li>Rejestrowane wiadomości poza numerami GG mogą zawierać nazwę osób z listy kontaktów</li>
							<li>Możliwość ustawienia osobnego tekstu zwrotnego w zalezności od otrzymanej wiadomości</li>
							<li>Możliwość ustawienia osobnego tekstu zwrotnego dla każdego nadawcy osobno (np. numer 1 otrzyma X a numer 2 dostanie Y)</li>
							<li>Możliwosć połączenia obu powyższych i ustalenia, że np. numer 1 na treść A otrzyma odpowiedź X, numer2 na tą samą treść otrzyma Y a wszyscy inni otrzymają na tą treść odpowiedź Z</li>
						</ul>
						
						<p>Bota można dowolnie rozbudowywać na użytek własny (jeśli chcesz na publiczny to tylko za uznaniem autorstwa).</p>

						<h3>Instalacja</h3>

						<ol>
							<li>Wrzucamy bota gdzieś na serwer własny, tak aby był dostępny z poziomu WWW</li>
							<li>Za pomocą strony <a href="https://boty.gg.pl/rejestracja/" target="_blank">https://boty.gg.pl/rejestracja/</a> zakładamy bota na własnym numerze GG. Tego typu boty działają tylko gdy nikt nie jest zalogowany na numerze z komunikatora więc będzie ok :)</li>
							<li>Po weryfikacji mailowej jako adres podajemy link do pliku bot.php</li>
							<li>W pliku db/config.php uzupełniamy niezbędne dane, mail oraz hasło to dane otrzymane od GG w drugim mailu po założeniu bota, ustalamy tam również hasło dostępu do panelu administratora.</li>
							<li>Ustawiamy pozostałe ustawienia, np numer GG admina (jeśli nie chcemy mieć zdalnego zmieniania opisów za pomocą innego numeru GG można wpisać swój), opcjonalnie mozna włączyć przekazywanie wiadomości na inny numer, zawsze będą zapisywane do pliku.</li>
							<li>Po wejściu z poziomu przeglądarki do katalogu db oraz zalogowaniu się mamy możliwość podglądu wiadomości, zmiany opisu bota oraz importu listy kontaktów.</li>
							<li>Importowanie listy kontaktów jest opcjonalne jednak jeśli to zrobimy to bot poza numerami GG będzie zapisywał także odpowiadające im nazwy z naszych kontaktów co jest fajne :) W tym celu należy wyeksportować dane do formatu z GG 7 (np. za pomocą komunikatora WTW) oraz wkleić w podane pole [dane te mają format oddzielony nowymi liniami oraz średnikami])</li>
						</ol>
						
						<h3>Licencja</h3>

						<p>Skrypt oparty jest na licencji Creative Commons Uznanie autorstwa-Użycie niekomercyjne-Bez utworów zależnych 3.0 Polska License.</p>

						<p>Wolno: kopiować, rozpowszechniać, odtwarzać i wykonywać utwór</p>

						<p>Na następujących warunkach:</p>

						<ul>
							<li><p>Uznanie autorstwa — Utwór należy oznaczyć w sposób określony przez Twórcę lub Licencjodawcę </p></li>
							<li><p>Użycie niekomercyjne — Nie wolno używać tego utworu do celów komercyjnych.</p></li>
							<li><p>Bez utworów zależnych — Nie wolno zmieniać, przekształcać ani tworzyć nowych dzieł na podstawie tego utworu.</p></li>
						</ul>
						
						<p>Uznanie autorstwa polega na zakazie usuwania informacji o bocie z wiadomości zwrotnych oraz nie naruszanie odpowiedzi na /ver</p>

						<p>Pełen tekst licencji dostępny jest w pliku <a href="https://github.com/kubofonista/GG-AutoResponder/blob/master/LICENCJA.mkd" target="_blank">LICENCJA.mkd</a></p>
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