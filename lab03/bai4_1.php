<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bài 4.1 - Tổng các số chẵn từ 2 đến 100</title>
</head>

<body>
<?php
// Câu 4.1: Sử dụng vòng lặp for để tính tổng các số chẵn từ 2 đến 100.
$s = 0;
for ($i = 2; $i <= 100; $i += 2) {
	$s += $i;
}
echo "Tổng các số chẵn từ 2 đến 100 là: <b>$s</b>"; // Kết quả: 2550
?>
</body>
</html>
