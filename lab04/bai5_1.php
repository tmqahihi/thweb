<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bài 5.1 - Hiển thị mảng 1 chiều ra bảng HTML</title>
</head>

<body>
<h3>Bài 5.1: Xây dựng hàm showArray($arr) in mảng 1 chiều ra bảng HTML</h3>
<?php
// Câu 5.1: Xây dựng hàm php in ra mảng một chiều và hiển thị trên trình duyệt web theo dạng bảng HTML
function showArray($arr)
{
	echo "<table border='1' cellspacing='2' cellpadding='6' width='250'>";
	echo "<tr><th align='left'>Index</th><th align='left'>Value</th></tr>";
	foreach ($arr as $index => $value) {
		echo "<tr>";
		echo "<td>$index</td>";
		echo "<td>$value</td>";
		echo "</tr>";
	}
	echo "</table>";
}

// Tạo mảng 1 chiều và gọi hàm vừa tạo
$monHoc = array(
	"IT01" => "Lập trình Web",
	"IT02" => "Cơ sở dữ liệu",
	"IT03" => "Cấu trúc dữ liệu & Giải thuật",
	"IT04" => "Mạng máy tính"
);

showArray($monHoc);
?>
</body>
</html>
