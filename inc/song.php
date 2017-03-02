<style>@media screen and (max-width: 640px){.aimg{position:absolute;border-radius:50%;text-align:right;margin-right:70px;width:60px;height:60px;right:0;top:10px}.vid{height:100%;width:100%}}@media screen and (min-width: 650px){.aimg{position:absolute;border-radius:50%;text-align:right;margin-right:82px;width:120px;height:120px;right:0;top:20px}.vid{height:315px;width:100%}}.img-qr{margin-right:5px;vertical-align:top;opacity:.75;width:40px;height:40px}.img-qr:hover{margin-right:5px;opacity:1;vertical-align:top;width:40px;height:40px}
</style><aside id="xbody-content"><div class="onesongblock"><?php

$get_a=explode('-',$_GET["s"]);
$aid=$get_a[0];
$artist=$get_a[1];


if($_GET["a"][0]=="-"){
$_GET["a"][0]='|';
}


$get_s=explode('-',$_GET["a"]);
$oid=str_replace('|','-',$get_s[0]);
$title=$get_s[1];



$url='http://193.124.184.163/api.php?method=get.audio&ids='.$oid.'_'.$aid.'&key='.$api_key;

$p2=@file_get_contents($url);

$p=json_decode($p2,true);

$url2='http://193.124.184.163/api.php?method=recoms&aid='.$oid.'_'.$aid.'&key='.$api_key;

$recom=@file_get_contents($url2);

$recoms=json_decode($recom,true);



if($p2=="wrong key" or $p2=="wrong key format"){
$notice="ICAgICDQndC10LLQtdGA0L3Ri9C5INC60LvRjtGHPGJyPgrQn9GA0L7QstC10YDRjNGC0LUg0L/RgNCw0LLQuNC70YzQvdC+0YHRgtGMINCy0LLQvtC00LAg0LjQu9C4INC/0L7Qu9GD0YfQuNGC0LUg0L3QvtCy0YvQuSDQvdCwINGB0LDQudGC0LU8YnI+PGJyPiA8YSBocmVmPSJodHRwOi8vYXBpLnhuLS00MWEud3MiPmFwaS54bi0tNDFhLndzPC9hPjxicj4=";
echo "<br><b>".base64_decode($notice)."</b><br>";
}elseif($p2=="not enough money"){
$notice2="ICAgICDQndC10LTQvtGB0YLQsNGC0L7Rh9C90L4g0LTQtdC90LXQsyDQuNC70Lgg0L3QtSDRg9GB0YLQsNC90L7QstC70LXQvSDQutC70Y7Rhzxicj4K0KPRgtC+0YfQvdC40YLQtSDQvdCwINGB0LDQudGC0LUgPGEgaHJlZj0iaHR0cDovL2FwaS54bi0tNDFhLndzIj5hcGkueG4tLTQxYS53czwvYT48YnI+";
echo "<br><b>".base64_decode($notice2)."</b><br>";
}









$title = $p[0][3];
$artist = $p[0][4];

$img_f='artists/img/'.filtr($artist).'.png';
if(file_exists($img_f)){

}else{
$lf=json_decode(str_replace('#','',@file_get_contents('http://ws.audioscrobbler.com/2.0/?method=artist.getinfo&artist='.str_replace(' ','%20',trim($artist)).'&api_key='.$key_lf.'&lang=RU&format=json')));
if(isset($lf->artist->image[2]->text)){
$img_lf=$lf->artist->image[2]->text;
}else{
$img_lf='';
$img_f='';
}
if(!empty($img_lf)){
$img_p=@file_get_contents($img_lf);
fopen($img_f, 'w+');
file_put_contents($img_f, $img_p);
}
}
if(!empty($img_f) && file_exists($img_f)){
if(filesize($img_f)==15140 or filesize($img_f)==21230 or filesize($img_f)==19831 or filesize($img_f)==14679 or filesize($img_f)==28373 or filesize($img_f)==42497 or filesize($img_f)==15231 or filesize($img_f)==14680 or filesize($img_f)==26083 or filesize($img_f)==42007){
$img_f='';
}
}




	$dur = $p[0][5];
	$play =$p[0][2];
	$dw =str_ireplace('/vkp/','/vkd/',$p[0][2]).'?'.rus2translit(low_filtr(filtr($artist)).'_-_'.low_filtr(filtr($title))).'.mp3';

