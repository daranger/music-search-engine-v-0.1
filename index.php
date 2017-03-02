<?php
if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
  $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
}
if(isset($_GET["p"]) && $_GET["p"]!=="2" && $_GET["q"]!=="слушать-радио-онлайн"){
header("HTTP/1.0 404 Not Found");
}
require_once 'cfg.php';
require_once 'inc/func.php';
@ob_start();
include 'inc/head.php';
// song's module icq 403-964-898
if(isset($_GET["s"])){
include 'inc/song.php';
include 'inc/foot.php';
$content = ob_get_contents();
ob_end_clean();
$content=str_replace('{title}',$title_song,$content);
$content=str_replace('{description}',$desc_song,$content);
$content=str_replace('{keywords}',$key_song,$content);
echo $content;
exit();
}
// song's module end
if(isset($_GET["q"]) && $_GET["q"]!==" "){
include 'inc/search.php';
}else{
$_GET["q"]=" ";
include 'inc/search.php';
}
include 'inc/foot.php';
$content = ob_get_contents();
ob_end_clean();
if($_GET["q"]=="feedback" or $_GET["q"]=="disclaimer" or $_GET["q"]=="слушать-радио-онлайн"){
if($_GET["q"]=="feedback"){
$title_i="Обратная связь - Slushat-onlain.online";
$description="Обратная связь, связаться, написать письмо администрации - Slushat-onlain.online";
$keywords="обратная, связь";
}elseif($_GET["q"]=="disclaimer"){
$title_i="Правообладателям Slushat-onlain.online";
$description="DMCA - disclaimer, правообладателям Slushat-onlain.online";
$keywords="DMCA, disclaimer, правообладателям";
}elseif($_GET["q"]=="слушать-радио-онлайн"){
if(isset($_GET["p"])){

}else{
$title_i="Слушать радио онлайн, что играло сегодня на радио, скачать песни mp3 музыку с radio";
}
}else{
}
}else{
if(isset($_GET["q"]) && $_GET["q"]!==" "){
if(isset($_GET["p"]) && $_GET["p"]=="2"){
$title_i='Слушать онлайн музыку '.str_replace('-',' ',$_GET["q"]);
}else{
$title_i=ucfirst(str_replace('-',' ',$_GET["q"])).' - скачать mp3 музыку бесплатно';
}
}else{
global $title_i;
global $description;
$description="Сайт музыка онлайн - здесь вы сможете скачивать музыку бесплатно, слушать любимые песни, радио, а также делиться mp3 с другими участниками сайта";
global $keywords;
}
}
$content=str_replace('{title}',$title_i,$content);
$content=str_replace('{description}',$description,$content);
$content=str_replace('{keywords}',$keywords,$content);
$content=str_replace('{h1}',$h1,$content);
echo $content;