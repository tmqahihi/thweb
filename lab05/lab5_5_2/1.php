<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Bài 5.2 - Upload nhiều hình ảnh (1.php)</title>
<style>
fieldset { width: 55%; margin: 60px auto; padding: 15px; }
</style>
</head>

<body>
<!-- Câu 5.2: Viết lại ví dụ 5_3 nhưng cho phép upload nhiều hình ảnh -->
<fieldset>
<legend><b>Nhập thông tin &amp; Upload nhiều hình ảnh (Bài 5.2)</b></legend>
<form action="2.php" method="post" enctype="multipart/form-data">
<table align="center" cellpadding="5">
    <tr>
        <td>Nhập tên:</td>
        <td><input type="text" name="ten" /></td>
    </tr>
    <tr>
        <td>Giới tính:</td>
        <td>
            <input type="radio" name="gt" value="1" checked="checked" />Nam
            <input type="radio" name="gt" value="0" />Nữ
        </td>
    </tr>
    <tr>
        <td>Chọn nhiều hình (giữ Ctrl/Shift):</td>
        <td><input type="file" name="hinh[]" multiple="multiple" /></td>
    </tr>
    <tr>
        <td>Hoặc chọn từng hình:</td>
        <td>
            <input type="file" name="hinh[]" /><br/>
            <input type="file" name="hinh[]" />
        </td>
    </tr>
    <tr>
        <td colspan="2" align="center">
            <input type="submit" value="submit" name="submit" />
        </td>
    </tr>
</table>
</form>
</fieldset>
</body>
</html>
