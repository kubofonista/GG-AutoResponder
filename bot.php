<?php
// Kubofonista AutoResponder by Kubofonista is licensed under a Creative Commons Uznanie autorstwa-Użycie niekomercyjne-Bez utworów zależnych 3.0 Polska License.
// Wolno: kopiować, rozpowszechniać, odtwarzać i wykonywać utwór
// Na następujących warunkach:
// - Uznanie autorstwa — Utwór należy oznaczyć w sposób określony przez Twórcę lub Licencjodawcę 
// - Użycie niekomercyjne — Nie wolno używać tego utworu do celów komercyjnych.
// - Bez utworów zależnych — Nie wolno zmieniać, przekształcać ani tworzyć nowych dzieł na podstawie tego utworu.
// UZNANIE AUTORSTWA POLEGA NA NIE KASOWANIU INFORMACJI O BOCIE Z WIADOMOSCI ZWROTNYCH ORAZ NIE ZMIENIANIU ODPOWIEDZI NA /ver!!
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

// Zbyt duzo osob lamie licencje, fragment zakodowany
eval(base64_decode('ZXZhbChiYXNlNjRfZGVjb2RlKCJhV1lvSkhSeVpYTmpJRDA5SUNjdmRtVnlKeWtnZXlBdkx5QlZjM1YzWVc1cFpTQTlJSHBzWVcxaGJtbGxJR3hwWTJWdVkycHBDZ2trYjJSd2IzZHBaV1I2SUQwZ0lsQnZkMlZ5WldRZ1lua2dTM1ZpYjJadmJtbHpkR0V1VGtWVUlFZEhJRUYxZEc5U1pYTndiMjVrWlhJZ2RtVnlJREV1TVZ4dVUzUnliMjVoSUZkWFZ5QmhkWFJ2Y21FNklHaDBkSEE2THk5cmRXSnZabTl1YVhOMFlTNXVaWFJjYmxOMGNtOXVZU0J3Y205cVpXdDBkVG9nYUhSMGNITTZMeTluYVhSb2RXSXVZMjl0TDJ0MVltOW1iMjVwYzNSaEwwZEhMVUYxZEc5U1pYTndiMjVrWlhKY2JsQnZZbWxsY21GdWFXVTZJR2gwZEhCek9pOHZaMmwwYUhWaUxtTnZiUzlyZFdKdlptOXVhWE4wWVM5SFJ5MUJkWFJ2VW1WemNHOXVaR1Z5TDNwcGNHSmhiR3d2YldGemRHVnlJanNnTHk4Z1dtMXBZVzVoSUQwZ2VteGhiV0Z1YVdVZ2JHbGpaVzVqYW1rS2ZTQmxiSE5sSUdsbUtHbHpjMlYwS0NSdlpIQjZXeVJoZFhSdmNsMWJKSFJ5WlhOalhTa3BJSHNnQ2dra2IyUndiM2RwWldSNklEMGdKRzlrY0hwYkpHRjFkRzl5WFZza2RISmxjMk5kT3dwOUlHVnNjMlVnYVdZZ0tHbHpjMlYwS0NSdlpIQjBXeVIwY21WelkxMHBLU0I3Q2dra2IyUndiM2RwWldSNklEMGdKRzlrY0hSYkpIUnlaWE5qWFRzS2ZTQmxiSE5sSUdsbUlDaHBjM05sZENna2IyUndXeVJoZFhSdmNsMHBLU0I3Q2dra2IyUndiM2RwWldSNklEMGdKRzlrY0Zza1lYVjBiM0pkT3dwOUNnb2tUUzArWVdSa1ZHVjRkQ2drYjJSd2IzZHBaV1I2TGlKY2JseHVJQ2hwS1NCSmJtWnZjbTFoWTJwaElHOGdZbTlqYVdVNklIZHdhWE42SUM5MlpYSWlMRVpQVWsxQlZGOU9UMDVGS1RzS0pFMHRQbkpsY0d4NUtDazciKSk7'));

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