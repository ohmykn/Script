<?php
$https_switch = ($_POST['protocol'] == 'https') ? true : false;

require_once('../wp-config.php');
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if ($mysqli->connect_error) {
    echo $mysqli->connect_error;
    exit();
} else {
    $mysqli->set_charset("utf8");
}
$tablename_option=$table_prefix."options";

$sql = "SELECT option_name,option_value FROM ". $tablename_option ." WHERE option_name = 'siteurl'";
if ($result = $mysqli->query($sql)) {
    // 連想配列を取得
    while ($row = $result->fetch_assoc()) {
      $siteuri = $row["option_value"] ;
    }
    // 結果セットを閉じる
    $result->close();
}

if(strpos($siteuri, 'http://') == 0){
    $siteuri = str_replace("http://", "https://", $siteuri);
}
$siteURI_new = $siteuri;

if($https_switch == false){
    $siteURI_new = str_replace("https://", "http://", $siteURI_new);
}

$sql_update = 'UPDATE '. $tablename_option .' SET option_value = \''. $siteURI_new .'\' WHERE option_name = \'home\' OR option_name = \'siteurl\'';

$result = $mysqli->query($sql_update);
// DB接続を閉じる
$mysqli->close();

header( "HTTP/1.1 301 Moved Permanently" ); 
header( "Location: index.php" ); 
exit;