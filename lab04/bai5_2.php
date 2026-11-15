<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bài 5.2 - Duyệt và in mảng 2 chiều ra bảng HTML</title>
</head>

<body>
<h3>Bài 5.2: Duyệt và in danh sách mảng 2 chiều $arr ra dạng bảng HTML</h3>
<?php
// Khởi tạo mảng 2 chiều $arr theo đúng đề bài
$arr = array();
$r = array("id" => "sp1", "name " => "Sản phẩm 1 ");
$arr[] = $r;
$r = array("id" => "sp2", "name " => "Sản phẩm 2 ");
$arr[] = $r;
$r = array("id" => "sp3", "name " => "Sản phẩm 3 ");
$arr[] = $r;

// Hàm duyệt và in danh sách mảng 2 chiều ra bảng HTML
function showProductTable($arr)
{
	echo "<table border='1' cellspacing='0' cellpadding='6' width='450'>";
	echo "<tr><th align='left'>Stt</th><th align='left'>Mã Sản Phẩm</th><th align='left'>Tên Sản Phẩm</th></tr>";
	$stt = 0;
	foreach ($arr as $row) {
		$stt++;
		$id = isset($row["id"]) ? $row["id"] : "";
		// Hỗ trợ cả key "name " (có khoảng trắng như đề bài) và "name"
		$name = isset($row["name "]) ? $row["name "] : (isset($row["name"]) ? $row["name"] : "");
		echo "<tr>";
		echo "<td>$stt</td>";
		echo "<td>" . ucfirst($id) . "</td>";
		echo "<td>$name</td>";
		echo "</tr>";
	}
	echo "</table>";
}

showProductTable($arr);
?>
</body>
</html>
