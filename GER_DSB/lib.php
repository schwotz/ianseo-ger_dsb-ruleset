<?php

/*

STANDARD DEFINITIONS (Target Tournaments)

*/

/*
2018-04-29 Andreas Schwotzer

Folgende Wettkampftypen habe ich in der Unsertung weiter betrachtet:

case  1: // WA 1440
case  3: // 720'er Runde
case  5: // 900 Round
case  6: // 18m Indoor
case  7: // 25m Indoor
case  9: // Field (1x24)
case 11: // 3D (1x24)
case 12: // Field (2x12)
case 13: // 3D (2x24)

Subrules
1: // Landesebene
2: // Nur BundesEbene

*/

// these go here as it is a "global" definition, used or not
$tourCollation = '';

$tourDetIocCode = 'GER_DSB';
if(empty($SubRule)) $SubRule='1';


/*
* Bogendiszipinnen anlegen
*/
function CreateStandardDivisions($TourId, $Type=1, $SubRule=0) {
	$i=1;

	switch ($Type) {
		case 6: // 18m Indoor
		case 7: // 25m Indoor
			CreateDivision($TourId, $i++, '20', 'Recurve');
			CreateDivision($TourId, $i++, '25', 'Compound');
			CreateDivision($TourId, $i++, '26', 'Blankbogen');
			break;
		case 9:  // Field (1x24)
		case 12: // Field (2x12)
			CreateDivision($TourId, $i++, '30', 'Recurve');
			CreateDivision($TourId, $i++, '40', 'Blankbogen');
			CreateDivision($TourId, $i++, '50', 'Compound');
			break;
		case 11: // 3D (1x24)
		case 13: // 3D (2x24)
			CreateDivision($TourId, $i++, '60', 'Recurve');
			CreateDivision($TourId, $i++, '66', 'Blankbogen');
			CreateDivision($TourId, $i++, '65', 'Compound');
			CreateDivision($TourId, $i++, '67', 'Langbogen');
			CreateDivision($TourId, $i++, '68', 'Instinktivbogen');
			break;
		default: // Im Freien
			CreateDivision($TourId, $i++, '10', 'Recurve');
			CreateDivision($TourId, $i++, '15', 'Compound');
			CreateDivision($TourId, $i++, '16', 'Blankbogen');
	}


}

/*
* Altersklassen anlegen
*/
function CreateStandardClasses($TourId, $SubRule=1, $Type) {

	/*
	switch($Type) {
	case  1: // WA 1440
	case  3: // 720'er Runde - DM
	case  5: // 900 Round
	case  6: // 18m Indoor - DM
	case  9: // Field (1x24)
	case 11: // 3D (1x24)
	case 12: // Field (2x12)
	case 13: // 3D (2x24) - DM

		break;
	}
*/
	if ($SubRule == '2') {
	}

	switch($Type) {
		case  1: // WA 1440 (Nur WA-Altersklassen)
		case  5: // 900 Round  (Nur WA-Altersklassen)
			CreateClass($TourId, 1, 21, 49, 0, '10', '10', 'Herren');
			CreateClass($TourId, 2, 21, 49, 1, '11', '11', 'Damen');
			CreateClass($TourId, 3, 50, 99, 0, '12', '12', 'Master männlich');
			CreateClass($TourId, 4, 50, 99, 1, '13', '13', 'Master weiblich');
			CreateClass($TourId, 7, 18, 20, 0, '40', '40', 'Junioren');
			CreateClass($TourId, 8, 18, 20, 1, '41', '41,40', 'Junioren weiblich');
			CreateClass($TourId, 9, 15, 17, 0, '30', '30', 'Jugend');
			CreateClass($TourId,10, 15, 17, 1, '31', '31,30', 'Jugend weiblich');
			CreateClass($TourId,11, 13, 14, 0, '20', '20', 'Schüler A');
			CreateClass($TourId,12, 13, 14, 1, '21', '21,20', 'Schüler A weiblich');
		break;

		case  3: // 720'er Runde - (Bundes- und Landesebene)
		case  6: // 18m Indoor - (Bundes- und Landesebene)
		case  9: // Field (1x24) - (Bundes- und Landesebene)
		case 12: // Field (2x12) - (Bundes- und Landesebene)

			// Auf jeden Fall die Klassen auf Bundesebene anlegen
			CreateClass($TourId, 1, 21, 49, 0, '10', '10', 'Herren');
			CreateClass($TourId, 2, 21, 49, 1, '11', '11', 'Damen');
			CreateClass($TourId, 3, 50, 65, 0, '12', '12', 'Master männlich');
			CreateClass($TourId, 4, 50, 65, 1, '13', '13', 'Master weiblich');
			CreateClass($TourId, 5, 66, 99, 0, '14', '14', 'Senioren männlich');
			CreateClass($TourId, 6, 66, 99, 1, '15', '15', 'Senioren weiblich');
			CreateClass($TourId, 7, 18, 20, 0, '40', '40', 'Junioren');
			CreateClass($TourId, 8, 18, 20, 1, '41', '41,40', 'Junioren weiblich');
			CreateClass($TourId,10, 15, 17, 0, '30', '30', 'Jugend');
			CreateClass($TourId,11, 15, 17, 1, '31', '31,30', 'Jugend weiblich');
			CreateClass($TourId,13, 13, 14, 0, '20', '20', 'Schüler A');
			CreateClass($TourId,14, 13, 14, 1, '21', '21,20', 'Schüler A weiblich');

			if ($SubRule == '1') {
				// Auch die Landesklassen einbinden
				CreateClass($TourId,15, 11, 12, 0, '22', '22', 'Schüler B'); // Landesebene
				CreateClass($TourId,16, 11, 12, 1, '23', '23', 'Schüler B weiblich'); // Landesebene
				CreateClass($TourId,17,  9, 10, 0, '24', '24', 'Schüler C'); // Landesebene
				CreateClass($TourId,18,  9, 10, 1, '25', '25', 'Schüler C weiblich'); // Landesebene
				CreateClass($TourId,19,  8,  9, 0, '26', '26', 'Schüler D'); // Land Brandenburg
				CreateClass($TourId,20,  8,  9, 1, '27', '27', 'Schüler D weiblich'); // Land Brandenburg
			}

		break;

		case 11: // 3D (1x24)
		case 13: // 3D (2x24) - (Bundesebene)
			CreateClass($TourId, 1, 21, 49, 0, '10', '10', 'Herren');
			CreateClass($TourId, 2, 21, 49, 1, '11', '11', 'Damen');
			CreateClass($TourId, 3, 50, 65, 0, '12', '12', 'Master männlich');
			CreateClass($TourId, 4, 50, 65, 1, '13', '13', 'Master weiblich');
			CreateClass($TourId, 5, 66, 99, 0, '14', '14', 'Senioren männlich');
			CreateClass($TourId, 6, 66, 99, 1, '15', '15', 'Senioren weiblich');
			CreateClass($TourId, 7, 18, 20, 2, '40', '40', 'Junioren');
			CreateClass($TourId, 9, 15, 17, 2, '30', '30', 'Jugend');
		break;
	}

}

