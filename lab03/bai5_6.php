<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bài 5.6 - Loại bỏ khoảng trắng dư thừa trong chuỗi</title>
</head>

<body>
<h3>Bài 5.6: Loại bỏ các khoảng trắng dư thừa trong một chuỗi</h3>
<?php
// Câu 5.6: Viết hàm loại bỏ các khoảng trắng dư thừa trong một chuỗi
// (Xóa khoảng trắng ở đầu, cuối chuỗi và rút gọn nhiều khoảng trắng liên tiếp ở giữa thành 1 khoảng trắng)
function loaiBoKhoangTrangDuThua($str)
{
	// Xóa khoảng trắng ở đầu và cuối chuỗi
	$str = trim($str);
	// Lặp thay thế 2 khoảng trắng liên tiếp thành 1 khoảng trắng cho đến khi hết
	while (strpos($str, "  ") !== false) {
		$str = str_replace("  ", " ", $str);
	}
	return $str;
}

$chuoiGoc = "   Thực   hành    lập   trình   Web   -   Lab   03   ";
$chuoiKetQua = loaiBoKhoangTrangDuThua($chuoiGoc);

echo "Chuỗi ban đầu (độ dài " . strlen($chuoiGoc) . "): <pre>\"$chuoiGoc\"</pre>";
echo "Chuỗi sau khi xóa khoảng trắng thừa (độ dài " . strlen($chuoiKetQua) . "): <pre>\"$chuoiKetQua\"</pre>";
?>
</body>
</html>
