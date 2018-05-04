<?php
require_once('Common/Fun_Modules.php');
$version='2018-01-20 08:13:00';

/*
Copy from IANSEO Original

regole FITA
* Tipo FITA, 2xFITA, 1/2FITA e 70m (1, 2, 3, 4)
- 4 subrules (tutte le classi, una sola classe, S-J e J-C)
- incluse le finali (nuove regole per OL e CO)

* tipo indoor: (6, 7, 8)
- 4 subrules (come sopra) solo per 18
- incluse finali solo per 18m

* tipo 900 round (5)
- 1 subrule (tutte le classi)
- no finali

* tipo HF (12+12 1 dist, 12+12 2 dist, 24+24 2 dist) (9, 10, 12)
- 2 subrules (S-J e Tutte le classi)
- finali (separate per classi)

* tipo 3D (1 e 2 dist) (11, 13)
- 2 subrules (S e Tutte classi)
- finali (16-8)



*** per l'italia farei "Giovanili", "Adulti","Tutte le classi"

*/

/*
switch($TourType) {
	case  1: // WA 1440
	case  2: // 2x WA 1440
	case  3: // 720'er Runde
	case  4: // 2x 720'er Runde
	case  5: // 900 Round
	case  6: // 18m Indoor
	case  7: // 25m Indoor
	case  8: // 25+18m Indoor
	case  9: // Field (1x24)
	case 10: // Field (2x24)
	case 11: // 3D (1x24)
	case 12: // Field (2x12)
	case 13: // 3D (2x24)
	case 18: // 50m
}
*/



//$AllowedTypes=array(1,2,3,4,5,6,7,8,9,10,11,12,13,18);
/*
2018-02-04 Andreas Schwotzer

Folgende Wettkampftypen habe ich in der Unsertung weiter betrachtet:

case  1: // WA 1440
case  3: // 720'er Runde - DM
case  5: // 900 Round
case  6: // 18m Indoor - DM
case  9: // Field (1x24)
case 11: // 3D (1x24)
case 12: // Field (2x12)
case 13: // 3D (2x24) - DM

*/
$AllowedTypes=array(1,3,5,6,9,11,12,13);


// $SetType['default']['descr']=get_text('Setup-Default', 'Install');
$SetType['GER_DSB']['descr']='Germany - DSB';
$SetType['GER_DSB']['types']=array();
$SetType['GER_DSB']['rules']=array();

foreach($AllowedTypes as $val) {
	$SetType['GER_DSB']['types']["$val"]=$TourTypes[$val];
}

/*
Es wird mit den Unterklassen "keine weiteren unterklassen (entspricht DM)" und
"Alle Klassen (entspricht LM)" gearbeitet
*/

foreach(array(3,6,9,12) as $val) {
	$SetType['GER_DSB']['rules']["$val"]=array('SetAllClass','NoSubRules');
}


?>