if(isset($p[0][9])){
$lyrics_idn = $p[0][9];
}



$genre='0';

if(isset($text_s) && isset($photo_s) && !empty($text_s) && !empty($photo_s)){
$filtr=array('http://','www','.ru','.com','.net','vk.com','https://','.org','.html','.php');
$text_s=str_replace('/',' ',str_replace($filtr,'', mb_substr($text_s,0,200,'UTF-8')));
$opisanie='<h2 class="small_biography-title"><b>'.$artist.'</b><i>'.$title.'</i></h2><div class="small_biography-p"><div class="small_biography-prw"><img src="http://data2.api.xn--41a.ws/images/'.base64_encode(base64_encode($photo_s)).'.jpg" width="100%" height="100%"></div><i> '.$text_s.'...</i></div>';

}else{
$opisanie='';
}


include 'titles.php';




$fartist=filtr2(filtr($artist));
$ftitle=filtr2(filtr($title));
$ftitle=low_filtr_song($ftitle);
$fartist=low_filtr($fartist);
$lnk='/слушать-онлайн/'.$oid.'-'.$fartist.'/'.$aid.'-'.$ftitle.'/';




if($_SERVER['SCRIPT_URL']!=$lnk){
header($_SERVER["SERVER_PROTOCOL"]." 404 Not Found"); 
//header("Location: $lnk");
}


$dur1=$dur*1000;
$min=floor($dur/60);
$sec=$dur-($min*60);
if($sec<10){$sec='0'.$sec;}
if($min<10){$min='0'.$min;}
$duration=$min.':'.$sec;






if(isset($img_f) && isset($recoms['list'][0][3])){
if($oid[0]=='-'){
$oid[0]='|';
}
$lnk_q='/'.$oid.'-'.$fartist.'/'.$aid.'-'.$ftitle.'/';
query_write($lnk_q);
}
?>








<div class="onesongblock-tit_and_dur">
				<h1 class="onesongblock-title">
					<b><?php echo $artist;?></b>
					<i>–</i>
					<em><?php echo $title;?></em>
				</h1>

				<span class="onesongblock-duration"><?php echo $duration;?></span>
			</div>
<?php if(file_exists($img_f)){ ?>
<img src="/<?php echo $img_f;?>" alt="<?php echo $artist;?>" title="<?php echo $artist;?>" class="aimg">		
			<?php } ?>
			
			<span class="onesongblock-filesize">Размер: <b><?php echo round($dur*320/8/1024,2);?> МБ</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Жанр: <?php echo razdel($genre); ?></span><br><br>
			<br><br>





			<div class="onesongblock-btns">
				<a href="javascript:void(0);" class="psv_btn rtform-green" data-id="<?php echo $oid;?>" data-mp3="<?php echo $play;?>" data-duration="<?php echo $dur*1000;?>" data-url_song="">Слушать онлайн</a>
				<a href="<?php echo $dw;?>" class="psv_btn rtform-blue">Скачать</a>





			</div>




			

			
			<div class="onesongblock-share_block">

				<span class="rt_share"></span>

			</div>



<br>
			</div>




		<div class="vkcomm_block">
			<div id="vk_comments"></div>
			<script>VK.Widgets.Comments("vk_comments", {limit: 10, width: "665", attach: false, pageUrl: window.location.href});</script>
		</div>

<?php
if(isset($video)){ ?> 
<div class="onesongblock">
<div class="onesongblock-tit_and_dur">
	<h3 class="onesongblock-title">
					<b>Смотреть клип</b>
					<i>–</i>
					<em><?php echo str_replace('-',' ',filtr($p['response'][3]['items'][0]['title']));?></em>
				</h3>
</div>
<iframe class="vid" style="width: 100%" src="<?php echo $video;?>" frameborder="0"></iframe>
</div>
<?php } ?>


<?php
 include 'like.php';
?>
</aside>