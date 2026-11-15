<?php
// Câu 4.4c: Đưa các định nghĩa hàm BCC và BanCo ra file function.php

/*
Câu 4.4a & 4.4b:
Hàm bảng cửu chương (BCC):
- Nhận các tham số:
  + $n: số nguyên dương (1->10)
  + $colorHead: màu nền của dòng đầu tiên (mặc định: "green")
  + $color1: màu nền dòng lẻ (mặc định: "#FFCC99")
  + $color2: màu nền các dòng chẵn (mặc định: "#CCFFFF")
- Không xuất trực tiếp trong hàm mà tổng hợp thành một chuỗi và return chuỗi cần xuất.
*/
function BCC($n, $colorHead = "green", $color1 = "#FFCC99", $color2 = "#CCFFFF")
{
	$html = "<table border='1' cellspacing='0' cellpadding='5' style='margin-bottom:15px;'>";
	$html .= "<tr bgcolor='$colorHead'><td colspan='3'><b>Bảng cửu chương $n</b></td></tr>";
	for ($i = 1; $i <= 10; $i++) {
		// Dòng lẻ dùng $color1, dòng chẵn dùng $color2
		$rowColor = ($i % 2 != 0) ? $color1 : $color2;
		$ketQua = $n * $i;
		$html .= "<tr bgcolor='$rowColor'>";
		$html .= "<td>$n</td>";
		$html .= "<td>$i</td>";
		$html .= "<td>$ketQua</td>";
		$html .= "</tr>";
	}
	$html .= "</table>";
	return $html;
}

/*
Câu 4.4b:
Hàm BanCo:
- Input: $size: kích thước bàn cờ (mặc định là 8)
- Output: Tổng hợp bàn cờ HTML thành một chuỗi và return chuỗi cần xuất.
*/
function BanCo($size = 8)
{
	$html = "<div id='banco'>";
	for ($i = 1; $i <= $size; $i++) {
		for ($j = 1; $j <= $size; $j++) {
			$classCss = (($i + $j) % 2 == 0) ? "cellWhite" : "cellBlack";
			$html .= "<div class='$classCss'> $i - $j</div>";
		}
		$html .= "<div class='clear'></div>";
	}
	$html .= "</div>";
	return $html;
}
?>
