<pre><?php
$a = array();//mảng rỗng
$b = array(1, 3, 5); //mảng có 3 phần tử
/*
$b[0] = 1;
$b[1] = 3;
$b[2] = 5;
*/
$c = array("a"=>2, "b"=>4, "c"=>6);//mảng có 3 phần tử.Các index của mảng là chuỗi
/*
$c['a']= 2;
$c['b'] = 4;
$c['c'] = 6
*/

$na = Count($a);
$nb = Count($b);
$nc = Count($c);
echo "Mảng a có $na phần tử <br> ";
echo "Mảng b có $nb phần tử <br> ";
echo "Mảng c có $nc phần tử <br> ";
print_r($a);
var_dump($b);
print_r($c);
$a[] = 3;
$b[] = 7;
$c['d'] = 8;
echo "<hr> Sau khi thêm phần tử, nội dung các mảng  là :";
print_r($a);
print_r($b);
print_r($c);

$x = 1;
unset($a[$x]);
unset($b[$x]);
unset($c['a']);
echo "<hr> Sau khi xóa phần tử, nội dung các mảng  là :";
print_r($a);
print_r($b);
print_r($c);

$value = 2;
$key = 'b';
if (isset($c[$key])) $c[$key] += $value;
else $c[$key] = $value;
echo "<hr> Kết quả mảng c là:";
print_r($c);

// =========================================================================
// Câu 4.1: Kiểm tra xem một phần tử nào đó có trong mảng không,
// nếu có, hãy xóa hoặc thay đổi dữ liệu của phần tử này và dùng print_r() in mảng sau khi thay đổi.
// =========================================================================
echo "<hr><b>Câu 4.1: Kiểm tra phần tử trong mảng, xóa hoặc thay đổi dữ liệu:</b><br>";

// Ví dụ 1: Kiểm tra giá trị $tim = 5 có trong mảng $b hay không bằng in_array() / array_search()
$tim = 5;
if (in_array($tim, $b)) {
	$viTri = array_search($tim, $b);
	// Thay đổi dữ liệu của phần tử này (ví dụ đổi 5 thành 50)
	$b[$viTri] = 50;
	echo "Tìm thấy giá trị $tim tại vị trí key=$viTri của mảng \$b -> Đã đổi thành 50:<br>";
	print_r($b);
} else {
	echo "Không tìm thấy phần tử có giá trị $tim trong mảng \$b.<br>";
}

// Ví dụ 2: Kiểm tra phần tử có key 'c' trong mảng $c, nếu có thì xóa phần tử đó
$keyTim = 'c';
if (isset($c[$keyTim])) { // Hoặc dùng in_array(6, $c)
	unset($c[$keyTim]);
	echo "Tìm thấy phần tử có key='$keyTim' trong mảng \$c -> Mảng \$c sau khi xóa phần tử '$keyTim':<br>";
	print_r($c);
} else {
	echo "Không tìm thấy phần tử có key='$keyTim' trong mảng \$c.<br>";
}
?>