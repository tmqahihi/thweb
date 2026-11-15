<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Lab5_2 (Câu 5.1 - Giữ nguyên giá trị sau khi Submit)</title>
</head>

<body>
<?php
// Câu 5.1: Xây dựng lại ví dụ 5_2, file chứa form và in ra kết quả là cùng một file,
// và form giữ nguyên giá trị value vừa nhập trong các thành phần khi đã submit.
echo "REQUEST:";
print_r($_REQUEST);
echo "<hr>POST<br>";
print_r($_POST);

$x_single = (isset($_POST["x"]) && !is_array($_POST["x"])) ? $_POST["x"] : "1";
$y_val    = isset($_POST["y"]) ? $_POST["y"] : "2";
$z_val    = isset($_POST["z"]) ? $_POST["z"] : "3";

$x_arr1   = (isset($_POST["x"]) && is_array($_POST["x"]) && isset($_POST["x"][0])) ? $_POST["x"][0] : "1";
$x_arr2   = (isset($_POST["x"]) && is_array($_POST["x"]) && isset($_POST["x"][1])) ? $_POST["x"][1] : "2";
$y_val2   = isset($_POST["y"]) ? $_POST["y"] : "3";

$ten      = isset($_POST["ten"]) ? $_POST["ten"] : "";
$gt       = isset($_POST["gt"]) ? $_POST["gt"] : "";
$st       = (isset($_POST["st"]) && is_array($_POST["st"])) ? $_POST["st"] : array();
?><hr>
<a href="lab5_2.php?x=1&y=2&z=3">Link 1</a><br>
<a href="lab5_2.php?x[]=1&x[]=2&y=3">Link 2</a><br>
<a href="lab5_2.php?mod=product&ac=detail&id=1">Link 3</a><br>
<a href="lab5_2.php?mod=product&ac=list&name=a&page=2">Link 4</a><br>
<hr>
<fieldset>
<legend>Form 1</legend>
<form action="lab5_2.php" method="post">
Nhập x:<input type="text" name="x" value="<?php echo htmlspecialchars($x_single); ?>"><br>
Nhập y:<input type="text" name="y" value="<?php echo htmlspecialchars($y_val); ?>"><br>
Nhập z:<input type="text" name="z" value="<?php echo htmlspecialchars($z_val); ?>"><br>
<input type="submit" >
</form>
</fieldset>

<fieldset>
<legend>Form 2</legend>
<form action="lab5_2.php" method="post">
Nhập x1:<input type="text" name="x[]" value="<?php echo htmlspecialchars($x_arr1); ?>"><br>
Nhập x2:<input type="text" name="x[]" value="<?php echo htmlspecialchars($x_arr2); ?>"><br>
Nhập y:<input type="text" name="y" value="<?php echo htmlspecialchars($y_val2); ?>"><br>
<input type="submit" >
</form>
</fieldset>

<fieldset>
<legend>Form 3</legend>
<form action="lab5_2.php" method="post">
Nhập tên:<input type="text" name="ten" value="<?php echo htmlspecialchars($ten); ?>"><br>
giới tính:<input type="radio" name="gt" value="1" <?php if ($gt === "1") echo 'checked="checked"'; ?>>Nam
		  <input type="radio" name="gt" value="0" <?php if ($gt === "0") echo 'checked="checked"'; ?>>Nữ<br>
Sở Thích:<input type="checkbox" name="st[]" value="tt" <?php if (in_array("tt", $st)) echo 'checked="checked"'; ?>>Thể Thao
		<input type="checkbox" name="st[]" value="dl" <?php if (in_array("dl", $st)) echo 'checked="checked"'; ?>>Du Lịch
		<input type="checkbox" name="st[]" value="game" <?php if (in_array("game", $st)) echo 'checked="checked"'; ?>>Game<br>
<input type="submit" >
</form>
</fieldset>
</body>
</html>