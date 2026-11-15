<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bài 5.2 - Kiểm tra số nguyên hay số thực</title>
</head>

<body>
<h3>Bài 5.2: Kiểm tra biến $a là số nguyên hay số thực</h3>
<?php
// Giả sử có biến $a chứa giá trị kiểu số (thử thay đổi $a = 15 hoặc $a = 15.75)
$a = 15.75;

echo "Giá trị của biến \$a = <b>$a</b><br/>";

// Cách 1: Dùng hàm kiểm tra kiểu dữ liệu is_int() / is_float()
if (is_int($a)) {
    echo "Kết luận (theo is_int): <b>\$a là số nguyên (Integer)</b><br/>";
} elseif (is_float($a)) {
    echo "Kết luận (theo is_float): <b>\$a là số thực (Float / Double)</b><br/>";
} else {
    echo "Kết luận: \$a không phải kiểu int/float trực tiếp.<br/>";
}

// Cách 2: So sánh giá trị với phần nguyên (áp dụng được cả khi $a = 15.0)
if ((int)$a == $a) {
    echo "Kiểm tra theo giá trị ((int)\$a == \$a): <b>$a mang giá trị nguyên</b>";
} else {
    echo "Kiểm tra theo giá trị ((int)\$a == \$a): <b>$a mang giá trị số thực (có phần thập phân)</b>";
}
?>
</body>
</html>
