<?php
include('config.php');
session_start();
if($_SESSION["__ggr_{$gg}"] == true) { Header('Location: index.php'); die; }

if(!empty($haslopanel) AND $_POST['haslo'] == $haslopanel) {
	$_SESSION["__ggr_{$gg}"] = true;
	Header('Location: index.php');
} else if ($_POST) {
	$paserr = "<font color='red'><b>Niepoprawne hasło</b></font>";
} else {
	$paserr = '';
}
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
	<script type="text/javascript">
	function focus() {
		document.getElementById("haslo").focus();
	}
	</script>
	<body onLoad="focus()">
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
						<li class="page current_page"><a href="auth.php">Logowanie</a></li>
						<li class="page"><a href="info.php">Informacje</a></li>
<!-- menu end -->
					</ul>
				</div>
				<div id="content" style="background:#fff;padding:15px;-moz-border-radius-bottomleft:5px;-moz-border-radius-bottomright:5px;-webkit-border-bottom-left-radius: 5px;-webkit-border-bottom-right-radius: 5px; border-bottom-right-radius: 5px; border-bottom-left-radius: 5px;">
<!-- body -->
					<h1>Zaloguj się</h1>
					<div style="background: #FFFFDD; padding: 10px; margin: 6px; border: 1px dashed #000;"><i><b>Info:</b> Hasło dostępu należy zdefiniować w pliku config.php. Jeżeli masz problemy z konfiguracją bota zajrzyj do zakładki "Informacje" tam znajdziesz niezbędne szczegóły.</i>
					</div>
					<br />
					<center>
					<?php echo $paserr; ?>
						<form action="" method="POST">
							<b>Hasło dostępu:</b><br />
							<input type="password" id="haslo" name="haslo" /><br />
							<input type="submit" value="Zaloguj &raquo;" />
						</form>
					</center>
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