<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bài 5.1 - Xuất n số nguyên tố đầu tiên</title>
</head>

<body>
<h3>Bài 5.1: Xuất n số nguyên tố đầu tiên</h3>
<?php
// Hàm kiểm tra số nguyên tố
function laSoNguyenTo($x)
{
	if ($x < 2) return false;
	if ($x == 2) return true;
	for ($i = 2; $i <= sqrt($x); $i++) {
		if ($x % $i == 0) return false;
	}
	return true;
}

// Hàm xuất n số nguyên tố đầu tiên
function xuatNSoNguyenTo($n)
{
	$dem = 0;
	$so = 2;
	$ketQua = array();
	while ($dem < $n) {
		if (laSoNguyenTo($so)) {
			$ketQua[] = $so;
			$dem++;
		}
		$so++;
	}
	return implode(", ", $ketQua);
}

$n = isset($_GET['n']) ? (int)$_GET['n'] : 10;
echo "<b>$n</b> số nguyên tố đầu tiên là: <b>" . xuatNSoNguyenTo($n) . "</b>";
?>
</body>
</html>
