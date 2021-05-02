<?php

$input_lines = file_get_contents($_FILES['filename']['tmp_name']);
if ($input_lines) {

// 1. IP с которого пришел запрос (127.0.0.1)
// 2. Дату и время (01/May/2021:21:05:26 +0400)
// 3. Тип запроса, пост или гет (GET)
// 4. Код ответа (200)
// 5. ??? (2166)
// 6. Референциальнаая ссылка (http://ahb/)
// 7. User-Agent (Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36)
$pattern = '/(\d+.\d+.\d+.\d+) \[(.+)\] "([^"]*)" (\d+) (\d+) "(.*?[^\\ ])" "(.+)"/';
preg_match_all($pattern, $input_lines, $output_array, PREG_SET_ORDER);

// Если нужен другой формат, работает со строками
// $date = date_create($output_array1[2]);
// $output_array1[2] = date_format($date, 'Y-m-d H:i:s');

// echo '<pre>';
// var_dump($output_array);

$fp = fopen( '../files/output_file.csv', 'w' );
foreach ( $output_array as $request ) {
    unset($request[0]);
    fputcsv( $fp, $request );
 }
fclose( $fp );

$result = array(
    'message'  => 'Успешно',
    'data'  => $data,
  );

} else {
$result = array(
    'message'  => 'Ошибка входящих данных',
    'data'  => $data,
  );
}
header('Content-Type: application/json');
echo json_encode($result, JSON_UNESCAPED_UNICODE);
exit();

?>