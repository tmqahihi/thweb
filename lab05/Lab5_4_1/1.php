<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bài 4.1 - Trang 1.php (Gửi dữ liệu qua URL)</title>
</head>

<body>
<h3>Bài 4.1: Danh sách sản phẩm (Click vào link để gửi id sang trang 2.php)</h3>
<?php
// Câu 4.1: Cho mảng $arr có nội dung như đề bài
$arr = array();
$r = array("id"=>1, "name"=>"Product1");
$arr[] = $r;
$r = array("id"=>2, "name"=>"Product2");
$arr[] = $r;
$r = array("id"=>3, "name"=>"Product3");
$arr[] = $r;
$r = array("id"=>4, "name"=>"Product4");
$arr[] = $r;

// Duyệt mảng $arr để in ra các liên kết gửi id sang trang 2.php
foreach ($arr as $item) {
	$id = $item["id"];
	$name = $item["name"];
	echo "<a href=\"2.php?id=$id\">$name</a><br/>";
}
?>
</body>
</html>
