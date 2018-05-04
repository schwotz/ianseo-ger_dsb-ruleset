<?php
/*
Common Setup for "Target" Archery
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

*/

require_once(dirname(__FILE__).'/lib.php');
require_once(dirname(dirname(__FILE__)).'/lib.php');

// default Divisions (lib.php)
CreateStandardDivisions($TourId, $TourType, $SubRule);

// default SubClasses
CreateSubClass($TourId, 1, '00', '00');

// default Classes
CreateStandardClasses($TourId, $SubRule, $TourType);

// default Distances
switch($TourType) {
	case 1: // WA 1440
		CreateDistance($TourId, $TourType, '1010', '90 m', '70 m', '50 m', '30 m'); // Recurve Herren
		CreateDistance($TourId, $TourType, '1011', '70 m', '60 m', '50 m', '30 m'); // Recurve Damen
		CreateDistance($TourId, $TourType, '1040', '90 m', '70 m', '50 m', '30 m'); // Recurve Junioren
		CreateDistance($TourId, $TourType, '1041', '70 m', '60 m', '50 m', '30 m'); // Recurve Junioren weiblich
		/*
		Unvollständig
		*/
		break;


	case 3: // 720'er Runde

		// Recurve
		CreateDistance($TourId, $TourType, '1010', '70m-1', '70m-2'); // Herren
		CreateDistance($TourId, $TourType, '1011', '70m-1', '70m-2'); // Damen
		CreateDistance($TourId, $TourType, '1040', '70m-1', '70m-2'); // Junioren
		CreateDistance($TourId, $TourType, '1041', '70m-1', '70m-2'); // Junioren weiblich
		CreateDistance($TourId, $TourType, '1012', '60m-1', '60m-2'); // Master männlich
		CreateDistance($TourId, $TourType, '1013', '60m-1', '60m-2'); // Master weiblich
		CreateDistance($TourId, $TourType, '1014', '50m-1', '50m-2'); // Senioren männlich
		CreateDistance($TourId, $TourType, '1015', '50m-1', '50m-2'); // Senioren weiblich
		CreateDistance($TourId, $TourType, '1030', '60m-1', '60m-2'); // Jugend
		CreateDistance($TourId, $TourType, '1031', '60m-1', '60m-2'); // Jugend weiblich
		CreateDistance($TourId, $TourType, '1020', '40m-1', '40m-2'); // Schüler A
		CreateDistance($TourId, $TourType, '1021', '40m-1', '40m-2'); // Schüler A weiblich
		CreateDistance($TourId, $TourType, '1022', '25m-1', '25m-2'); // Schüler B
		CreateDistance($TourId, $TourType, '1023', '25m-1', '25m-2'); // Schüler B weiblich
		CreateDistance($TourId, $TourType, '1024', '18m-1', '18m-2'); // Schüler C
		CreateDistance($TourId, $TourType, '1025', '18m-1', '18m-2'); // Schüler C weiblich
		CreateDistance($TourId, $TourType, '1026', '10m-1', '10m-2'); // Schüler D
		CreateDistance($TourId, $TourType, '1027', '10m-1', '10m-2'); // Schüler D weiblich

		// Compound
		CreateDistance($TourId, $TourType, '1510', '50m-1', '50m-2'); // Herren
		CreateDistance($TourId, $TourType, '1511', '50m-1', '50m-2'); // Damen
		CreateDistance($TourId, $TourType, '1540', '50m-1', '50m-2'); // Junioren
		CreateDistance($TourId, $TourType, '1541', '50m-1', '50m-2'); // Junioren weiblich
		CreateDistance($TourId, $TourType, '1512', '50m-1', '50m-2'); // Master männlich
		CreateDistance($TourId, $TourType, '1513', '50m-1', '50m-2'); // Master weiblich
		CreateDistance($TourId, $TourType, '1514', '50m-1', '50m-2'); // Senioren männlich
		CreateDistance($TourId, $TourType, '1515', '50m-1', '50m-2'); // Senioren weiblich
		CreateDistance($TourId, $TourType, '1530', '50m-1', '50m-2'); // Jugend
		CreateDistance($TourId, $TourType, '1531', '50m-1', '50m-2'); // Jugend weiblich
		// Compound Landesebene
		CreateDistance($TourId, $TourType, '1520', '40m-1', '40m-2'); // Schüler A
		CreateDistance($TourId, $TourType, '1521', '40m-1', '40m-2'); // Schüler A weiblich
		CreateDistance($TourId, $TourType, '1522', '25m-1', '25m-2'); // Schüler B
		CreateDistance($TourId, $TourType, '1523', '25m-1', '25m-2'); // Schüler B weiblich
		CreateDistance($TourId, $TourType, '1524', '18m-1', '18m-2'); // Schüler C
		CreateDistance($TourId, $TourType, '1525', '18m-1', '18m-2'); // Schüler C weiblich
		CreateDistance($TourId, $TourType, '1526', '10m-1', '10m-2'); // Schüler D
		CreateDistance($TourId, $TourType, '1527', '10m-1', '10m-2'); // Schüler D weiblich

		// Blankbogen
		CreateDistance($TourId, $TourType, '1610', '40m-1', '50m-2'); // Herren
		CreateDistance($TourId, $TourType, '1611', '40m-1', '50m-2'); // Damen
		// Blankbogen Landesebene
		CreateDistance($TourId, $TourType, '1640', '40m-1', '50m-2'); // Junioren
		CreateDistance($TourId, $TourType, '1641', '40m-1', '50m-2'); // Junioren weiblich
		CreateDistance($TourId, $TourType, '1612', '40m-1', '50m-2'); // Master männlich
		CreateDistance($TourId, $TourType, '1613', '40m-1', '50m-2'); // Master weiblich
		CreateDistance($TourId, $TourType, '1614', '40m-1', '50m-2'); // Senioren männlich
		CreateDistance($TourId, $TourType, '1615', '40m-1', '50m-2'); // Senioren weiblich
		CreateDistance($TourId, $TourType, '1630', '30m-1', '30m-2'); // Jugend
		CreateDistance($TourId, $TourType, '1631', '30m-1', '30m-2'); // Jugend weiblich
		CreateDistance($TourId, $TourType, '1620', '25m-1', '25m-2'); // Schüler A
		CreateDistance($TourId, $TourType, '1621', '25m-1', '25m-2'); // Schüler A weiblich
		CreateDistance($TourId, $TourType, '1622', '25m-1', '25m-2'); // Schüler B
		CreateDistance($TourId, $TourType, '1623', '25m-1', '25m-2'); // Schüler B weiblich
		CreateDistance($TourId, $TourType, '1624', '18m-1', '18m-2'); // Schüler C
		CreateDistance($TourId, $TourType, '1625', '18m-1', '18m-2'); // Schüler C weiblich
		CreateDistance($TourId, $TourType, '1626', '10m-1', '10m-2'); // Schüler D
		CreateDistance($TourId, $TourType, '1627', '10m-1', '10m-2'); // Schüler D weiblich

		break;

	case 5: // 900'er
		CreateDistance($TourId, $TourType, '%', '60 m', '50 m', '40 m');
		break;

	case 6: // Indoor 18m
		CreateDistance($TourId, $TourType, '%', '18m-1', '18m-2');
		CreateDistance($TourId, $TourType, '%26', '10m-1', '10m-2');
		CreateDistance($TourId, $TourType, '%27', '10m-1', '10m-2');
		break;

//	case 7: // Indoor 25m
//		break;


	case 9: // Field 1x24
		// Recurve
		CreateDistance($TourId, $TourType, '30%', 'rot');
		CreateDistance($TourId, $TourType, '303_', 'blau'); // Jugend
		CreateDistance($TourId, $TourType, '302_', 'gelb'); // Schüler

		// Compound
		CreateDistance($TourId, $TourType, '50%', 'rot');
		CreateDistance($TourId, $TourType, '503_', 'blau'); // Jugend
		CreateDistance($TourId, $TourType, '502_', 'gelb'); // Schüler

		// Blankbogen
		CreateDistance($TourId, $TourType, '40%', 'blau');
		CreateDistance($TourId, $TourType, '403_', 'gelb'); // Jugend
		CreateDistance($TourId, $TourType, '402_', 'gelb'); // Schüler
		break;

	case 12: // Field 2x12

		// Recurve
		CreateDistance($TourId, $TourType, '30%', 'rot-1', 'rot-2');
		CreateDistance($TourId, $TourType, '303_', 'blau-1', 'blau-2'); // Jugend
		CreateDistance($TourId, $TourType, '302_', 'gelb-1', 'gelb-2'); // Schüler

		// Compound
		CreateDistance($TourId, $TourType, '50%', 'rot-1', 'rot-2');
		CreateDistance($TourId, $TourType, '503_', 'blau-1', 'blau-2'); // Jugend
		CreateDistance($TourId, $TourType, '502_', 'gelb-1', 'gelb-2'); // Schüler

		// Blankbogen
		CreateDistance($TourId, $TourType, '40%', 'blau-1', 'blau-2');
		CreateDistance($TourId, $TourType, '403_', 'gelb-1', 'gelb-2'); // Jugend
		CreateDistance($TourId, $TourType, '402_', 'gelb-1', 'gelb-2'); // Schüler
		break;

}

