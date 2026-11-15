<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bài 5.4 - Xuất hình chữ nhật rỗng</title>
</head>

<body>
<h3>Bài 5.4: Xuất hình chữ nhật rỗng có chiều dài d và chiều rộng r</h3>
<?php
// Câu 5.4: Viết hàm xuất ra hình chữ nhật rỗng có chiều dài là d và chiều rộng là r
// Ví dụ d=6, r=4:
// * * * * * *
// *         *
// *         *
// * * * * * *
function veHinhChuNhatRong($d, $r)
{
	echo "<pre style='font-size: 16px; line-height: 1.4;'>";
	for ($i = 1; $i <= $r; $i++) {
		for ($j = 1; $j <= $d; $j++) {
			// In dấu * ở cạnh trên ($i==1), cạnh dưới ($i==$r), cạnh trái ($j==1), cạnh phải ($j==$d)
			if ($i == 1 || $i == $r || $j == 1 || $j == $d) {
				echo "* ";
			} else {
				echo "  ";
			}
		}
		echo "\n";
	}
	echo "</pre>";
}

$d = 6;
$r = 4;
echo "Hình chữ nhật rỗng với chiều dài d = $d, chiều rộng r = $r:<br/>";
veHinhChuNhatRong($d, $r);
?>
</body>
</html>
