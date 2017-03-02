<?php

function my_date($q){
if(date('m',$q)=="01"){
$m="Января";
}elseif(date('m',$q)=="02"){
$m="Февраля";
}elseif(date('m',$q)=="03"){
$m="Марта";
}elseif(date('m',$q)=="04"){
$m="Апреля";
}elseif(date('m',$q)=="05"){
$m="Мая";
}elseif(date('m',$q)=="06"){
$m="Июня";
}elseif(date('m',$q)=="07"){
$m="Июля";
}elseif(date('m',$q)=="08"){
$m="Августа";
}elseif(date('m',$q)=="09"){
$m="Сентября";
}elseif(date('m',$q)=="10"){
$m="Октября";
}elseif(date('m',$q)=="11"){
$m="Ноября";
}elseif(date('m',$q)=="12"){
$m="Декабря";
}
return date('d',$q).' '.$m.' '.date('Y',$q).' года в '.date('H:i',$q);
}

function razdel($q){
if($q=="1"){
$link="<a href='/genre/рок-rock/'>Рок</a>";
}elseif($q=="2"){
$link="<a href='/genre/попса-pop/'>Поп</a>";
}elseif($q=="3"){
$link="<a href='/genre/рэп-и-хип-хоп/'>Рэп и Хип Хоп</a>";
}elseif($q=="4"){
$link="<a href='/genre/медляки/'>Медляки</a>";
}elseif($q=="5"){
$link="<a href='/genre/dance-and-house/'>Дэнс и Хаус</a>";
}elseif($q=="6"){
$link="<a href='/genre/инструментальная/'>Инструментальная</a>";
}elseif($q=="7"){
$link="<a href='/genre/metal/'>Метал</a>";
}elseif($q=="21"){
$link="<a href='/genre/alternative/'>Альтернатива</a>";
}elseif($q=="8"){
$link="<a href='/genre/dubstep/'>Дабстеп</a>";
}elseif($q=="1001"){
$link="Джаз и Блюз";
}elseif($q=="10"){
$link="<a href='/genre/drum-and-bass/'>DnB</a>";
}elseif($q=="11"){
$link="<a href='/genre/trance/'>Транс</a>";
}elseif($q=="12"){
$link="<a href='/genre/шансон/'>Шансон</a>";
}elseif($q=="13"){
$link="<a href='/genre/этническая-музыка/'>Фолк</a>";
}elseif($q=="14"){
$link="<a href='/genre/вокальная-музыка/'>Акустика и вокал</a>";
}elseif($q=="15"){
$link="<a href='/genre/регги/'>Регги</a>";
}elseif($q=="16"){
$link="<a href='/genre/классическая-музыка/'>Классика</a>";
}elseif($q=="17"){
$link="Indie Pop";
}elseif($q=="19"){
$link="<a href='/genre/speech/'>Спич</a>";
}elseif($q=="22"){
$link="<a href='/genre/дискотечная-танцевальная/'>Танцевальная и Дискотечная</a>";
}elseif($q=="18"){
$link="Разные";
}elseif($q=="0"){
$link="Другое";
}else{
$link="Не определен";
}
return $link;
}

if (!function_exists('mb_ucfirst') && extension_loaded('mbstring'))
{
    function mb_ucfirst($str, $encoding='UTF-8')
    {
        $str = mb_ereg_replace('^[\ ]+', '', $str);
        $str = mb_strtoupper(mb_substr($str, 0, 1, $encoding), $encoding).
               mb_substr($str, 1, mb_strlen($str), $encoding);
        return $str;
    }
}

function dd($q){
$q=implode(',',array_unique(explode(',', $q)));
return $q;
}

function lovifm($q,$name){

/////////////////////////кеширование/////////////////////////
$get_cache=date("y.m.d.").$name;
$wc='cache3/'.$get_cache.'.txt';
if(file_exists($wc) && filesize($wc)>800){
$d90h =@file_get_contents($wc);
}else{

///////////////////////////парсинг///////////////////////////////

$pl=@file_get_contents($q);
$pl=explode('<div id="tab-playlist" class="tabc">',$pl);
$pl=explode('<script type="text/javascript">',$pl[1]);
$pl=$pl[0];
$pl=explode('<div class="songTitle">',$pl);
foreach($pl as $a=>$b){
$b=explode('<!--song search-->',$b);
$b=$b[0];
$artist=explode('<div class="artist">',$b);
$artist=explode('</div>',$artist[1]);
$artist=nl2br($artist[0]);
$artist=strip_tags($artist);
$artist=preg_replace('/\s+/', ' ', trim($artist));
$song=explode('<div class="song">',$b);
$song=explode('</div>',$song[1]);
$song=nl2br($song[0]);
$song=strip_tags($song);
$song=preg_replace('/\s+/', ' ', trim($song));
if(empty($song) or empty($artist)){
$c.="";
}else{
$c.='<li><a href="/слушать/'.str_replace('+','-',filtr($artist)).'/'.str_replace('+','-',filtr($song)).'/">'.$artist.' - '.$song.'</a></li>';
}
}
$d90h=$c;
//////////////////////////////////запись в кеш/////////////////////
fopen($wc, 'w+');
file_put_contents($wc, $d90h, FILE_APPEND);
}
/////////////////////////кеширование/////////////////////////
return $d90h;
}
function change_cyr_register($str='',$to='lower')
{
    $lower = array('а','б','в','г','д','е','ё','ж','з','и','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','ь','ы','ъ','э','ю','я');
    $upper = array('А','Б','В','Г','Д','Е','Ё','Ж','З','И','Й','К','Л','М','Н','О','П','Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ь','Ы','Ъ','Э','Ю','Я');
    if($to=='lower') {$pat = &$upper; $rep = &$lower;}
    elseif($to=='upper') {$pat = &$lower; $rep = &$upper;}
    for($n=0; $n<sizeof($pat); ++$n)
    {
        $str = preg_replace("/".$pat[$n]."/",$rep[$n],$str);
    }
    return $str;
}

