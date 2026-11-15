<?php
define('ROOT_ADMIN', dirname(__FILE__));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Back-End (Câu 4.4)</title>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>

<body>
<div id="contain">
<div id="header">Header - Quản trị hệ thống (Admin)</div>
<div id="body">
	<div id="left">
    	<a href="index.php">Home</a><br />
        <a href="index.php?mod=sach">Danh Mục Sách</a><br />
		<a href="index.php?mod=loai">Loại sách</a><br />
		<a href="index.php?mod=nhaxb">Nhà xuất bản</a><br />
        <a href="index.php?mod=order">Quản lý đơn hàng</a><br />
        <a href="index.php?mod=user">Thông tin user</a><br />
        <hr />
        <a href="../index.php">Trang front-end</a>
    </div>
    <div id="right">
		<div id="thongtinadmin">
            <div class="info">
            	Thông tin admin
            </div>
            <div class="logout">
            	<a href="#">Thoát</a>
            </div>
        </div>
       
		<div style="padding: 15px;">
			<?php
			// Câu 4.4: Khi click vào các link sẽ include các trang tương ứng trong admin
			include ROOT_ADMIN . "/mod.php";
			?>
		</div>
    </div>
</div>
<div id="footer">footer</div>
</div>
</body>
</html>