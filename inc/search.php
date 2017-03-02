<?php

if(!isset($_GET["q"]) or isset($_GET["get"])){
header("HTTP/1.0 404 Not Found");
header("Location: /");
}elseif($_GET["q"]=="-" or $_GET["q"]=="--" or $_GET["q"]=="---" or $_GET["q"]=="----"){
header("HTTP/1.0 404 Not Found");
header("Location: /");
}
if($_GET["q"]!==" " && $_GET["q"]=="feedback" && $_GET["q"]=="disclaimer"){
header("HTTP/1.0 404 Not Found");
if($_GET["q"]!==str_replace(' ','-',filtr($_GET["q"]))){
header("HTTP/1.0 404 Not Found");
}
}
if($_GET["q"]=="feedback" or $_GET["q"]=="disclaimer" or $_GET["q"]=="слушать-радио-онлайн" or $_GET["q"]=="русские-песни-новинки-топ-100" or $_GET["q"]=="зарубежные-новинки-топ-100" or $_GET["q"]=="евровидение"){
if($_GET["q"]=="feedback"){
header("HTTP/1.0 404 Not Found");
include 'feedback.php';
}elseif($_GET["q"]=="disclaimer"){
header("HTTP/1.0 404 Not Found");
include 'disclaimer.php';
}elseif($_GET["q"]=="слушать-радио-онлайн"){
include 'radio.php';
}elseif($_GET["q"]=="зарубежные-новинки-топ-100"){
include 'en.php';
}elseif($_GET["q"]=="русские-песни-новинки-топ-100"){
include 'rus.php';
}elseif($_GET["q"]=="евровидение"){
include 'evro.php';
}else{

}
}else{

$q2 = rus2translit(str_replace('-',' ',$_GET["q"]));
if($q2==str_replace('-',' ',$_GET["q"])){$q2=rus2translit2(str_replace('-',' ',$_GET["q"]));}
?>			<aside id="xbody-content">



								<div id="main_page_songs"><div class="xblock">
		
<?php
$gg='/genre/'.$_GET["q"].'/';
if($_GET["q"]==" "){ ?><h1 class="title">Самые популярные песни</h1><?php } ?><?php
if($_GET["q"]!==" " && $gg!=$_SERVER["SCRIPT_URL"]){ 
?><h1 class="title"><?php echo ucfirst(str_replace('-',' ',$_GET["q"]));?> - скачать музыку и слушать онлайн</h1><?php }
elseif($gg==$_SERVER["SCRIPT_URL"]){
echo '<h1 class="title">{h1}</h1>';
}else{ ?>
<?php } ?><ul class="playlist"><?php

$q = $_GET['q'];
if(isset($_GET["p"])){
$p=$_GET["p"];
}else{
$p="";
}
global $skoka_viv;


if($p>1 && $p<6){
$offset=$p*$skoka_viv-$skoka_viv;
}else{
$offset="0";
}



$v=$skoka_viv;



$f=array('попса-pop', 'рэп-и-хип-хоп','рок-rock','медляки','dance-and-house','инструментальная','metal','alternative','dubstep','jazz-and-blues','drum-and-bass','trance','шансон','этническая-музыка','вокальная-музыка','регги','классическая-музыка','punk','speech','дискотечная-танцевальная','разные','ost-soundtrack');
if(!in_array($_GET["q"],$f)){



if($_GET["q"]==" "){
$q='';
}


$p = search($q,$offset);
}else{
$f=$_GET["q"];



if($f=="рэп-и-хип-хоп"){
$h1="Реп и хип хоп";
$genre="3";
}elseif($f=="рок-rock"){
$h1="Рок (rock)";
$genre="1";
}elseif($f=="медляки"){
$h1="Медленная музыка, раслабляющая (relax) - медляки";
$genre="4";
}elseif($f=="dance-and-house"){
$h1="Dance and House (Дэнс энд Хаус)";
$genre="5";
}elseif($f=="инструментальная"){
$h1="Инструментальная музыка";
$genre="6";
}elseif($f=="metal"){
$h1="Метал - разновидность рок музыки";
$genre="7";
}elseif($f=="alternative"){
$h1="Альтернатива (альтернативная музыка)";
$genre="21";
}elseif($f=="dubstep"){
$h1="Дабстеп (англ. dubstep, МФА: [ˈdʌbstɛp])";
$genre="8";
}elseif($f=="jazz-and-blues"){
header("HTTP/1.0 404 Not Found");
header("location: http://mp3.vc");
$h1="Джаз и блюз музыкальное направление";
$genre="1001";
}elseif($f=="drum-and-bass"){
$h1="Драм-н-бэйс (D&B) DnB - жанр электронной музыки";
$genre="10";
}elseif($f=="trance"){
$h1="Транс (trance) - стиль электронной танцевальной музыки";
$genre="11";
}elseif($f=="шансон"){
$h1="Музыка в стиле кабаре (русский шансон)";
}elseif($f=="этническая-музыка"){
$h1="Этническая музыка (ethnic) - World music (музыка народов мира, песни мира)";
$genre="13";
}elseif($f=="вокальная-музыка"){
$h1="Вокальная музыка (Акустика и вокал) - А капелла (a cappella)";
$genre="14";
}elseif($f=="регги"){
$h1="Регги (реггей, reggae)";
$genre="15";
}elseif($f=="классическая-музыка"){
$h1="Классика - классическая музыка (classic)";
$genre="16";
}elseif($f=="punk"){
$h1="Панк или панк-рок (punk)";
$genre="17";
}elseif($f=="speech"){
$h1="Ораторское выступление (спич)";
$genre="19";
}elseif($f=="дискотечная-танцевальная"){
$h1="Дискотечная, танцевальная (клубная музыка)";
$genre="22";
}elseif($f=="разные"){
$h1="Разные направления в музыке";
$genre="18";
}elseif($f=="попса-pop"){
$h1="Попса (популярная музыка pop 2016)";
$genre="2";
}elseif($f=="шансон"){
$h1="Русский шансон";
}elseif($f=="ost-soundtrack"){
$h1="Саундтреки (музыка из фильмов) soundtrack ost";
}

if(isset($genre)){
$only_eng='0';
$p = get_popular($q,$offset,$genre,$only_eng);
}else{
$p = search(str_replace('-',' ',$f),$offset);
}



}





$col3 = count($p['list']);
$qf=filtr($q);


if($col3>2 && mb_strlen($qf,'utf8')>2 && str_replace('-',' ',$qf)==str_replace('-',' ',$q) && mb_strlen($qf,'utf8')<47){

}else{
if($_SERVER['REQUEST_URI']=="/" or $_GET["q"]==" "){
}else{
header("HTTP/1.0 404 Not Found");
}
}

////////////генерация дескриптион, кийвордс //////////////////
$desc_new = array('title'=>$p['list'][0][3],'artist'=>$p['list'][0][4]);
$desc_new2 = array('title'=>$p['list'][1][3],'artist'=>$p['list'][1][4]);
$desc_new3 = array('title'=>$p['list'][2][3],'artist'=>$p['list'][2][4]);
$desc_new4 = array('title'=>$p['list'][3][3],'artist'=>$p['list'][3][4]);

$description='Mp3 '.($desc_new[artist]).' скачать '.($desc_new[title]).' песню '.($desc_new2[artist]).' - '.($desc_new2[title]).' музыка '.($desc_new3[artist]).' онлайн '.($desc_new3[title]).' '.($desc_new4[artist]).' бесплатно '.($desc_new4[title]);

$keywords=wordwrap($description,150,'!!');
$keywords=explode('!!',$keywords);
$keywords=$keywords[0];
$keywords=str_replace('-','',$keywords);
$description=delete_duplicates_words($description);
$description=wordwrap($description,160,'22');
$description=explode('22',$description);
$description =($description[0]);
if(!empty($description)){
if(isset($_GET["p"]) && $_GET["p"]=="2"){
$description=str_replace('-',' ',filtr($q.' '.$description));
}else{
$description=str_replace('-',' ',filtr($description.' '.$q));
}
}else{
if(isset($_GET["p"]) && $_GET["p"]=="2"){
$description='Скачать mp3 '.str_replace('-',' ',$q).' бесплатно';
}else{
$description='Слушать онлайн '.str_replace('-',' ',$q).' песни и музыку';
}
}
$keywords=delete_duplicates_words($keywords);
$keywords=filtr($keywords);
$keywords=str_replace(' ',', ',$keywords);
$keywords=str_replace('-',', ',$keywords);
$keywords=str_replace(',,',',',$keywords);
$keywords=trim($keywords," \t,");
if(!empty($keywords)){
if(isset($_GET["p"]) && $_GET["p"]=="2"){
$keywords='Скачать, онлайн, музыка, бесплатно, песни, mp3, '.trim($keywords);
}else{
$keywords='Скачать, online, музыка, бесплатно, песни, мп3, '.trim($keywords);
}
}else{
if(isset($_GET["p"]) && $_GET["p"]=="2"){
$keywords=str_replace('-',' ',$q).', скачать, бесплатно, mp3, музыка, online, песни';
}else{
$keywords=str_replace('-',' ',$q).', слушать, online, музыка, мп3, бесплатно, скачать';
}

}
////////////генерация дескриптион, кийвордс //////////////////



if($xml_response=="wrong key" or $xml_response=="wrong key format"){
$notice="ICAgICDQndC10LLQtdGA0L3Ri9C5INC60LvRjtGHPGJyPgrQn9GA0L7QstC10YDRjNGC0LUg0L/RgNCw0LLQuNC70YzQvdC+0YHRgtGMINCy0LLQvtC00LAg0LjQu9C4INC/0L7Qu9GD0YfQuNGC0LUg0L3QvtCy0YvQuSDQvdCwINGB0LDQudGC0LU8YnI+PGJyPiA8YSBocmVmPSJodHRwOi8vYXBpLnhuLS00MWEud3MiPmFwaS54bi0tNDFhLndzPC9hPjxicj4=";
echo "<br><b>".base64_decode($notice)."</b><br>";
}elseif($xml_response=="not enough money"){
$notice2="ICAgICDQndC10LTQvtGB0YLQsNGC0L7Rh9C90L4g0LTQtdC90LXQsyDQuNC70Lgg0L3QtSDRg9GB0YLQsNC90L7QstC70LXQvSDQutC70Y7Rhzxicj4K0KPRgtC+0YfQvdC40YLQtSDQvdCwINGB0LDQudGC0LUgPGEgaHJlZj0iaHR0cDovL2FwaS54bi0tNDFhLndzIj5hcGkueG4tLTQxYS53czwvYT48YnI+";
echo "<br><b>".base64_decode($notice2)."</b><br>";
}
if($col3<$v)$v=$col3;

if($v<=0){

echo $q.' mp3 not found';

}else{

for ($i=1;$i<$v;$i++){

$title = $p['list'][$i][3];
    $artist = $p['list'][$i][4];


if(isset($p['list'][$i][9]) && $p['list'][$i][9]!='0'){
    $lyrics_id=$p['list'][$i][9];
}

    $aid =$p['list'][$i][0];
    $oid =$p['list'][$i][1];

$dur=$p['list'][$i][5];

$dur1=$dur*1000;
$min=floor($dur/60);
$sec=$dur-($min*60);
if($sec<10){$sec='0'.$sec;}
if($min<10){$min='0'.$min;}
$duration=$min.':'.$sec;

if(isset($lyrics_id)){ 
$text='<a href="javascript:void(0);" class="z-icon-mp3text no-ajaxy player-text" title="текст песни">(текст песни)</a>'; 
}else{
$text="";
}


$fartist=filtr2(filtr($artist));
if(!empty($fartist)){
$echo=str_replace('"','',$artist);
}else{
$echo=str_replace('"','',$artist);
}
$ftitle=filtr2(filtr($title));
if(!empty($ftitle) && !empty($fartist)){
$echo2='<a href="/слушать-онлайн/'.$oid.'-'.low_filtr($fartist).'/'.$aid.'-'.low_filtr_song($ftitle).'/">'.str_replace('"','',$title).'</a>';
}else{
$echo2=str_replace('"','',$title);
}


global $api_key;
$hash=hash('sha256',$api_key.$oid.'_'.$aid.date("H",time()));
$play='http://vk-music.download/play.php?id='.$oid.'_'.$aid.'&hash='.$hash;
$dw='http://vk-music.download/download.php?id='.$oid.'_'.$aid.'&hash='.$hash;

?><li class="track" data-index="<?php echo $i-1;?>" data-id="<?php echo $aid;?>" data-mp3="<?php echo $play;?>" <?php if($_GET["q"]==" "){ ?> data-url_song="/" <?php }else{ ?> data-url_song="/<?php echo $_GET["q"]; ?>/" <?php } ?> data-duration="<?php echo $dur*1000;?>">

		
			<div class="playlist-btn">
				<a href="javascript:void(0);" class="playlist-btn-play playlist-btn-playback no-ajaxy" title="слушать онлайн">(слушать онлайн)</a>
				<a href="<?php echo $dw;?>" class="playlist-btn-down no-ajaxy" title="скачать" target="_blank">(скачать)</a>
			</div>

			<em>
				<span class="playlist-btn-addfav"></span>

				<span class="playlist-duration"><?php echo $duration; ?></span>
			</em>
			<a href="javascript:void(0);" class="rbt-list hide" target="_blank"></a>

			<h2 class="playlist-name">
				<b><?php echo $echo;?></b>
				<i>&ndash;</i>
				<em><?php echo $echo2;?></em>
			</h2>
		</li><?php
}
}
?>	</ul>
<?php
$search=explode('/',$_SERVER["REQUEST_URI"]);
$search=$search[1];
if($search=="search" && !isset($_GET["p"])){
echo '<div class="more_link"><a href="/search/'.$_GET["q"].'/2/">Следующая &rarr;</a></div>';
}elseif($search=="search" && isset($_GET["p"]) && $_GET["p"]==2){
echo '<div class="more_link"><a href="/search/'.$_GET["q"].'/">&larr; Предыдущая</a></div>';
}else{
echo '<div class="more_link"><a href="/">Все популярные песни онлайн</a></div>';
}

?>

	

</div>

</div>						
					</aside><?php
} 
?>