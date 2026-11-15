<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bài 4.3 - Đăng ký thông tin thành viên (lab5_4_3.php)</title>
<style>
	fieldset { width: 550px; margin: 20px auto; padding: 15px; }
	.box-ketqua { width: 550px; margin: 20px auto; padding: 15px; border: 1px solid #28a745; background: #f3fff5; }
	.box-loi { width: 550px; margin: 20px auto; padding: 15px; border: 1px solid #dc3545; background: #fff5f5; color: #c00; }
	.bat-buoc { color: red; }
</style>
</head>

<body>
<?php
// Câu 4.3: Trang đăng ký thông tin thành viên (lab5_4_3.php) gồm 2 phần: Form nhập liệu & Nhận/kiểm tra dữ liệu
$username   = isset($_POST["username"]) ? trim($_POST["username"]) : "";
$password   = isset($_POST["password"]) ? $_POST["password"] : "";
$repassword = isset($_POST["repassword"]) ? $_POST["repassword"] : "";
$gioitinh   = isset($_POST["gioitinh"]) ? $_POST["gioitinh"] : "";
$sothich    = isset($_POST["sothich"]) ? $_POST["sothich"] : array();
$tinh       = isset($_POST["tinh"]) ? $_POST["tinh"] : "";

$loi = array();
$tenFileHinh = "";

if (isset($_POST["submit"])) {
	// 1. Kiểm tra các trường bắt buộc (*)
	if ($username === "") {
		$loi[] = "Vui lòng nhập Tên đăng nhập (*).";
	}
	if ($password === "") {
		$loi[] = "Vui lòng nhập Mật khẩu (*).";
	}
	if ($repassword === "") {
		$loi[] = "Vui lòng nhập lại mật khẩu (*).";
	}
	if ($password !== "" && $repassword !== "" && $password !== $repassword) {
		$loi[] = "Mật khẩu và Nhập lại mật khẩu không trùng nhau.";
	}
	if ($gioitinh === "") {
		$loi[] = "Vui lòng chọn Giới tính (*).";
	}
	if ($tinh === "") {
		$loi[] = "Vui lòng chọn Tỉnh/Thành phố (*).";
	}

	// 2. Kiểm tra hình ảnh (tùy chọn): nếu có chọn file thì phải là .jpg, .png, .bmp, .gif
	if (isset($_FILES["hinh"]) && $_FILES["hinh"]["name"] !== "") {
		if ($_FILES["hinh"]["error"] !== 0) {
			$loi[] = "Có lỗi xảy ra khi tải lên file hình ảnh.";
		} else {
			$tenGoc = $_FILES["hinh"]["name"];
			$duoiFile = strtolower(pathinfo($tenGoc, PATHINFO_EXTENSION));
			$duoiHopLe = array("jpg", "jpeg", "png", "bmp", "gif");

			if (!in_array($duoiFile, $duoiHopLe)) {
				$loi[] = "File hình ảnh không hợp lệ! Chỉ chấp nhận các định dạng: .jpg, .png, .bmp, .gif.";
			} else {
				// Tạo thư mục image nếu chưa tồn tại và lưu file
				if (!is_dir("image")) {
					mkdir("image", 0777, true);
				}
				$tenFileHinh = $tenGoc;
				move_uploaded_file($_FILES["hinh"]["tmp_name"], "image/" . $tenFileHinh);
			}
		}
	}
}
?>

<!-- PHẦN A: FORM NHẬP LIỆU -->
<fieldset>
	<legend><b>Đăng ký thông tin thành viên (Bài 4.3)</b></legend>
	<form action="lab5_4_3.php" method="post" enctype="multipart/form-data">
		<table cellpadding="5" width="100%">
			<tr>
				<td width="35%">Tên đăng nhập (<span class="bat-buoc">*</span>):</td>
				<td><input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" /></td>
			</tr>
			<tr>
				<td>Mật khẩu (<span class="bat-buoc">*</span>):</td>
				<td><input type="password" name="password" /></td>
			</tr>
			<tr>
				<td>Nhập lại mật khẩu (<span class="bat-buoc">*</span>):</td>
				<td><input type="password" name="repassword" /></td>
			</tr>
			<tr>
				<td>Giới tính (<span class="bat-buoc">*</span>):</td>
				<td>
					<label><input type="radio" name="gioitinh" value="Nam" <?php if ($gioitinh === "Nam") echo 'checked="checked"'; ?> /> Nam</label>
					<label><input type="radio" name="gioitinh" value="Nữ" <?php if ($gioitinh === "Nữ") echo 'checked="checked"'; ?> /> Nữ</label>
				</td>
			</tr>
			<tr>
				<td>Sở thích:</td>
				<td>
					<label><input type="checkbox" name="sothich[]" value="Thể thao" <?php if (in_array("Thể thao", $sothich)) echo 'checked="checked"'; ?> /> Thể thao</label>
					<label><input type="checkbox" name="sothich[]" value="Du lịch" <?php if (in_array("Du lịch", $sothich)) echo 'checked="checked"'; ?> /> Du lịch</label>
					<label><input type="checkbox" name="sothich[]" value="Âm nhạc" <?php if (in_array("Âm nhạc", $sothich)) echo 'checked="checked"'; ?> /> Âm nhạc</label>
					<label><input type="checkbox" name="sothich[]" value="Đọc sách" <?php if (in_array("Đọc sách", $sothich)) echo 'checked="checked"'; ?> /> Đọc sách</label>
				</td>
			</tr>
			<tr>
				<td>Hình ảnh (tùy chọn):</td>
				<td><input type="file" name="hinh" /></td>
			</tr>
			<tr>
				<td>Tỉnh (<span class="bat-buoc">*</span>):</td>
				<td>
					<select name="tinh">
						<option value="">-- Chọn Tỉnh / Thành phố --</option>
						<option value="TP. Hồ Chí Minh" <?php if ($tinh === "TP. Hồ Chí Minh") echo 'selected="selected"'; ?>>TP. Hồ Chí Minh</option>
						<option value="Hà Nội" <?php if ($tinh === "Hà Nội") echo 'selected="selected"'; ?>>Hà Nội</option>
						<option value="Đà Nẵng" <?php if ($tinh === "Đà Nẵng") echo 'selected="selected"'; ?>>Đà Nẵng</option>
						<option value="Cần Thơ" <?php if ($tinh === "Cần Thơ") echo 'selected="selected"'; ?>>Cần Thơ</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center" style="padding-top: 10px;">
					<input type="submit" name="submit" value="Đăng ký (Submit)" />
					<input type="reset" value="Nhập lại (Reset)" />
				</td>
			</tr>
		</table>
	</form>
</fieldset>

<!-- PHẦN B: NHẬN VÀ KIỂM TRA DỮ LIỆU -->
<?php
if (isset($_POST["submit"])) {
	if (!empty($loi)) {
		echo "<div class='box-loi'>";
		echo "<b>Dữ liệu nhập vào không hợp lệ:</b><ul>";
		foreach ($loi as $thongBao) {
			echo "<li>$thongBao</li>";
		}
		echo "</ul></div>";
	} else {
		echo "<div class='box-ketqua'>";
		echo "<h4>Đăng ký thành công! Thông tin vừa nhập:</h4>";
		echo "- <b>Tên đăng nhập:</b> " . htmlspecialchars($username) . "<br/>";
		echo "- <b>Mật khẩu:</b> " . htmlspecialchars($password) . "<br/>";
		echo "- <b>Giới tính:</b> " . htmlspecialchars($gioitinh) . "<br/>";
		echo "- <b>Sở thích:</b> " . (!empty($sothich) ? htmlspecialchars(implode(", ", $sothich)) : "Không chọn") . "<br/>";
		echo "- <b>Tỉnh/Thành phố:</b> " . htmlspecialchars($tinh) . "<br/>";
		if ($tenFileHinh !== "") {
			echo "- <b>Hình ảnh đã upload:</b> $tenFileHinh<br/>";
			echo "<img src='image/" . htmlspecialchars($tenFileHinh) . "' style='max-width:200px; margin-top:8px;' />";
		} else {
			echo "- <b>Hình ảnh:</b> (Không upload)";
		}
		echo "</div>";
	}
}
?>
</body>
</html>
