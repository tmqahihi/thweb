<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bài 5.3 - Đề thi trắc nghiệm ngẫu nhiên</title>
</head>

<body>
<h3>Bài 5.3: Tạo đề thi lấy ngẫu nhiên $m câu hỏi từ danh sách $n câu hỏi trắc nghiệm</h3>
<?php
// Câu 5.3: Xây dựng mảng chứa danh sách $n câu hỏi trắc nghiệm.
// In ra một đề thi lấy ngẫu nhiên $m câu hỏi ($m < $n) từ mảng câu hỏi ban đầu.

$dsCauHoi = array(
	array(
		"cau_hoi" => "Hàm nào trong PHP dùng để đếm số phần tử của mảng?",
		"A" => "length()",
		"B" => "count()",
		"C" => "size()",
		"D" => "sum()"
	),
	array(
		"cau_hoi" => "Hàm nào dùng để sắp xếp mảng giảm dần theo giá trị và giữ nguyên key?",
		"A" => "sort()",
		"B" => "rsort()",
		"C" => "asort()",
		"D" => "arsort()"
	),
	array(
		"cau_hoi" => "Hàm nào dùng để lấy ngẫu nhiên một hoặc nhiều phần tử (key) từ mảng?",
		"A" => "array_rand()",
		"B" => "rand_array()",
		"C" => "array_pop()",
		"D" => "array_shift()"
	),
	array(
		"cau_hoi" => "Hàm nào dùng để xóa một phần tử xác định trong mảng PHP?",
		"A" => "delete()",
		"B" => "remove()",
		"C" => "unset()",
		"D" => "clear()"
	),
	array(
		"cau_hoi" => "Hàm nào dùng để tính tổng các giá trị số trong mảng 1 chiều?",
		"A" => "array_total()",
		"B" => "array_sum()",
		"C" => "sum_array()",
		"D" => "count_values()"
	),
	array(
		"cau_hoi" => "Để kiểm tra một giá trị có tồn tại trong mảng hay không, ta dùng hàm nào?",
		"A" => "in_array()",
		"B" => "isset_array()",
		"C" => "array_exists()",
		"D" => "has_value()"
	),
	array(
		"cau_hoi" => "Ký hiệu nào dùng để bắt đầu tên một biến trong PHP?",
		"A" => "@",
		"B" => "#",
		"C" => "$",
		"D" => "&"
	)
);

$n = count($dsCauHoi); // Tổng số câu hỏi trong ngân hàng ($n = 7)
$m = 4;                // Số câu hỏi cần lấy ngẫu nhiên cho đề thi ($m < $n)

echo "<p>Ngân hàng có <b>$n</b> câu hỏi. Đề thi lấy ngẫu nhiên <b>$m</b> câu hỏi (F5 / tải lại trang để đổi đề mới):</p><hr/>";

// Lấy ngẫu nhiên $m chỉ số (key) từ mảng $dsCauHoi bằng hàm array_rand()
$cacChiSoNgauNhien = array_rand($dsCauHoi, $m);

// Đảm bảo $cacChiSoNgauNhien luôn là mảng (phòng trường hợp $m = 1)
if (!is_array($cacChiSoNgauNhien)) {
	$cacChiSoNgauNhien = array($cacChiSoNgauNhien);
}

// Trộn thứ tự các câu hỏi vừa bốc được để đề thi ngẫu nhiên hoàn toàn
shuffle($cacChiSoNgauNhien);

echo "<form method='post' action=''>";
$stt = 0;
foreach ($cacChiSoNgauNhien as $key) {
	$stt++;
	$q = $dsCauHoi[$key];
	echo "<div style='margin-bottom: 15px;'>";
	echo "<b>Câu $stt: {$q['cau_hoi']}</b><br/>";
	echo "<label><input type='radio' name='cau_$stt' value='A' /> A. {$q['A']}</label><br/>";
	echo "<label><input type='radio' name='cau_$stt' value='B' /> B. {$q['B']}</label><br/>";
	echo "<label><input type='radio' name='cau_$stt' value='C' /> C. {$q['C']}</label><br/>";
	echo "<label><input type='radio' name='cau_$stt' value='D' /> D. {$q['D']}</label><br/>";
	echo "</div>";
}
echo "</form>";
?>
</body>
</html>
