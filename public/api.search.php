<?php
require_once '../inc/func.php';
if(isset($_POST["q"])){

$q=$_POST["q"];
$q=iconv('utf-8','windows-1251',$q);
$q=iconv('windows-1251','utf-8',$q);
$q=str_replace('ё','е',$q);



$queryS = str_replace(array('!','?','&','_', '—', '[', ']', '(', ')', ';', '.', ',', '"','http:','http://','-','–',':','amp'), ' ', trim($q));
$queryS = str_replace("'", "", "$queryS");




$queryS = strtolower($queryS);
$queryString=preg_replace('/\s+/', ' ', $queryS);

$queryString = change_cyr_register($queryString);
$queryString=trim($queryString);
$q = str_replace(" ", "-", $queryString);


$url="/search/".$q."/";
echo '{"url":"'.$url.'"}';

}

if(isset($_GET["q"])){

$q=$_GET["q"];

echo "/".$q."/";
}