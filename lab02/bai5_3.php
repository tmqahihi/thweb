<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bài 5.3 - Giải phương trình bậc 2</title>
</head>

<body>
<h3>Bài 5.3: Giải phương trình bậc 2: ax<sup>2</sup> + bx + c = 0</h3>
<?php
// Khai báo hệ số a, b, c (có thể thay đổi trực tiếp hoặc truyền qua URL ?a=1&b=-5&c=6)
$a = isset($_GET['a']) ? (float)$_GET['a'] : 1;
$b = isset($_GET['b']) ? (float)$_GET['b'] : -5;
$c = isset($_GET['c']) ? (float)$_GET['c'] : 6;

echo "Phương trình: <b>{$a}x<sup>2</sup> + ({$b})x + ({$c}) = 0</b><br/><br/>";

if ($a == 0) {
    // Trường hợp a = 0: Phương trình trở thành bx + c = 0
    if ($b == 0) {
        if ($c == 0) {
            echo "Kết quả: Phương trình có <b>vô số nghiệm</b>.";
        } else {
            echo "Kết quả: Phương trình <b>vô nghiệm</b>.";
        }
    } else {
        $x = -$c / $b;
        echo "Kết quả: Phương trình bậc nhất có 1 nghiệm duy nhất: <b>x = $x</b>";
    }
} else {
    // Trường hợp a != 0: Tính biệt thức Delta = b^2 - 4ac
    $delta = ($b * $b) - (4 * $a * $c);
    echo "Delta (&Delta;) = b<sup>2</sup> - 4ac = <b>$delta</b><br/>";

    if ($delta < 0) {
        echo "Kết quả: Vì &Delta; &lt; 0 nên phương trình <b>vô nghiệm thực</b>.";
    } elseif ($delta == 0) {
        $x = -$b / (2 * $a);
        echo "Kết quả: Vì &Delta; = 0 nên phương trình có <b>nghiệm kép x<sub>1</sub> = x<sub>2</sub> = $x</b>";
    } else {
        $x1 = (-$b + sqrt($delta)) / (2 * $a);
        $x2 = (-$b - sqrt($delta)) / (2 * $a);
        echo "Kết quả: Vì &Delta; &gt; 0 nên phương trình có <b>2 nghiệm phân biệt</b>:<br/>";
        echo "- <b>x<sub>1</sub> = $x1</b><br/>";
        echo "- <b>x<sub>2</sub> = $x2</b>";
    }
}
?>
</body>
</html>
