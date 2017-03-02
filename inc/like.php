

<?php

$col3 = count($recoms['list']);
if($col3==0){

}else{
?>
<div class="xblock"><h2 class="title"><span class="prefix">Рекомендации:</span> </h2>
		<ul class="playlist">

<?php
$count=0;
for ($i=0;$i<$col3;$i++){


	$title = $recoms['list'][$i][3];
	$artist = $recoms['list'][$i][4];
	$dur = $recoms['list'][$i][5];
	$url22 = $recoms['response'][1]['items'][$i]['url'];
    	$aid = $recoms['list'][$i][0];
	$oid = $recoms['list'][$i][1];
global $api_key;
$hash=hash('sha256',$api_key.$oid.'_'.$aid.date("H",time()));
$play2='http://vk-music.download/play.php?id='.$oid.'_'.$aid.'&hash='.$hash;
$dw2='http://vk-music.download/download.php?id='.$oid.'_'.$aid.'&hash='.$hash;



if(isset($recoms['list'][$i][9])){
    $lyrics_id=$recoms['list'][$i][9];
}
$genre='0';

$dur1=$dur*1000;
$min=floor($dur/60);
$sec=$dur-($min*60);
if($sec<10){$sec='0'.$sec;}
if($min<10){$min='0'.$min;}
$duration=$min.':'.$sec;





$fartist=filtr2(filtr($artist));
$ftitle=filtr2(filtr($title));

if(!empty($ftitle) && !empty($fartist)){
$echo2='<a href="/слушать-онлайн/'.$oid.'-'.low_filtr($fartist).'/'.$aid.'-'.low_filtr_song($ftitle).'/">'.str_replace('"','',$title).'</a>';
}else{
$echo2=str_replace('"','',$title);
}
$echo=str_replace('"','',$artist);
?>

		<li class="track" data-index="<?php echo $count;?>" data-id="<?php echo $oid;?>" data-mp3="<?php echo $play2;?>" data-url_song="<?php echo $echo22;?>" data-duration="<?php echo $dur*1000;?>">

			

			<div class="playlist-btn">
				<a href="javascript:void(0);" class="playlist-btn-play playlist-btn-playback no-ajaxy" title="слушать онлайн">(слушать онлайн)</a>
				<a href="<?php echo $dw2;?>" class="playlist-btn-down no-ajaxy" title="скачать" target="_blank">(скачать)</a>
			</div>

			<em>
				<span class="playlist-btn-addfav"></span>

				<span class="playlist-duration"><?php echo $duration;?></span>
			</em>
			<a href="javascript:void(0);" class="rbt-list hide" target="_blank"></a>

			<h2 class="playlist-name">
				<b><?php echo $echo;?></b>
				<i>&ndash;</i>
				<em><?php echo $echo2;?></em>
			</h2>
		</li>
	<?php
$count=$count+1;
}
echo '</ul></div>';
}
?>
