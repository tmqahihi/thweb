<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bài 4.2 - Tìm n nhỏ nhất để 1 + 2 + ... + n > 1000</title>
</head>

<body>
<?php
// Câu 4.2: Sử dụng while hay do...while để tìm n nhỏ nhất sao cho 1 + 2 + ... + n > 1000.

// Cách 1: Sử dụng vòng lặp while
$n = 0;
$s = 0;
while ($s <= 1000) {
	$n++;
	$s += $n;
}
echo "Dùng while: n nhỏ nhất là <b>$n</b> (Tổng S = $s > 1000)<br/>";

// Cách 2: Sử dụng vòng lặp do...while
$n2 = 0;
$s2 = 0;
do {
	$n2++;
	$s2 += $n2;
} while ($s2 <= 1000);
echo "Dùng do...while: n nhỏ nhất là <b>$n2</b> (Tổng S = $s2 > 1000)"; // Kết quả: n = 45, S = 1035
?>
</body>
</html>
