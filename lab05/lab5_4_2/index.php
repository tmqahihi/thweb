<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bài 4.2 - Tìm kiếm thông tin sản phẩm</title>
<style>
	fieldset { width: 450px; margin: 20px auto; padding: 15px; }
	.result { width: 450px; margin: 20px auto; padding: 15px; border: 1px solid #0099CC; background: #F5FCFF; }
</style>
</head>

<body>
<?php
// Câu 4.2: Xây dựng trang tìm kiếm thông tin sản phẩm (sử dụng phương thức GET)
$ten_sp   = isset($_GET["ten_sp"]) ? trim($_GET["ten_sp"]) : "";
$cach_tim = isset($_GET["cach_tim"]) ? $_GET["cach_tim"] : "gan_dung";
$loai_sp  = isset($_GET["loai_sp"]) ? $_GET["loai_sp"] : "tatca";
?>

<fieldset>
	<legend><b>Tìm kiếm thông tin sản phẩm (Bài 4.2)</b></legend>
	<form action="" method="get">
		<table>
			<tr>
				<td>Tên sản phẩm:</td>
				<td><input type="text" name="ten_sp" value="<?php echo htmlspecialchars($ten_sp); ?>" /></td>
			</tr>
			<tr>
				<td>Cách tìm:</td>
				<td>
					<label><input type="radio" name="cach_tim" value="gan_dung" <?php if ($cach_tim == "gan_dung") echo 'checked="checked"'; ?> /> Gần đúng</label>
					<label><input type="radio" name="cach_tim" value="chinh_xac" <?php if ($cach_tim == "chinh_xac") echo 'checked="checked"'; ?> /> Chính xác</label>
				</td>
			</tr>
			<tr>
				<td>Loại sản phẩm:</td>
				<td>
					<select name="loai_sp">
						<option value="tatca" <?php if ($loai_sp == "tatca") echo 'selected="selected"'; ?>>Tất cả (tatca)</option>
						<option value="loại 1" <?php if ($loai_sp == "loại 1") echo 'selected="selected"'; ?>>Loại 1</option>
						<option value="loại 2" <?php if ($loai_sp == "loại 2") echo 'selected="selected"'; ?>>Loại 2</option>
						<option value="loại 3" <?php if ($loai_sp == "loại 3") echo 'selected="selected"'; ?>>Loại 3</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center" style="padding-top: 10px;">
					<input type="submit" name="tim" value="Tìm kiếm" />
				</td>
			</tr>
		</table>
	</form>
</fieldset>

<?php
// In ra màn hình các giá trị mà người sử dụng vừa nhập vào form
if (isset($_GET["tim"]) || isset($_GET["ten_sp"])) {
	echo "<div class='result'>";
	echo "<h4>Kết quả thông tin vừa nhập:</h4>";
	echo "- <b>Tên sản phẩm:</b> " . htmlspecialchars($ten_sp) . "<br/>";
	echo "- <b>Cách tìm:</b> " . ($cach_tim == "chinh_xac" ? "Chính xác" : "Gần đúng") . "<br/>";
	// Loại sản phẩm: chỉ in ra loại sản phẩm nếu không phải chọn tất cả ("tatca")
	if ($loai_sp != "tatca") {
		echo "- <b>Loại sản phẩm:</b> " . htmlspecialchars($loai_sp) . "<br/>";
	}
	echo "</div>";
}
?>
</body>
</html>
