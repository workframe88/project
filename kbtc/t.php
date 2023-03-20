<?php 	
$url = 'http://example.com/image.php';
$img = '/my/folder/flower.png';
file_put_contents($img, file_get_contents($url));

	$url = 'https://www.google.com/'; // หน้าเว็บที่ต้องการแปลงเป็นไฟล์ภาพ
	$api_endpoint = '[Web Service Server]';
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $api_endpoint . $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, 'demo' . ":" . 'demo');
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        $output = curl_exec($ch);

      // header ('Content-Type: image/jpg'); // บอก Browser ว่าให้แสดงเป็นไฟล์ภาพ

header('Content-Disposition: attachment; filename="download.jpg"');
        echo $output;
        exit();
?>