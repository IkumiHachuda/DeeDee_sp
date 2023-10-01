<?php
 
$filename = 'zenkoku.CSV';
$zip = $_POST['zip'];
// fopenでファイルを開く（'r'は読み込みモードで開く）
$fp = fopen($filename, 'r');
 
// fgetsでファイルを読み込み、変数に格納
$result="??";
while (!feof($fp)) {
    $txt = fgets($fp);
    if(strpos($txt, $zip) !== false){
        list($zip, $pre, $city, $twon) = explode(",", $txt);
        $result=$pre . $city . $twon;
    }
}
 
fclose($fp);
 
print $result;
 
?>