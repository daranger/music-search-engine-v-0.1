
			<!-- ===== SIDE-1 -->
			<aside id="xbody-side1">
						
										<ul class="stags">
<?php
echo $styles;
?>
</ul>															</aside>
			<!-- / ===== SIDE-1 -->
		</div>
		<!-- ##### /xBody -->

	</div>
	<!-- / =============== xx2 -->

		<!-- ===== footer -->
		<footer id="footer"><div id="footer_x1">

			<!-- rt_share -->
			<span class="rt_share" data-url="http://slushat-onlain.online" data-title="Ну как, понравился сайт? Тогда поделись с друзьями!"></span>
			<!-- / rt_share -->


<ul class="foo-letters">
<?php
$zapros=unserialize( trim( @file_get_contents("zapros.php") ) );
$cz=(count($zapros)<$kol_zap)?count($zapros):$kol_zap;
for($i=0;$i<$cz;$i++){
				
		$zap=$zapros[$i];		
$zap = explode('/',$zap);
$artist=$zap[1];
$song=$zap[2];

$aid=explode('-',$artist);
$aid=$aid[0];

$oid=explode('-',$song);
$oid=$oid[0];

$r_artist=str_replace($aid,'',$artist);
$r_song=str_replace($oid,'',$song);

$real_zap=mb_convert_case(str_replace('-',' ',$r_artist), MB_CASE_TITLE, 'UTF-8').' - '.mb_convert_case(str_replace('-',' ',$r_song), MB_CASE_TITLE, 'UTF-8');


			if(strlen($zapros[$i])<2) continue;
$zapros[$i]=str_replace('|','-',$zapros[$i]);
echo <<<GGG
	<li><a href="/слушать-онлайн{$zapros[$i]}">{$real_zap}</a></li>
GGG;
}
?>
</ul>

			
			<div id="foo-description">
	<?php echo($foot_desc); ?>
</div>
			
			

		
			
			<!-- foo-menu -->
			<ul id="foo-menu"><!--
				--><li><a href="/">Главная</a></li><!--
				--><li><a href="/disclaimer/">Правообладателям</a></li><!--
				--><li><a href="/feedback/">Обратная связь</a></li><!--
			--></ul>
			<!-- / foo-menu -->
			
			<!-- foo-copyright -->
			<div id="foo-copyright">&copy; 2011 &ndash; 2016 Slushat-onlain.online<br />Slushat-onlain.online@yandex.ru</div>
			<!-- / foo-copyright -->

		</div></footer>
		<!-- / ===== footer -->
	</div>
<!-- / =============== xx1 -->


		<!-- ===== fixplayer -->
		<div id="fixplayer" class="noactive"><div id="fixplayer_x1">

			<!-- == fixplayer-prok -->
			<div id="fixplayer-prok">
				<div id="fixplayer-prok2">

					<!-- sk | pr -->
					<span id="fixplayer-prok-sk" style="width: 100%;"></span>
					<span id="fixplayer-prok-pr" style="width: 0%;"></span>
					<!-- / sk | pr -->

					<!-- fixplayer-time -->
					<div id="fixplayer-time">
						<b>0:00</b>
						<em>0:00</em>
					</div>
					<!-- / fixplayer-time -->

					<!-- fixplayer-lcd -->
					<div id="fixplayer-lcd">
						<div id="fixplayer-title"><span>
							<b>Slushat-onlain.online</b>
							<i>&ndash;</i>
							<em>Самые популярные песни</em>
						</span></div>
						<div id="fixplayer-notification"></div>
					</div>
					<!-- / fixplayer-lcd -->

				</div>
			</div>
			<!-- / == fixplayer-prok -->

			<!-- == sound_icon | volume -->
			<a href="javascript:void(0);" title="включить / отключить звук" class="no-ajaxy on" id="fixplayer-sound"></a>
			<div id="fixplayer-volume"><span id="fixplayer-volume-x" style="width: 100%;"></span></div>
			<!-- / == sound_icon | volume -->			
			
			<!-- == fixplayer-pv -->
			<a href="javascript:void(0);" title="сменить режим воспроизведения" class="line no-ajaxy" id="fixplayer-pv"></a>
			<!-- / == fixplayer-pv -->

			<!-- == fixplayer-foo -->
			<div id="fixplayer-foo">
				<a href="javascript:void(0);" title="предыдущая" class="no-ajaxy" id="fixplayer-b_back"></a>
				<a href="javascript:void(0);" title="воспроизвести" class="no-ajaxy" id="fixplayer-b_play"></a>
				<a href="javascript:void(0);" title="пауза" class="no-ajaxy hidden" id="fixplayer-b_pause"></a>
				<a href="javascript:void(0);" title="следующая" class="no-ajaxy" id="fixplayer-b_next"></a>
			</div>
			<!-- / == fixplayer-foo -->

		</div></div>
		<!-- / fixplayer -->
			<a href="http://get-tune.online">get-tune</a>
		
</body>
</html>