function CreateStandardSubClasses($TourId) {
}


function CreateStandardEvents($TourId, $SubRule, $Outdoor=true) {
	global $useOldRules;
	$TargetR=($Outdoor?5:2);
	$TargetC=($Outdoor?9:4);
	$TargetSizeR=($Outdoor ? 122 : 40);
	$TargetSizeC=($Outdoor ? 80 : 40);
	$DistanceR=($Outdoor ? 70 : 18);
	$DistanceRcm=($Outdoor ? 60 : 18);
	$DistanceC=($Outdoor ? 50 : 18);
	$FirstPhase = ($Outdoor ? 48 : 16);
	switch($SubRule) {
		case '1':
			$i=1;
			// Recurve
			CreateEvent($TourId, $i++, 0, 0, $FirstPhase, $TargetR, 5, 3, 1, 5, 3, 1, '1010', 'Recurve Herren', 1, 240, 240, 0, 0, '', '', $TargetSizeR, $DistanceR);
			CreateEvent($TourId, $i++, 0, 0, $FirstPhase, $TargetR, 5, 3, 1, 5, 3, 1, '1011', 'Recurve Damen', 1, 240, 240, 0, 0, '', '', $TargetSizeR, $DistanceR);
			CreateEvent($TourId, $i++, 0, 0, $FirstPhase, $TargetR, 5, 3, 1, 5, 3, 1, '1040', 'Recurve Junioren', 1, 240, 240, 0, 0, '', '', $TargetSizeR, $DistanceR);
			CreateEvent($TourId, $i++, 0, 0, $FirstPhase, $TargetR, 5, 3, 1, 5, 3, 1, '1041', 'Recurve Juniorinnen', 1, 240, 240, 0, 0, '', '', $TargetSizeR, $DistanceR);
			CreateEvent($TourId, $i++, 0, 0, $FirstPhase, $TargetR, 5, 3, 1, 5, 3, 1, 'RCM', 'Recurve Cadet Men', 1, 240, 240, 0, 0, '', '', $TargetSizeR, $DistanceRcm);
			CreateEvent($TourId, $i++, 0, 0, $FirstPhase, $TargetR, 5, 3, 1, 5, 3, 1, 'RCW', 'Recurve Cadet Women', 1, 240, 240, 0, 0, '', '', $TargetSizeR, $DistanceRcm);
			CreateEvent($TourId, $i++, 0, 0, $FirstPhase, $TargetR, 5, 3, 1, 5, 3, 1, 'RMM', 'Recurve Master Men', 1, 240, 240, 0, 0, '', '', $TargetSizeR, $DistanceRcm);
			CreateEvent($TourId, $i++, 0, 0, $FirstPhase, $TargetR, 5, 3, 1, 5, 3, 1, 'RMW', 'Recurve Master Women', 1, 240, 240, 0, 0, '', '', $TargetSizeR, $DistanceRcm);
			// Compound
			CreateEvent($TourId, $i++, 0, 0, $FirstPhase, $TargetC, 5, 3, 1, 5, 3, 1, 'CM',  'Compound Men', 0, 240, 240, 0, 0, '', '', $TargetSizeC, $DistanceC);
			CreateEvent($TourId, $i++, 0, 0, $FirstPhase, $TargetC, 5, 3, 1, 5, 3, 1, 'CW',  'Compound Women', 0, 240, 240, 0, 0, '', '', $TargetSizeC, $DistanceC);
			CreateEvent($TourId, $i++, 0, 0, $FirstPhase, $TargetC, 5, 3, 1, 5, 3, 1, 'CJM', 'Compound Junior Men', 0, 240, 240, 0, 0, '', '', $TargetSizeC, $DistanceC);
			CreateEvent($TourId, $i++, 0, 0, $FirstPhase, $TargetC, 5, 3, 1, 5, 3, 1, 'CJW', 'Compound Junior Women', 0, 240, 240, 0, 0, '', '', $TargetSizeC, $DistanceC);
			CreateEvent($TourId, $i++, 0, 0, $FirstPhase, $TargetC, 5, 3, 1, 5, 3, 1, 'CCM', 'Compound Cadet Men', 0, 240, 240, 0, 0, '', '', $TargetSizeC, $DistanceC);
			CreateEvent($TourId, $i++, 0, 0, $FirstPhase, $TargetC, 5, 3, 1, 5, 3, 1, 'CCW', 'Compound Cadet Women', 0, 240, 240, 0, 0, '', '', $TargetSizeC, $DistanceC);
			CreateEvent($TourId, $i++, 0, 0, $FirstPhase, $TargetC, 5, 3, 1, 5, 3, 1, 'CMM', 'Compound Master Men', 0, 240, 240, 0, 0, '', '', $TargetSizeC, $DistanceC);
			CreateEvent($TourId, $i++, 0, 0, $FirstPhase, $TargetC, 5, 3, 1, 5, 3, 1, 'CMW', 'Compound Master Women', 0, 240, 240, 0, 0, '', '', $TargetSizeC, $DistanceC);
			$i=1;
			CreateEvent($TourId, $i++, 1, 0, 8, $TargetR, 4, 6, 3, 4, 6, 3, 'RM',  'Recurve Men Team', 1, 0, 0, 0, 0, '', '', $TargetSizeR, $DistanceR);
			CreateEvent($TourId, $i++, 1, 0, 8, $TargetR, 4, 6, 3, 4, 6, 3, 'RW',  'Recurve Women Team', 1, 0, 0, 0, 0, '', '', $TargetSizeR, $DistanceR);
			CreateEvent($TourId, $i++, 1, 0, 8, $TargetR, 4, 6, 3, 4, 6, 3, 'RJM', 'Recurve Junior Men Team', 1, 0, 0, 0, 0, '', '', $TargetSizeR, $DistanceR);
			CreateEvent($TourId, $i++, 1, 0, 8, $TargetR, 4, 6, 3, 4, 6, 3, 'RJW', 'Recurve Junior Women Team', 1, 0, 0, 0, 0, '', '', $TargetSizeR, $DistanceR);
			CreateEvent($TourId, $i++, 1, 0, 8, $TargetR, 4, 6, 3, 4, 6, 3, 'RCM', 'Recurve Cadet Men Team', 1, 0, 0, 0, 0, '', '', $TargetSizeR, $DistanceRcm);
			CreateEvent($TourId, $i++, 1, 0, 8, $TargetR, 4, 6, 3, 4, 6, 3, 'RCW', 'Recurve Cadet Women Team', 1, 0, 0, 0, 0, '', '', $TargetSizeR, $DistanceRcm);
			CreateEvent($TourId, $i++, 1, 0, 8, $TargetR, 4, 6, 3, 4, 6, 3, 'RMM', 'Recurve Master Men Team', 1, 0, 0, 0, 0, '', '', $TargetSizeR, $DistanceRcm);
			CreateEvent($TourId, $i++, 1, 0, 8, $TargetR, 4, 6, 3, 4, 6, 3, 'RMW', 'Recurve Master Women Team', 1, 0, 0, 0, 0, '', '', $TargetSizeR, $DistanceRcm);
			if($Outdoor) {
				CreateEvent($TourId, $i++, 1, 1, 8, $TargetR, 4, 4, 2, 4, 4, 2, 'RX',  'Recurve Mixed Team', 1, 0, 0, 0, 0, '', '', $TargetSizeR, $DistanceR);
				CreateEvent($TourId, $i++, 1, 1, 8, $TargetR, 4, 4, 2, 4, 4, 2, 'RJX', 'Recurve Junior Mixed Team', 1, 0, 0, 0, 0, '', '', $TargetSizeR, $DistanceR);
				CreateEvent($TourId, $i++, 1, 1, 8, $TargetR, 4, 4, 2, 4, 4, 2, 'RCX', 'Recurve Cadet Mixed Team', 1, 0, 0, 0, 0, '', '', $TargetSizeR, $DistanceRcm);
				CreateEvent($TourId, $i++, 1, 1, 8, $TargetR, 4, 4, 2, 4, 4, 2, 'RMX', 'Recurve Master Mixed Team', 1, 0, 0, 0, 0, '', '', $TargetSizeR, $DistanceRcm);
			}
			CreateEvent($TourId, $i++, 1, 0, 8, $TargetC, 4, 6, 3, 4, 6, 3, 'CM',  'Compound Men Team', 0, 0, 0, 0, 0, '', '', $TargetSizeC, $DistanceC);
			CreateEvent($TourId, $i++, 1, 0, 8, $TargetC, 4, 6, 3, 4, 6, 3, 'CW',  'Compound Women Team', 0, 0, 0, 0, 0, '', '', $TargetSizeC, $DistanceC);
			CreateEvent($TourId, $i++, 1, 0, 8, $TargetC, 4, 6, 3, 4, 6, 3, 'CJM', 'Compound Junior Men Team', 0, 0, 0, 0, 0, '', '', $TargetSizeC, $DistanceC);
			CreateEvent($TourId, $i++, 1, 0, 8, $TargetC, 4, 6, 3, 4, 6, 3, 'CJW', 'Compound Junior Women Team', 0, 0, 0, 0, 0, '', '', $TargetSizeC, $DistanceC);
			CreateEvent($TourId, $i++, 1, 0, 8, $TargetC, 4, 6, 3, 4, 6, 3, 'CCM', 'Compound Cadet Men Team', 0, 0, 0, 0, 0, '', '', $TargetSizeC, $DistanceC);
			CreateEvent($TourId, $i++, 1, 0, 8, $TargetC, 4, 6, 3, 4, 6, 3, 'CCW', 'Compound Cadet Women Team', 0, 0, 0, 0, 0, '', '', $TargetSizeC, $DistanceC);
			CreateEvent($TourId, $i++, 1, 0, 8, $TargetC, 4, 6, 3, 4, 6, 3, 'CMM', 'Compound Master Men Team', 0, 0, 0, 0, 0, '', '', $TargetSizeC, $DistanceC);
			CreateEvent($TourId, $i++, 1, 0, 8, $TargetC, 4, 6, 3, 4, 6, 3, 'CMW', 'Compound Master Women Team', 0, 0, 0, 0, 0, '', '', $TargetSizeC, $DistanceC);
			if($Outdoor) {
				CreateEvent($TourId, $i++, 1, 1, 8, $TargetC, 4, 4, 2, 4, 4, 2, 'CX',  'Compound Mixed Team', 0, 0, 0, 0, 0, '', '', $TargetSizeC, $DistanceC);
				CreateEvent($TourId, $i++, 1, 1, 8, $TargetC, 4, 4, 2, 4, 4, 2, 'CJX', 'Compound Junior Mixed Team', 0, 0, 0, 0, 0, '', '', $TargetSizeC, $DistanceC);
				CreateEvent($TourId, $i++, 1, 1, 8, $TargetC, 4, 4, 2, 4, 4, 2, 'CCX', 'Compound Cadet Mixed Team', 0, 0, 0, 0, 0, '', '', $TargetSizeC, $DistanceC);
				CreateEvent($TourId, $i++, 1, 1, 8, $TargetC, 4, 4, 2, 4, 4, 2, 'CMX', 'Compound Master Mixed Team', 0, 0, 0, 0, 0, '', '', $TargetSizeC, $DistanceC);
			}
			break;
		case '2':
		case '5':
			$i=1;
			CreateEvent($TourId, $i++, 0, 0, $FirstPhase, $TargetR, 5, 3, 1, 5, 3, 1, 'RM',  'Recurve Men', 1, 240, 240, 0, 0, '', '', $TargetSizeR, $DistanceR);
			CreateEvent($TourId, $i++, 0, 0, $FirstPhase, $TargetR, 5, 3, 1, 5, 3, 1, 'RW',  'Recurve Women', 1, 240, 240, 0, 0, '', '', $TargetSizeR, $DistanceR);
			CreateEvent($TourId, $i++, 0, 0, $FirstPhase, $TargetC, 5, 3, 1, 5, 3, 1, 'CM',  'Compound Men', 0, 240, 240, 0, 0, '', '', $TargetSizeC, $DistanceC);
			CreateEvent($TourId, $i++, 0, 0, $FirstPhase, $TargetC, 5, 3, 1, 5, 3, 1, 'CW',  'Compound Women', 0, 240, 240, 0, 0, '', '', $TargetSizeC, $DistanceC);
			$i=1;
			CreateEvent($TourId, $i++, 1, 0, 8, $TargetR, 4, 6, 3, 4, 6, 3, 'RM',  'Recurve Men Team', 1, 0, 0, 0, 0, '', '', $TargetSizeR, $DistanceR);
			CreateEvent($TourId, $i++, 1, 0, 8, $TargetR, 4, 6, 3, 4, 6, 3, 'RW',  'Recurve Women Team', 1, 0, 0, 0, 0, '', '', $TargetSizeR, $DistanceR);
			if($Outdoor) {
				CreateEvent($TourId, $i++, 1, 1, 8, $TargetR, 4, 4, 2, 4, 4, 2, 'RX',  'Recurve Mixed Team', 1, 0, 0, 0, 0, '', '', $TargetSizeR, $DistanceR);
			}
			CreateEvent($TourId, $i++, 1, 0, 8, $TargetC, 4, 6, 3, 4, 6, 3, 'CM',  'Compound Men Team', 0, 0, 0, 0, 0, '', '', $TargetSizeC, $DistanceC);
			CreateEvent($TourId, $i++, 1, 0, 8, $TargetC, 4, 6, 3, 4, 6, 3, 'CW',  'Compound Women Team', 0, 0, 0, 0, 0, '', '', $TargetSizeC, $DistanceC);
			if($Outdoor) {
				CreateEvent($TourId, $i++, 1, 1, 8, $TargetC, 4, 4, 2, 4, 4, 2, 'CX',  'Compound Mixed Team', 0, 0, 0, 0, 0, '', '', $TargetSizeC, $DistanceC);
			}
			break;
		case '3':
			$i=1;
			CreateEvent($TourId, $i++, 0, 0, $FirstPhase, $TargetR, 5, 3, 1, 5, 3, 1, 'RM',  'Recurve Men', 1, 240, 240, 0, 0, '', '', $TargetSizeR, $DistanceR);
			CreateEvent($TourId, $i++, 0, 0, $FirstPhase, $TargetR, 5, 3, 1, 5, 3, 1, 'RW',  'Recurve Women', 1, 240, 240, 0, 0, '', '', $TargetSizeR, $DistanceR);
			CreateEvent($TourId, $i++, 0, 0, $FirstPhase, $TargetR, 5, 3, 1, 5, 3, 1, 'RJM', 'Recurve Junior Men', 1, 240, 240, 0, 0, '', '', $TargetSizeR, $DistanceR);
			CreateEvent($TourId, $i++, 0, 0, $FirstPhase, $TargetR, 5, 3, 1, 5, 3, 1, 'RJW', 'Recurve Junior Women', 1, 240, 240, 0, 0, '', '', $TargetSizeR, $DistanceR);
			CreateEvent($TourId, $i++, 0, 0, $FirstPhase, $TargetC, 5, 3, 1, 5, 3, 1, 'CM',  'Compound Men', 0, 240, 240, 0, 0, '', '', $TargetSizeC, $DistanceC);
			CreateEvent($TourId, $i++, 0, 0, $FirstPhase, $TargetC, 5, 3, 1, 5, 3, 1, 'CW',  'Compound Women', 0, 240, 240, 0, 0, '', '', $TargetSizeC, $DistanceC);
			CreateEvent($TourId, $i++, 0, 0, $FirstPhase, $TargetC, 5, 3, 1, 5, 3, 1, 'CJM', 'Compound Junior Men', 0, 240, 240, 0, 0, '', '', $TargetSizeC, $DistanceC);
			CreateEvent($TourId, $i++, 0, 0, $FirstPhase, $TargetC, 5, 3, 1, 5, 3, 1, 'CJW', 'Compound Junior Women', 0, 240, 240, 0, 0, '', '', $TargetSizeC, $DistanceC);
			$i=1;
			CreateEvent($TourId, $i++, 1, 0, 8, $TargetR, 4, 6, 3, 4, 6, 3, 'RM',  'Recurve Men Team', 1, 0, 0, 0, 0, '', '', $TargetSizeR, $DistanceR);
			CreateEvent($TourId, $i++, 1, 0, 8, $TargetR, 4, 6, 3, 4, 6, 3, 'RW',  'Recurve Women Team', 1, 0, 0, 0, 0, '', '', $TargetSizeR, $DistanceR);
			CreateEvent($TourId, $i++, 1, 0, 8, $TargetR, 4, 6, 3, 4, 6, 3, 'RJM', 'Recurve Junior Men Team', 1, 0, 0, 0, 0, '', '', $TargetSizeR, $DistanceR);
			CreateEvent($TourId, $i++, 1, 0, 8, $TargetR, 4, 6, 3, 4, 6, 3, 'RJW', 'Recurve Junior Women Team', 1, 0, 0, 0, 0, '', '', $TargetSizeR, $DistanceR);
			if($Outdoor) {
				CreateEvent($TourId, $i++, 1, 1, 8, $TargetR, 4, 4, 2, 4, 4, 2, 'RX',  'Recurve Mixed Team', 1, 0, 0, 0, 0, '', '', $TargetSizeR, $DistanceR);
				CreateEvent($TourId, $i++, 1, 1, 8, $TargetR, 4, 4, 2, 4, 4, 2, 'RJX', 'Recurve Junior Mixed Team', 1, 0, 0, 0, 0, '', '', $TargetSizeR, $DistanceR);
			}
			CreateEvent($TourId, $i++, 1, 0, 8, $TargetC, 4, 6, 3, 4, 6, 3, 'CM',  'Compound Men Team', 0, 0, 0, 0, 0, '', '', $TargetSizeC, $DistanceC);
			CreateEvent($TourId, $i++, 1, 0, 8, $TargetC, 4, 6, 3, 4, 6, 3, 'CW',  'Compound Women Team', 0, 0, 0, 0, 0, '', '', $TargetSizeC, $DistanceC);
			CreateEvent($TourId, $i++, 1, 0, 8, $TargetC, 4, 6, 3, 4, 6, 3, 'CJM', 'Compound Junior Men Team', 0, 0, 0, 0, 0, '', '', $TargetSizeC, $DistanceC);
			CreateEvent($TourId, $i++, 1, 0, 8, $TargetC, 4, 6, 3, 4, 6, 3, 'CJW', 'Compound Junior Women Team', 0, 0, 0, 0, 0, '', '', $TargetSizeC, $DistanceC);
			if($Outdoor) {
				CreateEvent($TourId, $i++, 1, 1, 8, $TargetC, 4, 4, 2, 4, 4, 2, 'CX',  'Compound Mixed Team', 0, 0, 0, 0, 0, '', '', $TargetSizeC, $DistanceC);
				CreateEvent($TourId, $i++, 1, 1, 8, $TargetC, 4, 4, 2, 4, 4, 2, 'CJX', 'Compound Junior Mixed Team', 0, 0, 0, 0, 0, '', '', $TargetSizeC, $DistanceC);
			}
			break;
		case '4':
			$i=1;
			CreateEvent($TourId, $i++, 0, 0, $FirstPhase, $TargetR, 5, 3, 1, 5, 3, 1, 'RJM', 'Recurve Junior Men', 1, 240, 240, 0, 0, '', '', $TargetSizeR, $DistanceR);
			CreateEvent($TourId, $i++, 0, 0, $FirstPhase, $TargetR, 5, 3, 1, 5, 3, 1, 'RJW', 'Recurve Junior Women', 1, 240, 240, 0, 0, '', '', $TargetSizeR, $DistanceR);
			CreateEvent($TourId, $i++, 0, 0, $FirstPhase, $TargetR, 5, 3, 1, 5, 3, 1, 'RCM', 'Recurve Cadet Men', 1, 240, 240, 0, 0, '', '', $TargetSizeR, $DistanceRcm);
			CreateEvent($TourId, $i++, 0, 0, $FirstPhase, $TargetR, 5, 3, 1, 5, 3, 1, 'RCW', 'Recurve Cadet Women', 1, 240, 240, 0, 0, '', '', $TargetSizeR, $DistanceRcm);
			CreateEvent($TourId, $i++, 0, 0, $FirstPhase, $TargetC, 5, 3, 1, 5, 3, 1, 'CJM', 'Compound Junior Men', 0, 240, 240, 0, 0, '', '', $TargetSizeC, $DistanceC);
			CreateEvent($TourId, $i++, 0, 0, $FirstPhase, $TargetC, 5, 3, 1, 5, 3, 1, 'CJW', 'Compound Junior Women', 0, 240, 240, 0, 0, '', '', $TargetSizeC, $DistanceC);
			CreateEvent($TourId, $i++, 0, 0, $FirstPhase, $TargetC, 5, 3, 1, 5, 3, 1, 'CCM', 'Compound Cadet Men', 0, 240, 240, 0, 0, '', '', $TargetSizeC, $DistanceC);
			CreateEvent($TourId, $i++, 0, 0, $FirstPhase, $TargetC, 5, 3, 1, 5, 3, 1, 'CCW', 'Compound Cadet Women', 0, 240, 240, 0, 0, '', '', $TargetSizeC, $DistanceC);
			$i=1;
			CreateEvent($TourId, $i++, 1, 0, 8, $TargetR, 4, 6, 3, 4, 6, 3, 'RJM', 'Recurve Junior Men Team', 1, 0, 0, 0, 0, '', '', $TargetSizeR, $DistanceR);
			CreateEvent($TourId, $i++, 1, 0, 8, $TargetR, 4, 6, 3, 4, 6, 3, 'RJW', 'Recurve Junior Women Team', 1, 0, 0, 0, 0, '', '', $TargetSizeR, $DistanceR);
			CreateEvent($TourId, $i++, 1, 0, 8, $TargetR, 4, 6, 3, 4, 6, 3, 'RCM', 'Recurve Cadet Men Team', 1, 0, 0, 0, 0, '', '', $TargetSizeR, $DistanceRcm);
			CreateEvent($TourId, $i++, 1, 0, 8, $TargetR, 4, 6, 3, 4, 6, 3, 'RCW', 'Recurve Cadet Women Team', 1, 0, 0, 0, 0, '', '', $TargetSizeR, $DistanceRcm);
			if($Outdoor) {
				CreateEvent($TourId, $i++, 1, 1, 8, $TargetR, 4, 4, 2, 4, 4, 2, 'RJX', 'Recurve Junior Mixed Team', 1, 0, 0, 0, 0, '', '', $TargetSizeR, $DistanceR);
				CreateEvent($TourId, $i++, 1, 1, 8, $TargetR, 4, 4, 2, 4, 4, 2, 'RCX', 'Recurve Cadet Mixed Team', 1, 0, 0, 0, 0, '', '', $TargetSizeR, $DistanceRcm);
			}
			CreateEvent($TourId, $i++, 1, 0, 8, $TargetC, 4, 6, 3, 4, 6, 3, 'CJM', 'Compound Junior Men Team', 0, 0, 0, 0, 0, '', '', $TargetSizeC, $DistanceC);
			CreateEvent($TourId, $i++, 1, 0, 8, $TargetC, 4, 6, 3, 4, 6, 3, 'CJW', 'Compound Junior Women Team', 0, 0, 0, 0, 0, '', '', $TargetSizeC, $DistanceC);
			CreateEvent($TourId, $i++, 1, 0, 8, $TargetC, 4, 6, 3, 4, 6, 3, 'CCM', 'Compound Cadet Men Team', 0, 0, 0, 0, 0, '', '', $TargetSizeC, $DistanceC);
			CreateEvent($TourId, $i++, 1, 0, 8, $TargetC, 4, 6, 3, 4, 6, 3, 'CCW', 'Compound Cadet Women Team', 0, 0, 0, 0, 0, '', '', $TargetSizeC, $DistanceC);
			if($Outdoor) {
				CreateEvent($TourId, $i++, 1, 1, 8, $TargetC, 4, 4, 2, 4, 4, 2, 'CJX', 'Compound Junior Mixed Team', 0, 0, 0, 0, 0, '', '', $TargetSizeC, $DistanceC);
				CreateEvent($TourId, $i++, 1, 1, 8, $TargetC, 4, 4, 2, 4, 4, 2, 'CCX', 'Compound Cadet Mixed Team', 0, 0, 0, 0, 0, '', '', $TargetSizeC, $DistanceC);
			}
			break;
	}
}

