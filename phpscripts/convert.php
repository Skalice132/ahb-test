<?php
$handle  = fopen('php://input', 'r');
$rawData = '';
while ($chunk = fread($handle, 1024)) {
    $rawData .= $chunk;
}

parse_str($rawData, $data);

// header ( "Expires: Mon, 1 Apr 1974 05:00:00 GMT" );
// // Последнее изменение
// header ( "Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT" );
// header ( "Cache-Control: no-cache, must-revalidate" );
// header ( "Pragma: no-cache" );
// // Будем передавать XLS
// header ( "Content-type: application/vnd.ms-excel" );
// // Он будет называться report.xls
// header ( "Content-Disposition: attachment; filename=" . $_POST['report'] . ".xls" );


// // выполнение подключения
// try {
//   $db = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
//   $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// $csv_output ='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
// <html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
// <head>
// <meta http-equiv="content-type" content="text/html; charset=utf-8" />
// </head>
// <body>';

// $report = $db->query($sql);

// // Теперь данные в виде таблицы:

// $csv_output .='<table border="1">
// <tr>
// 	<td>Имя</td>
// 	<td>Коммент</td>
// 	<td>Кол-во Олкоинов</td>
// 	<td>Дата</td>	
// 	<td>Статус</td>	
// </tr>';

// while ($row = $report->fetch()) {
// 		$csv_output .= '<tr>
// 		<td>' . $row['surname'] . ' '. $row['name'] . ' ' . $row['patronymic'] . '</td>
// 		<td>' . $row['comment'] . '</td>
// 		<td>' . $row['olkoin'] . '</td>
// 		<td>' . date('Y-m-d', strtotime($row['date'])) . '</td>
// 		<td>' . (($row['confirmed']) ? 'Выполнен' : 'Не выполнен') . '</td>
// 		</tr>';
// }

// $csv_output .='</table></body></html>';

// echo $csv_output;

?>