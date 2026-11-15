<?php
// Câu 5.2: Xử lý upload nhiều hình ảnh (viết lại từ ví dụ lab5_3/2.php)
function postIndex($index, $value="")
{
	if (!isset($_POST[$index])) return $value;
	return $_POST[$index];
}

$sm     = postIndex("submit");
$ten    = trim(postIndex("ten"));
$gt     = postIndex("gt");
$arrImg = array("image/png", "image/jpeg", "image/bmp", "image/gif");

if ($sm == "") {
	header("location:1.php");
	exit;
}

$err = "";
if ($ten == "") $err .= "Phải nhập tên <br>";
if ($gt == "")  $err .= "Phải chọn giới tính <br>";

$dsHinhDaLuu = array();

if (!is_dir("image")) {
	mkdir("image", 0777, true);
}

if (isset($_FILES["hinh"]) && is_array($_FILES["hinh"]["name"])) {
	$soFile = count($_FILES["hinh"]["name"]);
	$coChonFile = false;

	for ($i = 0; $i < $soFile; $i++) {
		$name = $_FILES["hinh"]["name"][$i];
		if ($name === "") continue; // Bỏ qua ô file trống
		$coChonFile = true;

		$errFile = $_FILES["hinh"]["error"][$i];
		if ($errFile > 0) {
			$err .= "Lỗi khi tải file hình '$name' <br>";
		} else {
			$type = $_FILES["hinh"]["type"][$i];
			if (!in_array($type, $arrImg)) {
				$err .= "File '$name' không phải file hình hợp lệ <br>";
			} else {
				$temp = $_FILES["hinh"]["tmp_name"][$i];
				if (!move_uploaded_file($temp, "image/" . $name)) {
					$err .= "Không thể lưu file '$name' <br>";
				} else {
					$dsHinhDaLuu[] = $name;
				}
			}
		}
	}

	if (!$coChonFile) {
		$err .= "Phải chọn ít nhất 1 file hình <br>";
	}
} else {
	$err .= "Chưa chọn file hình <br>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bài 5.2 - Kết quả upload nhiều hình ảnh (2.php)</title>
</head>
<body>
<?php
if ($err != "") {
	echo "<div style='color:red;'>$err</div>";
} else {
	if ($gt == "1") echo "<h3>Chào Anh: " . htmlspecialchars($ten) . "</h3>";
	else echo "<h3>Chào Chị: " . htmlspecialchars($ten) . "</h3>";
	echo "<hr><p><b>Danh sách các hình đã upload (" . count($dsHinhDaLuu) . " hình):</b></p>";
	foreach ($dsHinhDaLuu as $imgName) {
		echo "<div style='display:inline-block; margin:10px; text-align:center;'>";
		echo "<img src='image/" . htmlspecialchars($imgName) . "' style='max-width:220px; max-height:220px; border:1px solid #ccc;' /><br/>";
		echo "<span>" . htmlspecialchars($imgName) . "</span>";
		echo "</div>";
	}
}
?>
<p><a href="1.php">Tiếp tục</a></p>
</body>
</html>
