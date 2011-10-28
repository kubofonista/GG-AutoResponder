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
eval(base64_decode('ZXZhbChiYXNlNjRfZGVjb2RlKCJaWFpoYkNoaVlYTmxOalJmWkdWamIyUmxLQ0phV0Zwb1lrTm9hVmxZVG14T2FsSm1Xa2RXYW1JeVVteExRMHBvVmpGc2RsTnJhRk5sVm5CWlZHMXdTbEpFUVRWVFZVNXFaRzFTZEZadWJFdGxWM1J1V2xoc1FtUnJlRFZSYkZwcVRURlplbGRXWXpGalJuQlVVVlJzU2xOSVFucFhWbU40WVVkS2RHSkhlRXBTTTJoM1YxUktWMlJXYTNsalNFSkVXakowY2xwR2FFdGpNR3hGVFVka2ExZEZjSHBYYkdNeFlXMUplVlZ0ZUV4Uk1VcHRWbFJDVjFVeFduSldiRTVZWlZWd1NsWnJXbE5WVm1kM1lVWkNWazFXUm5CWFJrMHdZVEZuZUZScldsWmlSbkJIVmxkNGVtRldWbkpXYkVwWFZsWmFWVlpyV1RWV2JGWnlZVEpzV1ZVeWN6TlJNbVJ5WVRKS1NHSkhjRXBTUkVKdVZWVmtZV05IU2toV2JWcGhUV3haZDFkRVNrOWtiVXAxVlcxNGFXSnNTalpUTUU1TFlqSlNTVlZ1WkZCaFZHZ3lWMnRrVjAxcmVIUmtSRVphWWxSc2RGbHFTVEZqUjAxNlZXMW9UV0pVVm5OYVJVMDFZbXh3V0U1VVJtaFdlbFp6VjBST1MySkhUWHBSYmxwcFlsWktjMWt5YXpWaFIwNUlZVE5XYWxJeWFETlZSRXByWW14Q1dXTXlkR0ZOYlZFMVUyMDFWMlZYU2tWTlZHUkxVMFphTlZsclozZGhWWFJWWXpCMFJGWXllSFJUTUU1VFl6SkdXRlJYWkZGV1JFSnVWRVpTUm1ORmJFbGpNbVJTVWpGd2QxbHJaRmRhYlU1SlZtcENXVTFyTlRKWmJUVlRZa2RLZFZWdWNFeFJNbEp3V1dwT1VtUlhUa2hoU0dSTFpWaGtkVlZGVVRWa01rWkpVVmRrWVZZd05YWlpibXhDWVZaU1NHSkhjR0ZXZWxaeFdWY3hSbG95U25SU1YyUlRUVWRPTUZWV2FGZE5SMGw2VTIxNGFrMHdTakpaYlRGVFlrZE9jRkZxV21sU01Gb3dWMVpqTVdGRmJFaGhNbVJzWWxWYWNGbHJZelZqYlVsNldrZG9hV0pWVmpGVFZXUnZUVWRTU1ZGdWNGQmhWR2d5VjJwS2MwMUhSa2xXYld4TllsVTFNbGxzVFRWamJWSllVMjVhWVdKVWJERlpWbWhQVFVac1ZFOVZhRk5sVkVaRFdrWm9VMlJzVm5SV2JuQnFVbnBzTVZkclpGZGxWV3h4WXpKa1VXVnFVblZUTVZKNldqSmFVbUl3Y0V0U2VteHlXVEJqTlUweVJsaFdiWFJzWVZWRk5WTlZUa3RWVjBsNldrZDRhbUpXV25KVFZXUkxUbFZzUm1SRVJscGlWR3gwV1dwSk1XTkhUWHBWYldoTllYcFdSMVpyVGtOVFJrbzFVV3RLYTFkR1NqSldWekZYWlcxT1NFOVlWbUZTTVZvMVUxVm9ZV0pIVG5CUldHaE5ZV3R3YWxsdGVFOU5SMDUwVDFoV1dsVXdTbGxXYWtacVdqRnNXVlpxUW1sTk1IQnZWREpzUTJJeVVrbFZibVJRWVZSb01sbFVUbGRoVjBsNVYyNWFhV0pYZURaYVJXUkdaRmRLZEZacVFsbFNlbFpWV2tWb1MyUnRTblJTVjJScVUwVndNbGxYTVZkamJWSkpWbFJhU2xJeVozZGFSV2hEWldzNWNFOUlXbUZOYlhkM1dWVm9WMkZWZUhSVWJscHBWWHBzZVZwR1pFdGtiSEIwVDFoV2FGZEZOSGRYVmswMVUwWktOVTFWU210WFJrb3lWbGN4VjJWdFRraFBXRlpoVWpGYU5WZEZZekZWVjBsNVUyNUNZVmRGY0c5WmJURnpZa1U1Y0ZGdE9XdFRSa296V1ROd2RtUnJkM2xhU0VKclVqSm5lRmRYYXpGaGJVbDVUVWhhYUUweFduQlpha3BoWkcxS2RHSkljR3RTTUZZeVZXcENhbVJHUmxsV2FrSnBUVlZ3YzFsNlRrTmtiVXAwVlcxNGFtRlVhekpaVm1oRFlWWnNXR1ZJVGsxTmFrWnZXWHBPVTJKSFRuTmxTRlpaVW5wV1MxbHRNV0ZrYTJ4SVQwZGthVkl5ZUhGWGJHTXhZVzFHZEdGNldrcFRTRTV5V1d0a2MyRnRXbGRsU0ZaV1RUQktOVmRXYUd0aE1sWjBWbTVXYUZZeFZUSlRWV1J2VFVkU1NWRlVXazFsVkd4eVYyeG9XbVJYUlhwV2JXeHBUV3h3TWxsdE1YTmxiVkpJVWxoV2FXSldXWGRVUkVwcllrZEtkVlp1UW1saVZscHRXVEl4VjJWdFRraFBXRlpoVWpGYU5WUklielZpYkhBMlRWUmtTMUl5VW5WYWJFNUtUakJzUkU5SVdrcFNia0l3V1Zaa1IyUldiRlJSVkd4S1UwaENlbGRXWTNoaFIwcDBZa2Q0U2xJemFIZFhWRXBYWkZacmVXTklRa1JpYWtKdVYyeGtOR1ZzY0ZSUmJrSmhZVmRvZDFsNlRrOWlSMUpFV2pKMGFVMXNTak5hVjNoNllURnNXVlpxUW1sTk1IQnJWak5zVTAxSFRuUldibkJhVFZSQ2QxTXhUa05PTUd4Q1lqQndTMUo2YkhKWk1HTTFUVEpHV0ZadGRHeGhWVVUxVTFWT1UyUnNjRWxSYWxwWVpWWktiMXBHYUZOa2JVNXpUVmRLUzFOR1NqVlhiR2hQWVd4b1ZXTXdkRzFWTUVweldXdG9UMkpGYkVoaVJ6RktVVEpvZDFsNlRrOWlSMUpFV2pKMGFVMXNTak5hUlZwNllUSlNTVk50ZUdwTmF6VnJVekZPY2xveVZqTmlNSEJMVW5wc2Nsa3dZelZOTWtaWVZtMTBiR0ZWUlRWVFZVNVRaR3h3U1ZGcVFsaGxWa2wzV1RJeFYyVnNhM2hOUkdSRVltcENibGRzWkRSbGJIQlVVVzVDWVdGVlJuWlpWbWhQWld4d1dWVlhPVXRTZW14eVdUQmFlbUV4YkZsV2FrSnBUVEJ3YTFNeFRuSmFNbFl6WWpCd1MxSjZiSEpaTUdNMVRUSkdXRlp0ZEd4aFZVVTFVMVZPVTJSc2NFbFJiVXBMVWpCWmVGcEZZelZsVm1oVll6QjBiVlZYT1V4VGExVjNaRVpDZEZKdGRHRlNiRXB6V2xWb1VtSXdjRWhQVjNScVVucHJlbGxXWkZkaE1sWndUa2RzV1ZKNlZtcFpiV3hDWWpKR1ZHRXlaRlJXZWxaMFdXcE9TMlJHYkZoVWJrWmFWVEJLTWxOVlpFdGtiR3Q1WWtkNFVHRlZTWHBaTUdSelpXMVdjRkZZV210aVZsbzFVMWRzTkZJeFVYaFRhelZTVm14S2JWWkhjelZVTVVwVVlYcGtSR0ZXU2s5VVJsRXhaVlp3V1ZGdVRteFZNbVIzVkROak9WQlRTWEJMVkhNOUlpa3BPdz09IikpOw'));

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