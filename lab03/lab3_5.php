<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lab 3_5 (Câu 4.4)</title>
<style>
	#banco{border:solid; padding:15px; background:#E8E8E8; display:inline-block;}
	#banco .cellBlack{width:50px; height:50px; background:black; color:white; float:left; }
	#banco .cellWhite{width:50px; height:50px; background:white; color:black; float:left}
	.clear{clear:both}
</style>
</head>

<body>
<?php
// Câu 4.4c: Sử dụng lệnh include để load file function.php vào lab3_5.php
include_once("function.php");

// Câu 4.4d: Gọi các hàm vừa định nghĩa (các hàm trả về chuỗi nên dùng echo để xuất)
echo BCC(6, "red", "#FFFF99", "#99FFCC"); // Truyền đủ các màu
echo BCC(8);                              // Sử dụng màu mặc định

echo BanCo(8);
?>
</body>
</html>