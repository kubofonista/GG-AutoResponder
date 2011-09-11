<?php
#### KONFIGURACJA ####
// Dane autoryzacyjne z boty.gg.pl
$gg = 1;
$mail = '';
$haslo = '';

$haslopanel = ''; // Haslo do panelu administracyjnego

$ignorowani = Array(1,2); // Numery ktorych wiadomosci nie sa rejestrowane i nie dostaja odpowiedzi
$admin = 3; // Numer GG z uprawnieniami do zmianu opisu oraz numer na ktory przekierowywane sa wiadomosci

$forward = 0; // Czy przekazywac wiadomosci na numer GG admina? 1 - tak; 0 - nie
$odpowiedz = 'Witaj, blebleble'; // Domyslna odpowiedz na wiadomosc

// STREFA ODPOWIEDZI INDYWIDUALNYCH - NUMERY //
$odp[1] = 'Witaj, numerze jeden!:D'; // Odpowiedz jaka dostanie osoba o numerze 1 - pozostale wiadomosci wedle schematu
$odp[123] = 'Blebleble'; // Odpowiedz dla osoby o numerze 123

// STREFA ODPOWIEDZI INDYWIDUALNYCH - TEKSTY //
$odpt['pomoc'] = 'Witaj w komendzie pomocy!'; // Odpowiedz jaka dostanie osoba piszaca wiadomosc o tresci pomoc

// STREFA ODPOWIEDZI ZAAWANSOWANYCH - OSOBY & TRESCI //
$odpz[123]['pomoc'] = 'Witaj numerze 123 w pomocy!'; // Odpowiedz jaka dostanie numer 123 piszacy wiadomosc o tresci pomoc

// PRIORYTETY: Najpierw sprawdzana jest wiadomosc zaawansowana, pozniej tekstowa, nastepnie numeryczna a jesli zadna nie pasuje - wysylana domyslna

#### KONIEC KONFIGURACJI!! ####
?>