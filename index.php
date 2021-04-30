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
</head>
<body>

	<div class="container">

		<!-- <h1>Тестовые задания</h1> -->

		<hr>

		<h2>Задание 1</h2>
		<br>
		<p>Сделать форму обратной связи с ajax и валидацией (ФИО, email, phone, text) с recaptcha</p>
		<form class="was-validated">
			<div class="form-row">
				<div class="col-md-6 mb-3">
					<label for="validationTooltip01">Имя</label>
					<input type="text" class="form-control" id="validationTooltip01" value="Иван" name="firstname" required>
					<div class="valid-tooltip">
						Выглядит хорошо!
					</div>
				</div>
				<div class="col-md-6 mb-3">
					<label for="validationTooltip02">Фамилия</label>
					<input type="text" class="form-control" id="validationTooltip02" value="Петров" name="lastname" required>
					<div class="valid-tooltip">
						Выглядит хорошо!
					</div>
				</div>
				<div class="col-md-6 mb-3">
					<label for="validationTooltip02">Отчество</label>
					<input type="text" class="form-control" id="validationTooltip02" value="Иванович" name="patronomic" required>
					<div class="valid-tooltip">
						Выглядит хорошо!
					</div>
				</div>
			</div>
			<div class="col-md-6 mb-3">
				<label for="validatedInputGroupPrepend">Телефон</label>
				<div class="input-group is-invalid">
					<input type="phone" class="form-control is-invalid" placeholder="+7(999)-999-99-99" aria-describedby="validatedInputGroupPrepend" name="phone" required>
				</div>
				<div class="invalid-feedback">
					Пример неверной обратной связи группы ввода
				</div>
			</div>
			<div class="col-md-6 mb-3">
				<label for="validatedInputGroupPrepend">Адрес электронной почты</label>
				<div class="input-group is-invalid">
					<input type="email" class="form-control is-invalid" placeholder="name@example.com" aria-describedby="validatedInputGroupPrepend" name="email" required>
				</div>
				<div class="invalid-feedback">
					Пример неверной обратной связи группы ввода
				</div>
			</div>

			<div class="col-md-6 mb-3">
				<label for="validationTextarea">Текстовая область</label>
				<textarea class="form-control is-invalid" id="validationTextarea" placeholder="Пример обязательного текстового поля" required></textarea>
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
				<button class="btn btn-outline-secondary" type="button">Кнопка</button>
			</div>

		</form>
		<br>

		<h2>Задание 2</h2>
		<p>Разобрать файл лога nginx (можно взять в качестве исходника свой локальный) и сохранить в файл csv, здесь особое внимание к оформлению кода, реализовать средствами чистого php</p>
		<form class="was-validated" enctype="multipart/form-data" action="ajax/convert.php" method="POST">
			<div class="input-group is-invalid">
				<div class="custom-file">
					<input type="file" class="custom-file-input" id="validatedInputGroupCustomFile" name="userfile" required>
					<label class="custom-file-label" for="validatedInputGroupCustomFile">Выбрать файл...</label>
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

</body>
</html>