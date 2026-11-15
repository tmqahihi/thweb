<?php
require_once __DIR__ . '/lab06_helpers.php';
function checkUserName(string $str): bool
{
    return preg_match('/^[A-Za-z0-9._-]+$/D', $str) === 1;
}
function checkEmail(string $str): bool
{
    return preg_match('/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}$/D', $str) === 1;
}
function checkPassword(string $str): bool
{
    // Ít nhất 8 ký tự, 1 chữ thường, 1 chữ HOA và 1 chữ số.
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,}$/D', $str) === 1;
}
function checkPhone(string $str): bool
{
    // Yêu cầu "phải nhập số": chỉ chấp nhận một hay nhiều chữ số, không nhận dấu +, cách, -.
    return preg_match('/^[0-9]+$/D', $str) === 1;
}
function checkDateOfBirth(string $str): bool
{
    // dd/mm/yyyy hoặc dd-mm-yyyy, và phải là một ngày tồn tại.
    if (preg_match('/^([0-9]{2})([\/-])([0-9]{2})\2([0-9]{4})$/D', $str, $m) !== 1) return false;
    return checkdate((int)$m[3], (int)$m[1], (int)$m[4]);
}
$submitted = $_SERVER['REQUEST_METHOD'] === 'POST';
$username = trim(postText('username'));
$password = postText('password');
$email = trim(postText('email'));
$date = trim(postText('date'));
$phone = trim(postText('phone'));
$errors = [];
if ($submitted) {
    if (!checkUserName($username)) $errors[] = 'Username chỉ được dùng chữ a-z, A-Z, số 0-9, dấu . _ - và không để trống.';
    if (!checkPassword($password)) $errors[] = 'Mật khẩu cần ít nhất 8 ký tự, có 1 chữ thường, 1 chữ HOA và 1 chữ số.';
    if (!checkEmail($email)) $errors[] = 'Email không đúng định dạng.';
    if (!checkDateOfBirth($date)) $errors[] = 'Ngày sinh phải đúng dd/mm/yyyy hoặc dd-mm-yyyy và là ngày hợp lệ.';
    if (!checkPhone($phone)) $errors[] = 'Số điện thoại chỉ được gồm các chữ số từ 0 đến 9.';
}
?>
<!doctype html><html lang="vi"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>4.2 - Regular Expression</title><link rel="stylesheet" href="style.css"></head>
<body><main class="container"><?php include __DIR__ . '/nav.php'; ?>
<section class="card"><h1>Bài 4.2 — Kiểm tra dữ liệu bằng Regular Expression</h1>
<form action="lab06_3.php" method="post"><div class="form-grid">
<label for="username">Username *</label><input id="username" name="username" type="text" value="<?= h($username) ?>" required>
<label for="password">Mật khẩu *</label><input id="password" name="password" type="password" placeholder="Ví dụ: Abcdef12" required>
<label for="email">Email *</label><input id="email" name="email" type="text" value="<?= h($email) ?>" placeholder="abc@example.com" required>
<label for="date">Ngày sinh *</label><input id="date" name="date" type="text" value="<?= h($date) ?>" placeholder="31/12/2004 hoặc 31-12-2004" required>
<label for="phone">Điện thoại *</label><input id="phone" name="phone" type="text" value="<?= h($phone) ?>" placeholder="0912345678" required>
<div></div><div><button name="submit" value="1" type="submit">Kiểm tra</button></div></div></form>
</section>
<?php if ($submitted): ?><section class="card"><h2>Kết quả</h2>
<?php if ($errors): ?><div class="error"><?php foreach ($errors as $error): ?><div>• <?= h($error) ?></div><?php endforeach; ?></div>
<?php else: ?><div class="success">Tất cả thông tin nhập vào đều hợp lệ.</div>
<table><tr><th>Username</th><td><?= h($username) ?></td></tr><tr><th>Email</th><td><?= h($email) ?></td></tr><tr><th>Ngày sinh</th><td><?= h($date) ?></td></tr><tr><th>Điện thoại</th><td><?= h($phone) ?></td></tr><tr><th>Mật khẩu</th><td>Hợp lệ (không hiển thị lại)</td></tr></table>
<?php endif; ?></section><?php endif; ?>
</main></body></html>
