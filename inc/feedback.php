<?php

  //Если форма отправлена
 if(isset($_POST["submit"])){
 //Проверка Поля ИМЯ
  if(trim($_POST['contactname']) == '') {
  $hasError = true;
  } else {
  $name = trim($_POST['contactname']);
  }
 //Проверка правильности ввода EMAIL
  if(trim($_POST['email']) == '')  {
  $hasError = true;
  } else if 


(!preg_match('/^[A-Z0-9._%-]+@[A-Z0-9._%-]+\.[A-Z]{2,4}$/i', trim($_POST['email'])))


 {
  $hasError = true;
  } else {
  $email = trim($_POST['email']);
  }
 //Проверка наличия ТЕКСТА сообщения
  if(trim($_POST['message']) == '') {
  $hasError = true;
  } else {
  if(function_exists('stripslashes')) {
  $comments = stripslashes(trim($_POST['message']));
  } else {
  $comments = trim($_POST['message']);
  }
  }
 //Если ошибок нет, отправить email
  if(!isset($hasError)) {
global $admin_email;
  $emailTo = $admin_email;


$domen = ucfirst($_SERVER['HTTP_HOST']);
								
								
								

$subject = $_POST["subject"]." с сайта $domen";
									$message = " Здравствуйте, вам пришло письмо ".$comments."\r\n\n";

									$headers = "MIME-Version: 1.0\r\n";
									$headers.= "Content-Type: text/plain; charset=utf-8\r\n";
									$headers.= "From: ".$email."\r\n";
									$headers.= "FromName: ".$name."\r\n";
									$headers.= "Reply-To: ".$email."\r\n";
									$headers.= "X-Mailer: PHP/".phpversion();

									mail($emailTo, $subject, $message, $headers);
$emailSent = true;


echo 'Сообщение успешно отправлено';
  }
else {
echo 'возникли ошибки';}

  }



  ?>

			<aside id="xbody-content">
			
				<div class="xblock"><h1 class="title">Обратная связь</h1>
	
		<form action="/feedback/" method="post">
			
			
			

			<div class="lbl"><label>
				<em class="lbl-t">Имя:</em>
				<input type="text" name="contactname" style="width: 100%; max-width: 400px;" value="" />
			</label></div>

			<div class="lbl"><label>
				<em class="lbl-t">Эл. почта:</em>
				<input type="text" name="email" style="width: 100%; max-width: 400px;" value="" />
			</label></div>

			<div class="lbl"><label>
				<em class="lbl-t">Тема сообщения:</em>
				<select name="subject" style="width: 100%; max-width: 400px;"><option value="choose" selected="selected">-- выберите тему --</option><option value="abuse">Нарушение авторских прав / Удаление контента</option><option value="ad">Реклама на сайте</option><option value="bug">Ошибка на сайте</option><option value="other">Другое</option></select>
			</label></div>

			<div class="lbl"><label>
				<em class="lbl-t">Сообщение:</em>
				<textarea name="message" style="width: 100%; height: 150px;"></textarea>
			</label></div>



			<div><input name="submit" type="submit" value="Отправить" class="rtform-blue" /></div>
		</form>
	
</div>
							</aside>
			
