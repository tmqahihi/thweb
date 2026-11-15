<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bài 5.2 - Kiểm tra chuỗi đối xứng</title>
</head>

<body>
<h3>Bài 5.2: Kiểm tra một chuỗi có đối xứng không</h3>
<?php
// Câu 5.2: Viết hàm kiểm tra một chuỗi có đối xứng không
// Ví dụ: "abcba" là chuỗi đối xứng, "abcdba" là chuỗi không đối xứng
function kiemTraDoiXung($str)
{
	$len = strlen($str);
	for ($i = 0; $i < (int)($len / 2); $i++) {
		if ($str[$i] !== $str[$len - 1 - $i]) {
			return false;
		}
	}
	return true;
}

$dsChuoi = array("abcba", "abcdba", "madam", "12321");
foreach ($dsChuoi as $s) {
	if (kiemTraDoiXung($s)) {
		echo "- <b>$s</b> là chuỗi đối xứng<br/>";
	} else {
		echo "- <b>$s</b> là chuỗi không đối xứng<br/>";
	}
}
?>
</body>
</html>
