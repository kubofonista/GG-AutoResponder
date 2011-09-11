<?php
include('config.php');
session_start();

if($_SESSION["__ggr_{$gg}"] != true) { Header('Location: auth.php'); die; }

if($_POST) {
	include('../PushConnection.php');
	$P = new PushConnection($gg,$mail,$haslo);
	$typ = $_POST['typ'];
	$tresc = $_POST['opis'];
    switch ($typ) {
        case 'back': $flaga=STATUS_BACK; break;
        case 'away': $flaga=STATUS_AWAY; break;
        case 'dnd': $flaga=STATUS_DND; break;
        case 'invisible': $flaga=STATUS_INVISIBLE; break;
        case 'ffc': $flaga=STATUS_FFC; break;
    }

    $P->setStatus($tresc,$flaga);
	echo "<b>Ustawiony pomyslnie!</b><br />";
}
?>
<form action="" method="POST">
Opis: <input name="opis" size=50 />
Typ:    <select name="typ">
        <option value="back">Dostêpny</option>
        <option value="away">Zaraz wracam</option>

        <option value="dnd">Nie przeszkadzaæ</option>
        <option value="ffc">Porozmawiajmy</option>
    </select>
<input type="submit" value="Zapisz &raquo;" />
</form>