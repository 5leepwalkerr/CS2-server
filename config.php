<?php

$Website_Translate = 'en';

$Website_Subfolder = '';

$Website_Domain = 'fighters-cs2.up.railway.app';

$Website_UseCategories = true;

$Website_MainColor = true;

$Website_Settings = [
    'language' => true,
    'theme' => true
];

$SteamAPI_KEY = '582DC71D1595C7CA2D7A42A3A1C87042';

$DatabaseInfo = [
    'hostname' => 'roundhouse.proxy.rlwy.net',
    'database' => 'railway',
    'username' => 'root',
    'password' => 'ySViLbUoAjNDpYzognviviuMgMYmGdVM',
    'port' => '21187'
];

if(session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

$dirPath = $_SERVER['DOCUMENT_ROOT'].'/'.$Website_Subfolder;
if($Website_Settings['language'] && isset($_COOKIE['cs2weaponpaints_lielxd_language']) && file_exists($dirPath."/translation/".$_COOKIE['cs2weaponpaints_lielxd_language'].".json")) {
    $translations = json_decode(file_get_contents($dirPath."/translation/".$_COOKIE['cs2weaponpaints_lielxd_language'].".json"));
}else if(file_exists($dirPath."/translation/$Website_Translate.json")) {
    $translations = json_decode(file_get_contents($dirPath."/translation/$Website_Translate.json"));
}else if(file_exists($dirPath."/translation/en.json")) {
    $translations = json_decode(file_get_contents($dirPath."/translation/en.json"));
}else {
    echo "No translations have found<br>contact support.";
    die;
}

$bodyStyle = "";
if($translations->invert_direction) {
    $bodyStyle .= "direction:rtl;";
}
if($Website_Settings['theme'] && isset($_COOKIE['cs2weaponpaints_lielxd_theme'])) {
    $Website_MainColor = $_COOKIE['cs2weaponpaints_lielxd_theme'];
    $bodyStyle .= "--main-color: $Website_MainColor;";
}else if($Website_MainColor === true) {
    $Website_MainColor = rand(111111, 999999);
    $bodyStyle .= "--main-color: #$Website_MainColor;";
}else {
    if(isset($Website_MainColor) && !empty($Website_MainColor)) {
        $bodyStyle .= "--main-color: $Website_MainColor;";
    }
}
if(!empty($bodyStyle)) {
    $bodyStyle = "style='$bodyStyle'";
}
?>