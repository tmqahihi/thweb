<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bài 5.5 - Tính tổng các số có trong một chuỗi</title>
</head>

<body>
<h3>Bài 5.5: Tính tổng các số có trong một chuỗi</h3>
<?php
// Câu 5.5: Viết hàm tính tổng các số có trong một chuỗi
// Ví dụ: "ngay15thang7nam2015" -> tổng các số = 15 + 7 + 2015 = 2037
function tongCacSoTrongChuoi($str)
{
	$tong = 0;
	$soHienTai = "";
	$len = strlen($str);

	for ($i = 0; $i < $len; $i++) {
		if (is_numeric($str[$i])) {
			// Ghép các chữ số liền nhau thành 1 số nguyên
			$soHienTai .= $str[$i];
		} else {
			if ($soHienTai !== "") {
				$tong += (int)$soHienTai;
				$soHienTai = "";
			}
		}
	}
	// Cộng số cuối cùng nếu chuỗi kết thúc bằng chữ số
	if ($soHienTai !== "") {
		$tong += (int)$soHienTai;
	}
	return $tong;
}

$chuoi = "ngay15thang7nam2015";
echo "Chuỗi: <b>$chuoi</b><br/>";
echo "Tổng các số trong chuỗi = <b>" . tongCacSoTrongChuoi($chuoi) . "</b>"; // Kết quả: 2037
?>
</body>
</html>
