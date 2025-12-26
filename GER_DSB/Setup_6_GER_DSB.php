<?php
/*
6 	Type_Indoor 18

$TourId is the ID of the tournament!
$SubRule is the eventual subrule (see sets.php for the order)
$TourType is the Tour Type (6)

*/

//
// Bibliothek "../lib.php" laden
//
// In dieser Bibliothek sind alle Funktionen definiert, die für das Anlegen der Wettkampfregeln notwendig sind.
//
// - UpdateTourDetails() // Anlegen der Wettkampf-Details
// - CreateDistanceInformation() // 
// - CreateDivision() // Anlegen der Bogenklassen
// - CreateClass() // Anlegen der Altersklassen
// - CreateSubClass() // Anlegen von Unterklassen (z.B. "z.Q.")
// - CreateTargetFace() // Anlegen von Auflagengrößen mit Filter für Disziplinen
// - CreateDistanceNew() // Anlegen von Entfernungen mit Filter für Disziplinen
// - CreateEvent() // Anlegen der Final-Disziplinen
// - InsertClassEvent() // Hinzufügen von Bogenklassen+Altersklassen zu Final-Disziplinen
//
require_once(dirname(dirname(__FILE__)) . '/lib.php');

// (Unklar wozu das dient)
$tourCollation = '';

// Wettkampf-Details definieren
$tourDetails = array(
    'ToCollation' => '',
    'ToTypeName' => 'Type_Indoor 18', // Bezeichnung des Wettkampfes (aus Datei "Common/Languages/.../Tournament.php")
    'ToNumDist' => '2', // Entfernungen/Runden
    'ToNumEnds' => '10', // Passen pro Entfernung/Runde
    'ToMaxDistScore' => '300', // Maximale Ringe pro Qualifikationsrunde (Individual)
    'ToMaxFinIndScore' => '150', // Maximale Ringe pro Ausscheidungsrunde (Individual)
    'ToMaxFinTeamScore' => '240', // Maximale Ringe pro Ausscheidungsrunde (Team)
    'ToCategory' => '2', // 0: Other, 1: Outdoor, 2: Indoor, 4:Field, 8:3D
    'ToElabTeam' => '0', // 0:Standard, 1:Field, 2:3DI
    'ToElimination' => '0', // 0: No Eliminations, 1: Elimination Allowed
    'ToGolds' => '10',
    'ToXNine' => '9',
    'ToGoldsChars' => 'L',
    'ToXNineChars' => 'J',
    'ToDouble' => '0',
    'ToIocCode' => 'GER',
);

// Wettkampf-Details in die Datenbank übertragen
UpdateTourDetails($TourId, $tourDetails);

// 
// create a first distance prototype
//
$DistanceInfo =array($tourDetails['ToNumEnds'], 3);
$DistanceInfoArray = array();
array_push($DistanceInfoArray, $DistanceInfo);
array_push($DistanceInfoArray, $DistanceInfo);
//
CreateDistanceInformation($TourId, $DistanceInfoArray, 24, 4);

/*
Create Standard Division
*/
$i = 1;
CreateDivision($TourId, $i++, '620', 'Recurve');
CreateDivision($TourId, $i++, '625', 'Compound');
CreateDivision($TourId, $i++, '626', 'Blankbogen');

/*
CreateStandardClasses
*/
$i = 1;
CreateClass($TourId, $i++, 21, 49, 0, '10', '10', 'Herren');
CreateClass($TourId, $i++, 21, 49, 1, '11', '11', 'Damen');
CreateClass($TourId, $i++, 50, 65, 0, '12', '12,14', 'Master männlich');
CreateClass($TourId, $i++, 50, 65, 1, '13', '13,15', 'Master weiblich');
CreateClass($TourId, $i++, 18, 20, 0, '40', '40', 'Junioren');
CreateClass($TourId, $i++, 18, 20, 1, '41', '41,40', 'Junioren weiblich');
CreateClass($TourId, $i++, 15, 17, 0, '30', '30', 'Jugend');
CreateClass($TourId, $i++, 15, 17, 1, '31', '31,30', 'Jugend weiblich');
CreateClass($TourId, $i++, 13, 14, 0, '20', '20', 'Schüler A');
CreateClass($TourId, $i++, 13, 14, 1, '21', '21,20', 'Schüler A weiblich');

if ($SubRule == '2') {
    // Auch die Landesklassen einbinden
    CreateClass($TourId, $i++, 11, 12, 0, '22', '22', 'Schüler B'); // Landesebene
    CreateClass($TourId, $i++, 11, 12, 1, '23', '23', 'Schüler B weiblich'); // Landesebene
    CreateClass($TourId, $i++, 9, 10, 0, '24', '24', 'Schüler C'); // Landesebene
    CreateClass($TourId, $i++, 9, 10, 1, '25', '25', 'Schüler C weiblich'); // Landesebene
    CreateClass($TourId, $i++, 8, 9, 0, '26', '26', 'Schüler D'); // Land Brandenburg
    CreateClass($TourId, $i++, 8, 9, 1, '27', '27', 'Schüler D weiblich'); // Land Brandenburg
    CreateClass($TourId, $i++, 66, 100, 0, '14', '12,14', 'Senioren'); // Land Brandenburg
    CreateClass($TourId, $i++, 66, 100, 1, '15', '13,15', 'Seniorinnen'); // Land Brandenburg
}