function InsertStandardEvents($TourId, $SubRule) {

	switch($SubRule) {
		case '1':
			InsertClassEvent($TourId, 0, 1, 'RM',  'R',  'M');
			InsertClassEvent($TourId, 0, 1, 'RJM', 'R', 'JM');
			InsertClassEvent($TourId, 0, 1, 'RCM', 'R', 'CM');
			InsertClassEvent($TourId, 0, 1, 'RMM', 'R', 'MM');
			InsertClassEvent($TourId, 0, 1, 'RW',  'R',  'W');
			InsertClassEvent($TourId, 0, 1, 'RJW', 'R', 'JW');
			InsertClassEvent($TourId, 0, 1, 'RCW', 'R', 'CW');
			InsertClassEvent($TourId, 0, 1, 'RMW', 'R', 'MW');
			InsertClassEvent($TourId, 0, 1, 'CM',  'C',  'M');
			InsertClassEvent($TourId, 0, 1, 'CJM', 'C', 'JM');
			InsertClassEvent($TourId, 0, 1, 'CCM', 'C', 'CM');
			InsertClassEvent($TourId, 0, 1, 'CMM', 'C', 'MM');
			InsertClassEvent($TourId, 0, 1, 'CW',  'C',  'W');
			InsertClassEvent($TourId, 0, 1, 'CJW', 'C', 'JW');
			InsertClassEvent($TourId, 0, 1, 'CCW', 'C', 'CW');
			InsertClassEvent($TourId, 0, 1, 'CMW', 'C', 'MW');

			InsertClassEvent($TourId, 1, 3, 'RM',  'R',  'M');
			InsertClassEvent($TourId, 1, 3, 'RJM', 'R', 'JM');
			InsertClassEvent($TourId, 1, 3, 'RCM', 'R', 'CM');
			InsertClassEvent($TourId, 1, 3, 'RMM', 'R', 'MM');
			InsertClassEvent($TourId, 1, 3, 'RW',  'R',  'W');
			InsertClassEvent($TourId, 1, 3, 'RJW', 'R', 'JW');
			InsertClassEvent($TourId, 1, 3, 'RCW', 'R', 'CW');
			InsertClassEvent($TourId, 1, 3, 'RMW', 'R', 'MW');
			InsertClassEvent($TourId, 1, 1, 'RX',  'R',  'W');
			InsertClassEvent($TourId, 2, 1, 'RX',  'R',  'M');
			InsertClassEvent($TourId, 1, 1, 'RJX', 'R', 'JW');
			InsertClassEvent($TourId, 2, 1, 'RJX', 'R', 'JM');
			InsertClassEvent($TourId, 1, 1, 'RCX', 'R', 'CW');
			InsertClassEvent($TourId, 2, 1, 'RCX', 'R', 'CM');
			InsertClassEvent($TourId, 1, 1, 'RMX', 'R', 'MW');
			InsertClassEvent($TourId, 2, 1, 'RMX', 'R', 'MM');
			InsertClassEvent($TourId, 1, 3, 'CM',  'C',  'M');
			InsertClassEvent($TourId, 1, 3, 'CJM', 'C', 'JM');
			InsertClassEvent($TourId, 1, 3, 'CCM', 'C', 'CM');
			InsertClassEvent($TourId, 1, 3, 'CMM', 'C', 'MM');
			InsertClassEvent($TourId, 1, 3, 'CW',  'C',  'W');
			InsertClassEvent($TourId, 1, 3, 'CJW', 'C', 'JW');
			InsertClassEvent($TourId, 1, 3, 'CCW', 'C', 'CW');
			InsertClassEvent($TourId, 1, 3, 'CMW', 'C', 'MW');
			InsertClassEvent($TourId, 1, 1, 'CX',  'C',  'W');
			InsertClassEvent($TourId, 2, 1, 'CX',  'C',  'M');
			InsertClassEvent($TourId, 1, 1, 'CJX', 'C', 'JW');
			InsertClassEvent($TourId, 2, 1, 'CJX', 'C', 'JM');
			InsertClassEvent($TourId, 1, 1, 'CCX', 'C', 'CW');
			InsertClassEvent($TourId, 2, 1, 'CCX', 'C', 'CM');
			InsertClassEvent($TourId, 1, 1, 'CMX', 'C', 'MW');
			InsertClassEvent($TourId, 2, 1, 'CMX', 'C', 'MM');
			break;
		case '2':
		case '5':
			InsertClassEvent($TourId, 0, 1, 'RM',  'R',  'M');
			InsertClassEvent($TourId, 0, 1, 'RW',  'R',  'W');
			InsertClassEvent($TourId, 0, 1, 'CM',  'C',  'M');
			InsertClassEvent($TourId, 0, 1, 'CW',  'C',  'W');

			InsertClassEvent($TourId, 1, 3, 'RM',  'R',  'M');
			InsertClassEvent($TourId, 1, 3, 'RW',  'R',  'W');
			InsertClassEvent($TourId, 1, 1, 'RX',  'R',  'W');
			InsertClassEvent($TourId, 2, 1, 'RX',  'R',  'M');
			InsertClassEvent($TourId, 1, 3, 'CM',  'C',  'M');
			InsertClassEvent($TourId, 1, 3, 'CW',  'C',  'W');
			InsertClassEvent($TourId, 1, 1, 'CX',  'C',  'W');
			InsertClassEvent($TourId, 2, 1, 'CX',  'C',  'M');
			break;
		case '3':
			InsertClassEvent($TourId, 0, 1, 'RM',  'R',  'M');
			InsertClassEvent($TourId, 0, 1, 'RJM', 'R', 'JM');
			InsertClassEvent($TourId, 0, 1, 'RW',  'R',  'W');
			InsertClassEvent($TourId, 0, 1, 'RJW', 'R', 'JW');
			InsertClassEvent($TourId, 0, 1, 'CM',  'C',  'M');
			InsertClassEvent($TourId, 0, 1, 'CJM', 'C', 'JM');
			InsertClassEvent($TourId, 0, 1, 'CW',  'C',  'W');
			InsertClassEvent($TourId, 0, 1, 'CJW', 'C', 'JW');

			InsertClassEvent($TourId, 1, 3, 'RM',  'R',  'M');
			InsertClassEvent($TourId, 1, 3, 'RJM', 'R', 'JM');
			InsertClassEvent($TourId, 1, 3, 'RW',  'R',  'W');
			InsertClassEvent($TourId, 1, 3, 'RJW', 'R', 'JW');
			InsertClassEvent($TourId, 1, 1, 'RX',  'R',  'W');
			InsertClassEvent($TourId, 2, 1, 'RX',  'R',  'M');
			InsertClassEvent($TourId, 1, 1, 'RJX', 'R', 'JW');
			InsertClassEvent($TourId, 2, 1, 'RJX', 'R', 'JM');
			InsertClassEvent($TourId, 1, 3, 'CM',  'C',  'M');
			InsertClassEvent($TourId, 1, 3, 'CJM', 'C', 'JM');
			InsertClassEvent($TourId, 1, 3, 'CW',  'C',  'W');
			InsertClassEvent($TourId, 1, 3, 'CJW', 'C', 'JW');
			InsertClassEvent($TourId, 1, 1, 'CX',  'C',  'W');
			InsertClassEvent($TourId, 2, 1, 'CX',  'C',  'M');
			InsertClassEvent($TourId, 1, 1, 'CJX', 'C', 'JW');
			InsertClassEvent($TourId, 2, 1, 'CJX', 'C', 'JM');
			break;
		case '4':
			InsertClassEvent($TourId, 0, 1, 'RJM', 'R', 'JM');
			InsertClassEvent($TourId, 0, 1, 'RCM', 'R', 'CM');
			InsertClassEvent($TourId, 0, 1, 'RJW', 'R', 'JW');
			InsertClassEvent($TourId, 0, 1, 'RCW', 'R', 'CW');
			InsertClassEvent($TourId, 0, 1, 'CJM', 'C', 'JM');
			InsertClassEvent($TourId, 0, 1, 'CCM', 'C', 'CM');
			InsertClassEvent($TourId, 0, 1, 'CJW', 'C', 'JW');
			InsertClassEvent($TourId, 0, 1, 'CCW', 'C', 'CW');

			InsertClassEvent($TourId, 1, 3, 'RJM', 'R', 'JM');
			InsertClassEvent($TourId, 1, 3, 'RCM', 'R', 'CM');
			InsertClassEvent($TourId, 1, 3, 'RJW', 'R', 'JW');
			InsertClassEvent($TourId, 1, 3, 'RCW', 'R', 'CW');
			InsertClassEvent($TourId, 1, 1, 'RJX', 'R', 'JW');
			InsertClassEvent($TourId, 2, 1, 'RJX', 'R', 'JM');
			InsertClassEvent($TourId, 1, 1, 'RCX', 'R', 'CW');
			InsertClassEvent($TourId, 2, 1, 'RCX', 'R', 'CM');
			InsertClassEvent($TourId, 1, 3, 'CJM', 'C', 'JM');
			InsertClassEvent($TourId, 1, 3, 'CCM', 'C', 'CM');
			InsertClassEvent($TourId, 1, 3, 'CJW', 'C', 'JW');
			InsertClassEvent($TourId, 1, 3, 'CCW', 'C', 'CW');
			InsertClassEvent($TourId, 1, 1, 'CJX', 'C', 'JW');
			InsertClassEvent($TourId, 2, 1, 'CJX', 'C', 'JM');
			InsertClassEvent($TourId, 1, 1, 'CCX', 'C', 'CW');
			InsertClassEvent($TourId, 2, 1, 'CCX', 'C', 'CM');
			break;
	}
}