if($TourType<5 or $TourType==6 or $TourType==18) {
	// default Events
	CreateStandardEvents($TourId, $SubRule, $TourType!=6);

	// Classes in Events
	InsertStandardEvents($TourId, $SubRule, $TourType!=6);

	// Finals & TeamFinals
	CreateFinals($TourId);
}

/*
 Default Target
*/


/*
define('TGT_IND_1_big10', 1);
define('TGT_IND_6_big10', 2);
define('TGT_IND_1_small10', 3);
define('TGT_IND_6_small10', 4);
define('TGT_OUT_FULL', 5);
define('TGT_FIELD', 6);
define('TGT_HITMISS', 7);
define('TGT_3D', 8);
define('TGT_OUT_5_big10', 9);
define('TGT_OUT_6_big10', 10);
define('TGT_NOR_HUN', 11);
define('TGT_SWE_FORREST', 12);
define('TGT_IND_NFAA', 13);
*/

switch($TourType) {
	case 1: // WA 1440
		CreateTargetFace($TourId, 1, '~Default', '%', '1', 5, 122, 5, 122, 5, 80, 10, 80);
		break;


	case 3: // 720'er Runde
		CreateTargetFace($TourId, 1, '122cm', '10%', '1', 5, 122, 5, 122); // Recurve
		CreateTargetFace($TourId, 2, '80(5-10)', '15%', '1', 9, 80, 9, 80); // Compound
		CreateTargetFace($TourId, 3, '80cm', '16%', '1', 5, 80, 5, 80); // Blankbogen
		break;

	case 5: // 900 Round
		CreateTargetFace($TourId, 1, '122cm', '%', '1',  5, 122, 5, 122, 5, 122);
		break;

	case 6: // 18m Indoor

		// Recurve
		CreateTargetFace($TourId,  1, 'Spot', '201_', '', 2, 40, 2, 40); // Herren Damen und älter
		CreateTargetFace($TourId,  2, 'Spot', '204_', '', 2, 40, 2, 40); // Juniore (M/W)
		CreateTargetFace($TourId,  3, 'Spot', '203_', '', 2, 40, 2, 40); // Jugend (M/W)
		CreateTargetFace($TourId,  4, '60cm', '2020', '', 2, 60, 2, 60); // Schüler A
		CreateTargetFace($TourId,  5, '60cm', '2021', '', 2, 60, 2, 60); // Schüler A weiblich

		// Compound
		CreateTargetFace($TourId,  6, 'Spot', '251_', '', 4, 40, 4, 40); // Herren Damen und älter
		CreateTargetFace($TourId,  7, 'Spot', '254_', '', 4, 40, 4, 40); // Juniore (M/W)
		CreateTargetFace($TourId,  8, 'Spot', '253_', '', 4, 40, 4, 40); // Jugend (M/W)
		CreateTargetFace($TourId,  9, '60cm', '2520', '', 2, 60, 2, 60); // Schüler A
		CreateTargetFace($TourId, 10, '60cm', '2521', '', 2, 60, 2, 60); // Schüler A weiblich

		// Blankbogen
		CreateTargetFace($TourId, 11, '40cm', '261_', '', 1, 40, 1, 40); // Herren Damen und älter
		CreateTargetFace($TourId, 12, '40cm', '264_', '', 1, 40, 1, 40); // Juniore (M/W)
		CreateTargetFace($TourId, 13, '60cm', '263_', '', 1, 60, 1, 60); // Jugend (M/W)
		CreateTargetFace($TourId, 14, '80cm', '2620', '', 2, 80, 2, 80); // Schüler A
		CreateTargetFace($TourId, 15, '80cm', '2621', '', 2, 80, 2, 80); // Schüler A weiblich

		// Landesklassen
		CreateTargetFace($TourId, 16, '80cm',  '%22', '',  1, 80, 1, 80); // Schüler B
		CreateTargetFace($TourId, 17, '80cm',  '%23', '',  1, 80, 1, 80); // Schüler B weiblich
		CreateTargetFace($TourId, 18, '122cm',  '%24', '',  1, 122, 1, 122); // Schüler C
		CreateTargetFace($TourId, 19, '122cm',  '%25', '',  1, 122, 1, 122); // Schüler C weiblich
		CreateTargetFace($TourId, 20, '122cm',  '%26', '',  1, 122, 1, 122); // Schüler D
		CreateTargetFace($TourId, 21, '122cm',  '%27', '',  1, 122, 1, 122); // Schüler D weiblich
		break;

//		case 7: // 25m Indoor
//		case  9: // Field (1x24)
//		case 11: // 3D (1x24)
	case 12: // Field (2x12)
		CreateTargetFace($TourId, 1, '~Default', '%', '1', 6, 60, 6, 60);
		break;
//		case 13: // 3D (2x24)

}

// create a first distance prototype
CreateDistanceInformation($TourId, $DistanceInfoArray, 24, 4);

// Update Tour details
$tourDetails=array(
	'ToCollation' => $tourCollation,
	'ToTypeName' => $tourDetTypeName,
	'ToNumDist' => $tourDetNumDist,
	'ToNumEnds' => $tourDetNumEnds,
	'ToMaxDistScore' => $tourDetMaxDistScore,
	'ToMaxFinIndScore' => $tourDetMaxFinIndScore,
	'ToMaxFinTeamScore' => $tourDetMaxFinTeamScore,
	'ToCategory' => $tourDetCategory,
	'ToElabTeam' => $tourDetElabTeam,
	'ToElimination' => $tourDetElimination,
	'ToGolds' => $tourDetGolds,
	'ToXNine' => $tourDetXNine,
	'ToGoldsChars' => $tourDetGoldsChars,
	'ToXNineChars' => $tourDetXNineChars,
	'ToDouble' => $tourDetDouble,
//	'ToIocCode'	=> $tourDetIocCode,
	);
UpdateTourDetails($TourId, $tourDetails);

?>
