<?php
require_once('Common/Fun_Modules.php');
$version = '2025-12-19 14:00:00';

//
//

const RuleSetName = 'GER_DSB';

//
$SetType[RuleSetName]['descr'] = get_text('GER', 'IOC_Codes');
$SetType[RuleSetName]['noc'] = 'GER';
$SetType[RuleSetName]['types'] = array();
$SetType[RuleSetName]['rules'] = array();

//
$AllowedTypes = array(6);

foreach ($AllowedTypes as $val) {
    $SetType[RuleSetName]['types']["$val"] = $TourTypes[$val];
}

//
// Die Menü-Bezeichnungen der Unterklassen sind zwingend folgender Datei zu entnehmen:
// "Common/Languages/.../Install.php" 
//
foreach ($AllowedTypes as $val) {
    $SetType[RuleSetName]['rules'][$val] = array('SetOrdinary', 'SetUkNationals');
}

?>