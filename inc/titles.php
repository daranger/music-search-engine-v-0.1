<?php

$constant_rand=substr($aid,-1);
$mp3_t=mb_convert_case(str_replace('-',' ',low_filtr_song(filtr($artist))), MB_CASE_TITLE, 'UTF-8').' - '.mb_convert_case(str_replace('-',' ',low_filtr_song(filtr($title))), MB_CASE_TITLE, 'UTF-8');
$artist_t=str_replace('-',' ',low_filtr_song(filtr($artist)));
$title_t=str_replace('-',' ',low_filtr_song(filtr($title)));
if(isset($p['response'][3]['items'][0]['title'])){
$v_t='смотреть клип '.$p['response'][3]['items'][0]['title'];
}else{
$v_t='';
}
if(isset($lyrics_idn)){
$t_t='текст песни';
}else{
$t_t='';
}

$id='';

if($constant_rand==0){

$title_song='Скачать mp3 '.$mp3_t.' или слушать онлайн';
$desc_song='Слушать музыку онлайн '.$artist_t.' - '.$title_t.' или скачать mp3 песню бесплатно';
$key_song=str_replace('-',' ',$artist_t.' '.$title_t.' '.$desc_song.' '.$title_song);
$key_song=str_replace(' ',', ',$key_song);
$key_song=str_replace(', , ',', ',mb_ucfirst(dd(trim($key_song," \t,"))));

}elseif($constant_rand==1){

$title_song='Бесплатно скачать '.$mp3_t.' mp3';
$desc_song='На портале mp3.vc вы всегда бесплатно сможете скачать '.$mp3_t.' или слушать музыку онлайн';
$key_song=str_replace('-',' ',$artist_t.' '.$title_t.' '.$desc_song.' '.$title_song);
$key_song=str_replace(' ',', ',$key_song);
$key_song=str_replace(', , ',', ',mb_ucfirst(dd(trim($key_song," \t,"))));

}elseif($constant_rand==2){

$title_song=$mp3_t.' слушать онлайн бесплатно';
$desc_song='Слушать музыку онлайн '.$artist_t.' - '.$title_t.'  или скачать mp3 песню бесплатно';
$key_song=str_replace('-',' ',$artist_t.' '.$title_t.' '.$desc_song.' '.$title_song);
$key_song=str_replace(' ',', ',$key_song);
$key_song=str_replace(', , ',', ',mb_ucfirst(dd(trim($key_song," \t,"))));

}elseif($constant_rand==3){

$title_song=$mp3_t.'  слушать онлайн бесплатно';
$desc_song='Слушать музыку онлайн '.$artist_t.' - '.$title_t.' или скачать mp3 - '.$v_t;
$key_song=str_replace('-',' ',$artist_t.' '.$title_t.' '.$desc_song.' '.$title_song);
$key_song=str_replace(' ',', ',$key_song);
$key_song=str_replace(', , ',', ',mb_ucfirst(dd(trim($key_song," \t,"))));

}elseif($constant_rand==4){

$title_song='Скачать mp3 '.$title_t.' '.$v_t.' '.$t_t;
$desc_song=$mp3_t.' скачать бесплатно, '.$v_t.' слушать песню онлайн '.$title_t.' '.$t_t;
$key_song=str_replace('-',' ',$artist_t.' '.$title_t.' '.$desc_song.' '.$title_song);
$key_song=str_replace(' ',', ',$key_song);
$key_song=str_replace(', , ',', ',mb_ucfirst(dd(trim($key_song," \t,"))));

}elseif($constant_rand==5){

$title_song=$mp3_t.'  слушать онлайн бесплатно';
$desc_song=$mp3_t.' скачать бесплатно, '.$v_t.' слушать песню онлайн '.$title_t.' '.$t_t;
$key_song=str_replace('-',' ',$artist_t.' '.$title_t.' '.$desc_song.' '.$title_song);
$key_song=str_replace(' ',', ',$key_song);
$key_song=str_replace(', , ',', ',mb_ucfirst(dd(trim($key_song," \t,"))));

}elseif($constant_rand==6){

$title_song='Скачать mp3 '.$title_t.' '.$v_t.' '.$t_t;
$desc_song='Слушать музыку онлайн '.$artist_t.' - '.$title_t.'  или скачать mp3 песню бесплатно';
$key_song=str_replace('-',' ',$artist_t.' '.$title_t.' '.$desc_song.' '.$title_song);
$key_song=str_replace(' ',', ',$key_song);
$key_song=str_replace(', , ',', ',mb_ucfirst(dd(trim($key_song," \t,"))));

}elseif($constant_rand==7){

$title_song=$mp3_t.' слушать онлайн бесплатно';
$desc_song='Слушать музыку онлайн '.$artist_t.' - '.$title_t.'  или скачать mp3 песню бесплатно';
$key_song=str_replace('-',' ',$artist_t.' '.$title_t.' '.$desc_song.' '.$title_song);
$key_song=str_replace(' ',', ',$key_song);
$key_song=str_replace(', , ',', ',mb_ucfirst(dd(trim($key_song," \t,"))));

}elseif($constant_rand==8){

$title_song=$mp3_t.' скачать mp3';
$desc_song='Скачать мп3 песню '.$title_t.' или слушать онлайн '.$mp3_t;
$key_song=str_replace('-',' ',$artist_t.' '.$title_t.' '.$desc_song.' '.$title_song);
$key_song=str_replace(' ',', ',$key_song);
$key_song=str_replace(', , ',', ',mb_ucfirst(dd(trim($key_song," \t,"))));

}elseif($constant_rand==9){

$title_song=$mp3_t.' слушать онлайн бесплатно '.$v_t.' '.$t_t;
$desc_song='Слова из песни '.$title.' '.$v_t.' или скачать mp3 '.$mp3_t;
$key_song=str_replace('-',' ',$artist_t.' '.$title_t.' '.$desc_song.' '.$title_song);
$key_song=str_replace(' ',', ',$key_song);
$key_song=str_replace(', , ',', ',mb_ucfirst(dd(trim($key_song," \t,"))));

}