function get_lyr($id){
require_once '../cfg.php';
global $api_key;
$api=@file_get_contents('http://api.xn--41a.ws/api.php?method=audio.getLyrics&lyrics_id='.$id.'&key='.$api_key);
$parse=@simplexml_load_string(trim(ltrim($api)));
$text=$parse->lyrics->text;
 return $text;
}

function rus2translit($string) {

    $converter = array(

        'а' => 'a',   'б' => 'b',   'в' => 'v',

        'г' => 'g',   'д' => 'd',   'е' => 'e',

        'ё' => 'e',   'ж' => 'zh',  'з' => 'z',

        'и' => 'i',   'й' => 'y',   'к' => 'k',

        'л' => 'l',   'м' => 'm',   'н' => 'n',

        'о' => 'o',   'п' => 'p',   'р' => 'r',

        'с' => 's',   'т' => 't',   'у' => 'u',

        'ф' => 'f',   'х' => 'h',   'ц' => 'c',

        'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',

        'ь' => '',  'ы' => 'y',   'ъ' => '',

        'э' => 'e',   'ю' => 'yu',  'я' => 'ya',

        

        'А' => 'A',   'Б' => 'B',   'В' => 'V',

        'Г' => 'G',   'Д' => 'D',   'Е' => 'E',

        'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',

        'И' => 'I',   'Й' => 'Y',   'К' => 'K',

        'Л' => 'L',   'М' => 'M',   'Н' => 'N',

        'О' => 'O',   'П' => 'P',   'Р' => 'R',

        'С' => 'S',   'Т' => 'T',   'У' => 'U',

        'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',

        'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',

        'Ь' => '',  'Ы' => 'Y',   'Ъ' => '',

        'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',

    );

    return strtr($string, $converter);

}
function rus2translit2($string) {

    $converter = array(

	'the' => 'зе', 'why' => 'вай', 'feat' => 'и', 'dj' => 'Ди-джей',
	
	'chris' => 'крис', 'international' => 'интернешинал', 'love' => 'лав', 'by' => 'бай', 'business' => 'бизнес',
	
	'music' => 'мьюзик', 'my' => 'май', 'and' => 'и', 'night' => 'найт', 'sun' => 'сан', 'hideaway' =>'хайдэвей', 'you' => 'ю', 'know' =>'нов',
	
	'wiggle' => 'вигл (вигу вигу)', 'jason' => 'джейсон',

        'a' => 'а',   'b' => 'б',   'v' => 'в',

        'g' => 'г',   'd' => 'д',   'e' => 'е',

        'zh' => 'ж',  'z' => 'з', 'j' =>'дж',

        'i' => 'и',   'y' => 'ий',   'k' => 'к',  'oo' =>'у',

        'l' => 'л',   'm' => 'м',   'n' => 'н',

        'o' => 'о',   'p' => 'п',   'r' => 'р',

        's' => 'с',   't' => 'т',   'u' => 'у', 'q' => 'к',

        'f' => 'ф',   'h' => 'х',   'c' => 'к', 'x' =>'кс', 'ee' => 'и', 'ph' => 'ф',
        'ch' => 'ч',  'sh' => 'ш',  'sch' => 'щ', 'w' => 'в',

       
   'yu' => 'ю',  'ya' => 'я'

        


    );

    return strtr($string, $converter);

}


function delete_duplicates_words($text)
{
    $text = implode(array_reverse(preg_split('//u', $text)));
    $text = preg_replace('/(\b[\pL0-9]++\b)(?=.*?\1)/siu', '', $text);
    $text = implode(array_reverse(preg_split('//u', $text)));
    return $text;
}

function curl_f($url){

$ch = curl_init(); 
  curl_setopt($ch, CURLOPT_URL, $url); 
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
  curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 4); 

  //curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.17 (KHTML, like Gecko) Chrome/24.0.1312.57 Safari/537.17'); 
  
  $data = curl_exec($ch); 

  curl_close($ch); 

return $data;
}

