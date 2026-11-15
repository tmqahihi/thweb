<?php
require_once __DIR__ . '/lab06_helpers.php';
$submitted = $_SERVER['REQUEST_METHOD'] === 'POST';
$username = trim(postText('username'));
$password1 = postText('password1');
$password2 = postText('password2');
$name = trim(postText('name'));
$rawInfo = postText('thong_tin');
// Thực hiện bước loại dấu \ trước dấu nháy đã gửi từ JavaScript.
$withoutSlashes = stripslashes($rawInfo);
$cleanInfo = strip_tags($withoutSlashes);
// HTML phải được escape trước khi đưa <br> vào (phòng XSS).
$shownInfo = nl2br(h($cleanInfo), false);
$errors = [];
if ($submitted) {
    if (strlen($username) < 6) $errors[] = 'Username ít nhất phải 6 ký tự.';
    if ($password1 !== $password2) $errors[] = 'Mật khẩu và mật khẩu nhập lại không khớp.';
    if (strlen($password1) < 8) $errors[] = 'Mật khẩu phải có ít nhất 8 ký tự.';
    $words = preg_split('/\s+/u', trim($name), -1, PREG_SPLIT_NO_EMPTY);
    if (count($words ?: []) < 2) $errors[] = 'Họ tên phải có ít nhất 2 từ.';
}
?>
<!doctype html><html lang="vi"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>4.1 - Xử lý chuỗi</title><link rel="stylesheet" href="style.css"></head>
<body><main class="container"><?php include __DIR__ . '/nav.php'; ?>
<section class="card"><h1>Bài 4.1 — Đăng ký và xử lý thông tin</h1>
<form method="post" action="lab06_1.php" id="registerForm">
<div class="form-grid">
<label for="username">Tên đăng nhập</label><input id="username" type="text" name="username" value="<?= h($username) ?>" required>
<label for="password1">Mật khẩu</label><input id="password1" type="password" name="password1" required>
<label for="password2">Nhập lại mật khẩu</label><input id="password2" type="password" name="password2" required>
<label for="name">Họ tên</label><input id="name" type="text" name="name" value="<?= h($name) ?>" required>
<label for="thong_tin">Thông tin</label><textarea id="thong_tin" name="thong_tin" placeholder="Nhập nội dung có thẻ HTML, xuống dòng hoặc dấu nháy đơn..."><?= h($withoutSlashes) ?></textarea>
<div></div><div><button type="submit" name="submit" value="1">Gửi thông tin</button></div>
</div></form>
<p class="small">Khi bấm Gửi, JavaScript thêm dấu \ trước dấu nháy đơn trong textarea; PHP dùng stripslashes() bỏ dấu \, strip_tags() xóa HTML và nl2br() để chuyển xuống dòng.</p>
</section>
<?php if ($submitted): ?>
<section class="card"><h2>Kết quả</h2>
<?php if ($errors): ?>
<div class="error"><?php foreach ($errors as $err): ?><div><?= h($err) ?></div><?php endforeach; ?></div>
<?php else: ?>
<div class="success">Dữ liệu hợp lệ.</div>
<p><strong>Username:</strong> <?= h($username) ?></p>
<p><strong>SHA1 của mật khẩu:</strong> <code><?= h(sha1($password1)) ?></code></p>
<p><strong>Kết hợp MD5(SHA1(mật khẩu)):</strong> <code><?= h(md5(sha1($password1))) ?></code></p>
<p><strong>Họ tên:</strong> <?= h($name) ?></p>
<p><strong>Chuỗi thông tin nhận trên server (có dấu \):</strong></p><pre><?= h($rawInfo) ?></pre>
<p><strong>Thông tin sau xử lý:</strong></p><div class="note"><?= $shownInfo ?></div>
<?php endif; ?></section>
<?php endif; ?>
</main><script>
document.getElementById('registerForm').addEventListener('submit', function() {
    const area = document.getElementById('thong_tin');
    // Thêm \ trước nháy đơn ngay trước khi dữ liệu được gửi lên server.
    area.value = area.value.replace(/'/g, "\\'");
});
</script></body></html>
