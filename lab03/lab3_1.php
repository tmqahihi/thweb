<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lab 3_1 (Kèm Câu 4.1 &amp; 4.2)</title>
</head>

<body>
<?php
	//Tính biểu thức S=1 + 2 + 3 + ... + 100
	// Sử dụng FOR
	$s1=0;
	for($i=1;$i<=100;$i++)
		$s1+=$i;
	//Sử dụng while
	$i=1;
	$s2=0;
	while($i<=100)
	{
		$s2+=$i;
		$i++;
	}
	//Sử dụng DO...WHILE
	$i=1;
	$s3=0;
	do
	{
		$s3+=$i;
		$i++;
	}while($i<=100);
	echo "Kết quả S = 1 + 2 + 3 + ... + 100 <br/>";
	echo "Tính bằng FOR, S1 = $s1 <br/>";
	echo "Tính bằng WHILE, S2 = $s2 <br/>";
	echo "Tính bằng DO...WHILE, S3 = $s3 <br/><hr/>";

	// ====================================================================
	// Câu 4.1: Sử dụng vòng lặp for để tính tổng các số chẵn từ 2 đến 100
	// ====================================================================
	$tong_chan = 0;
	for ($i = 2; $i <= 100; $i += 2) {
		$tong_chan += $i;
	}
	echo "<b>Câu 4.1:</b> Tổng các số chẵn từ 2 đến 100 là: <b>$tong_chan</b> <br/><hr/>";

	// ====================================================================
	// Câu 4.2: Sử dụng while (hoặc do...while) tìm n nhỏ nhất sao cho 1 + 2 + ... + n > 1000
	// ====================================================================
	$n = 0;
	$tong = 0;
	while ($tong <= 1000) {
		$n++;
		$tong += $n;
	}
	echo "<b>Câu 4.2:</b> Số n nhỏ nhất sao cho 1 + 2 + ... + n &gt; 1000 là: <b>n = $n</b> (Tổng = $tong) <br/>";
?>
</body>
</html>