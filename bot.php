<?php
// Kubofonista AutoResponder by Kubofonista is licensed under a Creative Commons Uznanie autorstwa-Użycie niekomercyjne-Bez utworów zależnych 3.0 Polska License.
// Wolno: kopiować, rozpowszechniać, odtwarzać i wykonywać utwór
// Na następujących warunkach:
// - Uznanie autorstwa — Utwór należy oznaczyć w sposób określony przez Twórcę lub Licencjodawcę 
// - Użycie niekomercyjne — Nie wolno używać tego utworu do celów komercyjnych.
// - Bez utworów zależnych — Nie wolno zmieniać, przekształcać ani tworzyć nowych dzieł na podstawie tego utworu.
// UZNANIE AUTORSTWA POLEGA NA NIE KASOWANIU INFORMACJI O AUTORESPONDERZE Z WIADOMOSCI ZWROTNYCH!!
// http://creativecommons.org/licenses/by-nc-nd/3.0/pl/legalcode

error_reporting(0);

include('db/config.php');

#### USTALENIE KLUCZOWYCH ZMIENNYCH ####
$autor = $_GET['from']; // Autor wiadomosci - numer GG
$ip = $_SERVER['REMOTE_ADDR']; // Adres IP serwera GG
if(!isset($RAW_POST_DATA)){
	$tresc = $GLOBALS['HTTP_RAW_POST_DATA']; // Jeden sposob
} else {
	$tresc = $RAW_POST_DATA; // A tutaj drugi
}
#### EOF USTALENIE KLUCZOWYCH ZMIENNYCH ####

#### ZABEZPIECZENIE PRZED NIEAUTORYZOWANYM DOSTEPEM ####
if(!preg_match('/^91\.197\.15\.[0-9]{1,3}$/', $ip)) { // 91.197.15.* jest tylko dozwolone
	die('403');
}

if(in_array($autor,$ignorowani)) { die; }

include('MessageBuilder.php');
include('PushConnection.php');

$M=new MessageBuilder();
$P = new PushConnection($gg,$mail,$haslo);


if($autor == $admin AND strpos($tresc,'status') !== false) {
	$podzial = explode(' ',$tresc,3);
	$typ = $podzial[1];
	$tresc = $podzial[2];
    switch ($typ) {
        case 'back': $flaga=STATUS_BACK; break;
        case 'away': $flaga=STATUS_AWAY; break;
        case 'dnd': $flaga=STATUS_DND; break;
        case 'invisible': $flaga=STATUS_INVISIBLE; break;
        case 'ffc': $flaga=STATUS_FFC; break;
    }

    $P->setStatus($tresc,$flaga);
	$M->addText('Zapisałem opis pomyślnie ;)',FORMAT_NONE);
	$M->reply();
	die;
}

if(isset($odpz[$autor][$tresc])) { 
	$odpowiedz = $odpz[$autor][$tresc];
} else if (isset($odpt[$tresc])) {
	$odpowiedz = $odpt[$tresc];
} else if (isset($odp[$autor])) {
	$odpowiedz = $odp[$autor];
}

$M->addText($odpowiedz."\n\n //Kubofonista.NET GG AutoResponder",FORMAT_NONE);
$M->reply();

$M->clear();

$kontakty = unserialize(file_get_contents('db/kontakty.txt'));
$knazwa = $kontakty[$autor];

if(empty($knazwa)) { $knazwa = '<NIEZNANY>'; }

$data = date('d.m.Y G:i');
$tre = "[{$data}] {$knazwa} - gg://{$autor} :
{$tresc}
---";

if($forward == 1){
	$M->addText($tre,FORMAT_NONE);
	$M->setRecipients($admin);
	$P->push($M);  
}

$baza = file_get_contents('db/wiadomosci.txt');
$baza .= $tre."\n";
file_put_contents('db/wiadomosci.txt',$baza);
?>