function query_write($q,$file='zapros.php'){
global $kol_zap;
$armar=array();
$armar=unserialize( trim( @file_get_contents($file) ) );
    if(count($armar)<=1) $armar[3]="";
@array_unshift($armar, $q);
$armar = @array_unique($armar);
if(count($armar)>$kol_zap) { $armar=array_chunk($armar, $kol_zap);  $armar=$armar[0];}
$fff=fopen($file,'w'); flock($fff, LOCK_EX);
fputs($fff,serialize($armar) );
flock($fff, LOCK_UN); 
fclose($fff);
}

function search($q,$offset){
global $api_key;
$url='http://193.124.184.163/api.php?method=search&q='.str_replace(' ','+',$q).'&key='.$api_key;
$p2=@file_get_contents($url);
$p=json_decode($p2,true);
return $p;
}

function get_popular($q,$offset,$genre,$only_eng='0'){
global $api_key;
$url='http://193.124.184.163/api.php?method=popular&genre='.$genre.'&key='.$api_key.'&only_eng='.$only_eng;
$p2=@file_get_contents($url);
$p=json_decode($p2,true);
return $p;
}

function get_recom($ta,$skoka_viv){
global $api_key;
$api_ip='193.124.184.163';
 $xml_response = @file_get_contents('http://'.$api_ip.'/api.php?count='.$skoka_viv.'&method=audio.getRecommendations&target_audio='.$ta.'&format=json&key='.$api_key);
   $z=$xml_response;
if($z[2].$z[3].$z[4].$z[5].$z[6]=="error"){
$xml_response = @file_get_contents('http://'.$api_ip.'/api.php?count='.$skoka_viv.'&method=audio.getRecommendations&target_audio='.$ta.'&format=json&key='.$api_key);
 return $xml_response;

}else{
     return $xml_response;
}
}

function filtr($q){
$q = str_replace(array('http','´','*','№','-','!','?','^','%','$','#','@',';',':','"','{','}',',','(',')','&','=','_','~','`','<','>','www ka4ka ru','amp','quot','laquo','raquo','«','»','♥','★','ı','♫','♪','vkhp','.net','.com','.ru','.org','Ka4Ka','✔','♀','|','¦','®','†','ღ','•','/','[',']','.','►'),' ',trim($q));
$q=str_replace("'"," ",$q);
$q = change_cyr_register($q);
$q = strtolower($q);
$q=str_replace('ё','е',$q);
$q=str_replace('Ѻ','o',$q);
$stopped=array('wap','vkhp','soundvor','amp','quot','laquo','raquo','www.','.net','.com','.ru','.org','хуй','пизда','ебать','детское порно','пидараз','гавно','search','disclaimer','feedback','порно','анал','pizda','huy','porno','ebat','gavno','anal','pidaraz','detskoe porno','zaycev.net');
$q=str_replace($stopped,' ',$q);
//$q=preg_replace('/[^1234567890абвгдежзийклмнопрстуфхцчшщъыьэюяa-z\ ]+/',' ',$q);
$q=preg_replace('/\s+/', ' ', $q);
$q=trim($q);
$q=str_replace('%uFFFD','',$q);
return str_replace(' ','-',$q);

}



function filtr33($q){
$q = str_replace(array('http','´','*','№','-','!','?','^','%','$','#','@',';',':','"','{','}',',','(',')','&','=','_','~','`','<','>','www ka4ka ru','amp','quot','laquo','raquo','«','»','♥','★','ı','♫','♪','vkhp','.net','.com','.ru','.org','Ka4Ka','✔','♀','|','¦','®','†','ღ','•','[',']','.','►'),' ',trim($q));
$q=str_replace("'"," ",$q);
$q = change_cyr_register($q);
$q = strtolower($q);
$q=str_replace('ё','е',$q);
$q=str_replace('Ѻ','o',$q);
$stopped=array('wap','vkhp','soundvor','amp','quot','laquo','raquo','www.','.net','.com','.ru','.org','хуй','пизда','ебать','детское порно','пидараз','гавно','search','disclaimer','feedback','порно','анал','pizda','huy','porno','ebat','gavno','anal','pidaraz','detskoe porno','zaycev.net');
$q=str_replace($stopped,' ',$q);
//$q=preg_replace('/[^1234567890абвгдежзийклмнопрстуфхцчшщъыьэюяa-z\ ]+/',' ',$q);
$q=preg_replace('/\s+/', ' ', $q);
$q=trim($q);
$q=str_replace('%uFFFD','',$q);
return str_replace(' ','-',$q);

}





function filtr2($q){
$q=str_replace('-',' ',$q);
$q2=preg_replace('/[^1234567890абвгдежзийклмнопрстуфхцчшщъыьэюяa-z\ ]+/',' ',$q);
if($q2==$q){
return str_replace(' ','-',$q);
}
}

function low_filtr($q){
$q=str_replace('-',' ',$q);
$q=wordwrap($q,35,'!!');
$q=explode('!!',$q);
$q=str_replace(' ','-',$q[0]);
return $q;
}
function low_filtr_song($q){
$q=str_replace('-',' ',$q);
$q=wordwrap($q,35,'!!');
$q=explode('!!',$q);
$q=str_replace(' ','-',$q[0]);
return $q;
}






