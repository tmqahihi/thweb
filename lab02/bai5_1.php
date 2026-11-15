<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bài 5.1 - Phần nguyên và phần dư của $a/$b</title>
</head>

<body>
<h3>Bài 5.1: Tính phần nguyên và phần dư của $a / $b</h3>
<?php
// Khai báo 2 biến số nguyên $a và $b
$a = isset($_GET['a']) ? (int)$_GET['a'] : 17;
$b = isset($_GET['b']) ? (int)$_GET['b'] : 5;

echo "Hai số nguyên: a = <b>$a</b>, b = <b>$b</b><br/>";

if ($b == 0) {
    echo "Lỗi: Không thể chia cho 0!";
} else {
    $phan_nguyen = (int)($a / $b); // Hoặc dùng hàm intdiv($a, $b)
    $phan_du = $a % $b;
    echo "Phần nguyên của $a / $b là: <b>$phan_nguyen</b><br/>";
    echo "Phần dư của $a / $b là: <b>$phan_du</b><br/>";
}
?>
</body>
</html>
