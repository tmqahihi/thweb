<?php
// Câu 4.4: Điều hướng và include các trang tương ứng trong admin dựa vào $_GET['mod']
if (!defined("ROOT_ADMIN")) {
	echo "You don't have permission to access this page!";
	exit;
}

$mod = isset($_GET["mod"]) ? $_GET["mod"] : "";
$path = ROOT_ADMIN . "/module/home.php"; // Mặc định là trang chủ admin

if ($mod == "sach") {
	$path = ROOT_ADMIN . "/module/sach.php";
} elseif ($mod == "loai") {
	$path = ROOT_ADMIN . "/module/loai.php";
} elseif ($mod == "nhaxb") {
	$path = ROOT_ADMIN . "/module/nhaxb.php";
} elseif ($mod == "order") {
	$path = ROOT_ADMIN . "/module/order.php";
} elseif ($mod == "user") {
	$path = ROOT_ADMIN . "/module/user.php";
}

include $path;
?>