/*
CreateStandardSubClasses
*/
$i = 1;
CreateSubClass($TourId, $i++, 'zQ', 'zur Qualifikation');

/*
Auflagengröße festlegen
*/
$i = 1;
// 620 
// 10 11 12 13 40 41 (nicht 620 14 15)
CreateTargetFace($TourId, $i++, '40\'er Spot', 'REG-^620[14][0123]', '0', TGT_IND_6_big10, 40, TGT_IND_6_big10, 40);
// 620
// 15 16
CreateTargetFace($TourId, $i++, '40\'er', 'REG-^6201[45]', '0', TGT_OUT_FULL, 40, TGT_OUT_FULL, 40);
// 620
// 30 31
CreateTargetFace($TourId, $i++, '40\'er', 'REG-^6203[01]', '0', TGT_OUT_FULL, 40, TGT_OUT_FULL, 40);
// 625 
// 10 11 12 13 14 15 40 41 30 31
CreateTargetFace($TourId, $i++, '40\'er Spot', 'REG-^625[143]', '0', TGT_IND_6_small10, 40, TGT_IND_6_small10, 40);
// 625 
// 20 21
CreateTargetFace($TourId, $i++, '60\'er Spot', 'REG-^6252[01]', '0', TGT_IND_6_small10, 60, TGT_IND_6_small10, 60);
// 626 
// 10 11 12 13 14 15 40 41 30 31
CreateTargetFace($TourId, $i++, '40\'er', 'REG-^626[143]', '0', TGT_OUT_FULL, 40, TGT_OUT_FULL, 40);
// 620 626
// 20 21
CreateTargetFace($TourId, $i++, '60\'er', 'REG-^62[06]2[01]', '0', TGT_OUT_FULL, 60, TGT_OUT_FULL, 60);
// 62x 
// 22 23
CreateTargetFace($TourId, $i++, '80\'er', 'REG-^62[056]2[23]', '0', TGT_OUT_FULL, 80, TGT_OUT_FULL, 80);
// 62x 
// 24 25 26 27
CreateTargetFace($TourId, $i++, '122\'er', 'REG-^62[056]2[4567]', '0', TGT_OUT_FULL, 122, TGT_OUT_FULL, 122);

/*
Entfernungen festlegen
*/

// Wettkampftyp ()
$TourType = 6;

// Entfernungen vordefinieren
$dist_2x_10 = array(array('10m-1', 10), array('10m-2', 10));
$dist_2x_18 = array(array('18m-1', 10), array('18m-2', 10));

// Entfernungen anlegen
CreateDistanceNew($TourId, $TourType, '%10', $dist_2x_18);
CreateDistanceNew($TourId, $TourType, '%11', $dist_2x_18);
CreateDistanceNew($TourId, $TourType, '%12', $dist_2x_18);
CreateDistanceNew($TourId, $TourType, '%13', $dist_2x_18);
CreateDistanceNew($TourId, $TourType, '%14', $dist_2x_18);
CreateDistanceNew($TourId, $TourType, '%15', $dist_2x_18);
CreateDistanceNew($TourId, $TourType, '%30', $dist_2x_18);
CreateDistanceNew($TourId, $TourType, '%31', $dist_2x_18);
CreateDistanceNew($TourId, $TourType, '%40', $dist_2x_18);
CreateDistanceNew($TourId, $TourType, '%41', $dist_2x_18);
CreateDistanceNew($TourId, $TourType, '%20', $dist_2x_18);
CreateDistanceNew($TourId, $TourType, '%21', $dist_2x_18);
CreateDistanceNew($TourId, $TourType, '%22', $dist_2x_18);
CreateDistanceNew($TourId, $TourType, '%23', $dist_2x_18);
CreateDistanceNew($TourId, $TourType, '%24', $dist_2x_18);
CreateDistanceNew($TourId, $TourType, '%25', $dist_2x_18);
CreateDistanceNew($TourId, $TourType, '%26', $dist_2x_10);
CreateDistanceNew($TourId, $TourType, '%27', $dist_2x_10);

/*
Finale
*/
$i = 1;
// Disziplinen für die Final-Wettkämpfe festlegen
CreateEvent($TourId, $i++, 0, 0, 8, 2, 5, 3, 1, 5, 3, 1, '62010', 'Recurve Herren', 1, 240, 240, 0, 0, '', '', 40, 18);
CreateEvent($TourId, $i++, 0, 0, 8, 2, 5, 3, 1, 5, 3, 1, '62011', 'Recurve Damen', 1, 240, 240, 0, 0, '', '', 40, 18);

// Individual-Gruppen den Final-Wettkämpfen zuordnen
InsertClassEvent($TourId, 0, 1, '62010', '620', '10');
InsertClassEvent($TourId, 0, 1, '62011', '620', '11');


//
// if (empty($SubRule)) {
// print_r(empty("leer"));
// }
// print_r("\n");
// print_r($SubRule);

// die();