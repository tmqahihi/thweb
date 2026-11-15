<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bài 5.3 - Tính tổng các chữ số trong chuỗi</title>
</head>

<body>
<h3>Bài 5.3: Tính tổng các chữ số có trong một chuỗi</h3>
<?php
// Câu 5.3: Viết hàm tính tổng các chữ số có trong một chuỗi
// Ví dụ: "ngay15thang7nam2015" -> tổng các chữ số = 1+5+7+2+0+1+5 = 21
function tongCacChuSo($str)
{
	$tong = 0;
	$len = strlen($str);
	for ($i = 0; $i < $len; $i++) {
		if (is_numeric($str[$i])) { // Hoặc dùng ctype_digit($str[$i])
			$tong += (int)$str[$i];
		}
	}
	return $tong;
}

$chuoi = "ngay15thang7nam2015";
echo "Chuỗi: <b>$chuoi</b><br/>";
echo "Tổng các chữ số trong chuỗi = <b>" . tongCacChuSo($chuoi) . "</b>"; // Kết quả: 21
?>
</body>
</html>
