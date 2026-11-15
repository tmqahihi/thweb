<pre><?php
$a = array(1, -3, 5); //mảng có 3 phần tử
$b = array("a"=>2, "b"=>4, "c"=>-6);//mảng có 3 phần tử.Các index của mảng là chuỗi
?>
Nội dung giá trị mảng a :
<?php
foreach($a as $value)
{
	echo $value ." ";	
}
?>
<br> Nội dung mảng a (key-value) 
<?php
foreach($a as $key=>$value)
{
	echo "($key - $value )";	
}
?>
<br /> Nội dung mảng b: (key - value):
<?php
foreach($b as $k=>$v)
{
	echo "($k - $v) ";	
}
?>
<br />Hiển thị nội dung mảng b ra dạng bảng:
<table border=1>
	<tr><td>STT</td><td>Key</td><td>Value</td></tr>
    <?php
	$i=0;
	foreach($b as $k=>$v)
	{	$i++;
		echo "<tr><td>$i</td>";
		echo "<td>$k</td>";
		echo "<td>$v</td></tr>";
	}
	?>
</table>

<?php
// =========================================================================
// Câu 4.2a: Đếm số phần tử có giá trị dương của mảng $a
// =========================================================================
$demDuongA = 0;
foreach ($a as $value) {
	if ($value > 0) {
		$demDuongA++;
	}
}
echo "<hr><b>Câu 4.2a:</b> Số phần tử có giá trị dương của mảng \$a là: <b>$demDuongA</b><br>";

// =========================================================================
// Câu 4.2b: Tạo mảng mới $c, lưu các phần tử dương trong mảng $b
// Ví dụ: $c = array("a"=>2, "b"=>4)
// =========================================================================
$c = array();
foreach ($b as $k => $v) {
	if ($v > 0) {
		$c[$k] = $v;
	}
}
echo "<br><b>Câu 4.2b:</b> Mảng mới \$c lưu các phần tử dương trong mảng \$b là:<br>";
print_r($c);
?>