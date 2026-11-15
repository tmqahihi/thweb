<?php
function showArray($arr)
{
	foreach($arr as $k=>$v)
	{
		echo "<br> $k - $v ";	
	}	
}
$a = array(6, 2, 7, 8, 5); 
$b = array("a"=>4, "b"=>2, "c"=>3, "d"=>8);
$n = array_rand($a);
echo "Phần tử ngẫu nhiên: key=$n , giá trị=".$a[$n];
$c = array_rand($a, 3);
echo "<br> Danh sách 3 phần tử ngẫu nhiên được lấy ra:";
foreach($c as $k)
{
	echo "(key=$k -	value={$a[$k]})";
}

$m=3;
$c = array_rand($b, $m);
echo "<br> Danh sách $m phần tử ngẫu nhiên được lấy ra từ b:";
foreach($c as $k)
{
	echo "(key=$k -	value={$b[$k]})";
}
?><hr />
<?php
$a1= $a; sort($a1);
echo "Mảng a sau khi sắp xếp tăng dần:";
showArray($a1);
$b1 = $b;
sort($b1);
echo "<br>Mảng b sau khi sắp xếp tăng dần loại bỏ key:";
showArray($b1);

$b2 = $b;
asort($b2);
echo "<br>Mảng b sau khi sắp xếp tăng dần giữ lại key:";
showArray($b2);

// =========================================================================
// Câu 4.3: Tìm và sử dụng các hàm để sắp xếp mảng theo chiều giảm dần
// - rsort(): Sắp xếp mảng giảm dần theo giá trị (loại bỏ key cũ, đánh lại chỉ số 0, 1, 2...)
// - arsort(): Sắp xếp mảng giảm dần theo giá trị và giữ nguyên key
// - krsort(): Sắp xếp mảng giảm dần theo key (khóa)
// =========================================================================
echo "<hr><b>Câu 4.3: Sắp xếp mảng theo chiều giảm dần:</b>";

$a_giam = $a;
rsort($a_giam);
echo "<br>1. Mảng a sau khi sắp xếp giảm dần bằng <b>rsort()</b>:";
showArray($a_giam);

$b_giam1 = $b;
rsort($b_giam1);
echo "<br><br>2. Mảng b sau khi sắp xếp giảm dần theo giá trị (loại bỏ key) bằng <b>rsort()</b>:";
showArray($b_giam1);

$b_giam2 = $b;
arsort($b_giam2);
echo "<br><br>3. Mảng b sau khi sắp xếp giảm dần theo giá trị (giữ lại key) bằng <b>arsort()</b>:";
showArray($b_giam2);

$b_giam_key = $b;
krsort($b_giam_key);
echo "<br><br>4. Mảng b sau khi sắp xếp giảm dần theo key bằng <b>krsort()</b>:";
showArray($b_giam_key);

echo "<hr> Tính tổng ";
$sum_a = array_sum($a);
$sum_b = array_sum($b);
echo "<br> Tổng các giá trị trong mảng a = $sum_a , mảng b= $sum_b ";
?>
