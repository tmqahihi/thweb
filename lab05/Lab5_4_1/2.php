<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bài 4.1 - Trang 2.php (Nhận id từ URL)</title>
</head>

<body>
<h3>Bài 4.1: Kết quả nhận được tại trang 2.php</h3>
<?php
// Câu 4.1: File 2.php in ra màn hình giá trị id nhận được từ URL ($_GET['id'])
if (isset($_GET["id"])) {
	$id = htmlspecialchars($_GET["id"]);
	echo "Giá trị <b>id</b> nhận được là: <b>$id</b>";
} else {
	echo "Chưa nhận được tham số id trên URL!";
}
?>
<p><a href="1.php">Quay lại trang 1.php</a></p>
</body>
</html>
