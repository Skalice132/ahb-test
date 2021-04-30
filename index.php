<?php
// - сделать форму обратной связи с ajax и валидацией (ФИО, email, phone, text) с recaptcha
// - разобрать файл лога nginx (можно взять в качестве исходника свой локальный) и сохранить в файл csv, здесь особое внимание к оформлению кода, реализовать средствами чистого php
// - закинуть на git подобный хаб

$PUBLIC_KEY = true;
$SECRET_KEY  = false;

?>
<!DOCTYPE html>
<html lang="ru">
<head>
	<!-- Обязательные метатеги -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<title>Тестовые задания</title>
		<script
		src="https://code.jquery.com/jquery-1.12.3.min.js"
		integrity="sha256-aaODHAgvwQW1bFOGXMeX+pC4PZIPsvn2h1sArYOhgXQ="
		crossorigin="anonymous"></script>
</head>
<body>

	<div class="container">

		<!-- <h1>Тестовые задания</h1> -->

		<hr>

		<h2>Задание 1</h2>
		<br>
		<p>Сделать форму обратной связи с ajax и валидацией (ФИО, email, phone, text) с recaptcha</p>

		<form class="was-validated" action="" method="POST">
			<div class="form-row">
				<div class="col-md-6 mb-3">
					<label for="validationTooltip01">Имя</label>
					<input type="text" class="form-control" id="validationTooltip01" value="Иван" name="firstname" required>
				<div class="invalid-feedback">
					Пример неверной обратной связи группы ввода
				</div>
				</div>
				<div class="col-md-6 mb-3">
					<label for="validationTooltip02">Фамилия</label>
					<input type="text" class="form-control" id="validationTooltip02" value="Петров" name="lastname" required>
				<div class="invalid-feedback">
					Пример неверной обратной связи группы ввода
				</div>
				</div>
				<div class="col-md-6 mb-3">
					<label for="validationTooltip02">Отчество</label>
					<input type="text" class="form-control" id="validationTooltip02" value="Иванович" name="patronomic" required>
				<div class="invalid-feedback">
					Пример неверной обратной связи группы ввода
				</div>
				</div>
			</div>
			<div class="col-md-6 mb-3">
				<label for="validationTooltip02">Телефон</label>
					<input type="phone" class="form-control" id="validatedInputGroupPrepend" placeholder="+7(999)-999-99-99" aria-describedby="validatedInputGroupPrepend" pattern="\+7\s?[\(]{0,1}9[0-9]{2}[\)]{0,1}\s?\d{3}[-]{0,1}\d{2}[-]{0,1}\d{2}" name="phone" required>
				<div class="invalid-feedback">
					Введите телефон в формате +7(xxx)-xxx-xx-xx, где вместо x должна быть цифра
				</div>
			</div>
			<div class="col-md-6 mb-3">
				<label for="validatedInputGroupPrepend">Адрес электронной почты</label>
					<input type="email" class="form-control" id="validatedInputGroupPrepend" placeholder="name@example.com" aria-describedby="validatedInputGroupPrepend" name="email" required>
				<div class="invalid-feedback">
					Пример неверной обратной связи группы ввода
				</div>
			</div>

			<div class="col-md-6 mb-3">
				<label for="validationTextarea">Текстовая область</label>
				<textarea class="form-control" id="validationTextarea" placeholder="Пример обязательного текстового поля" required></textarea>
				<div class="invalid-feedback">
					Пожалуйста, введите сообщение в текстовое поле.
				</div>
			</div>
			<br>
			<div class="captcha_wrapper">
				<script src='https://www.google.com/recaptcha/api.js'></script>
				<div class="g-recaptcha" data-sitekey="<?=$PUBLIC_KEY?>"></div>
			</div>
			<br>
			<div class="input-group-append">
				<button class="btn btn-outline-secondary" type="submit">Кнопка</button>
			</div>
		</form>
		<br>

		<h2>Задание 2</h2>
		<p>Разобрать файл лога nginx (можно взять в качестве исходника свой локальный) и сохранить в файл csv, здесь особое внимание к оформлению кода, реализовать средствами чистого php</p>
		<form class="was-validated" enctype="multipart/form-data" action="phpscripts/convert.php" method="POST">
			<div class="input-group is-invalid">
				<div class="custom-file">
					<input type="file" class="custom-file-input" id="validatedInputGroupCustomFile" name="userfile" required>
				</div>
				<div class="input-group-append">
					<button class="btn btn-outline-secondary" type="button">Кнопка</button>
				</div>
			</div>
			<div class="invalid-feedback">
				Пример неверной обратной связи группы ввода
			</div>
		</form>
		<br>

	</div>

	<!-- Вариант 1: Bootstrap в связке с Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

	<script>

var firstname = $("input[name*='firstname']").val();
var lastname = $("input[name*='lastname']").val();
var patronomic = $("input[name*='patronomic']").val();
var phone = $("input[name*='phone']").val();
var email = $("input[name*='email']").val();

$('form').submit(function(){
		$.ajax({
		url: '/ajax/post_form.php',
		method: 'post',
		dataType: 'json',
		data: {
			firstname: firstname,
			lastname: lastname,
			patronomic: patronomic,
			phone: phone,
			email: email
		},

		success: function(response){
			alert(Object.values(response.data));
		}

	});
		$(this).find('input[type=submit], button[type=submit]').prop('disabled', true);
	});

	</script>
</body>
</html>