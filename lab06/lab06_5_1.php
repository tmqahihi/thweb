<?php
require_once __DIR__ . '/lab06_helpers.php';
$sites = [
    'vnexpress' => ['label' => 'VnExpress - Thể thao', 'url' => 'https://vnexpress.net/the-thao'],
    'znews' => ['label' => 'Znews - Xã hội', 'url' => 'https://znews.vn/xa-hoi.html'],
    'dantri' => ['label' => 'Dân trí - Xã hội', 'url' => 'https://dantri.com.vn/xa-hoi.htm'],
];
$submitted = $_SERVER['REQUEST_METHOD'] === 'POST';
$siteKey = postText('site');
if (!isset($sites[$siteKey])) $siteKey = 'vnexpress';
$pastedHtml = postText('html_input');
$imageName = trim(postText('image_name'));
$isDemo = postText('demo') === '1';
$error = null;
$html = null;
$links = [];
$emails = [];
$phones = [];
$imageValid = null;
if ($submitted) {
    if ($imageName !== '') {
        // Tên ảnh: a-z, A-Z, 0-9, gạch dưới hoặc gạch ngang, phần mở rộng được cho phép.
        $imageValid = preg_match('/^[A-Za-z0-9_-]+\.(?:jpg|jpeg|png|gif|webp)$/iD', $imageName) === 1;
    }
    if (trim($pastedHtml) !== '') {
        $html = $pastedHtml;
        $baseUrl = $sites[$siteKey]['url'];
    } elseif ($isDemo) {
        $html = '<!doctype html><html><body><h2>HTML minh họa</h2>'
            . '<a href="https://example.com/bai-viet.html">Bài viết minh họa</a>'
            . '<p>Email: lienhe@example.com; số điện thoại: 0912345678 / +84987654321.</p>'
            . '<a href="/lien-he">Liên hệ</a></body></html>';
        $baseUrl = $sites[$siteKey]['url'];
    } else {
        $baseUrl = $sites[$siteKey]['url'];
        [$html, $error] = getRemoteHtml($baseUrl);
    }
    if ($html !== null) {
        // 5.1(a) Lọc href của tất cả thẻ <a> có thuộc tính href đặt trong nháy.
        preg_match_all('~<a\b[^>]*\bhref\s*=\s*(["\'])(.*?)\1~isu', $html, $linkMatches, PREG_SET_ORDER);
        foreach ($linkMatches as $match) {
            $url = normalizeUrl($match[2], $baseUrl);
            if ($url !== null) $links[$url] = $url;
        }
        // 5.1(b) Regex lọc email và số điện thoại.
        preg_match_all('/\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}\b/', $html, $emailMatches);
        $emails = array_values(array_unique($emailMatches[0]));
        preg_match_all('/(?<![0-9])(?:\+84|0)(?:[ .-]?[0-9]){9,10}(?![0-9])/', $html, $phoneMatches);
        foreach ($phoneMatches[0] as $phoneRaw) {
            $normalized = preg_replace('/[ .-]/', '', $phoneRaw);
            if (preg_match('/^(?:0[0-9]{9,10}|\+84[0-9]{9,10})$/D', $normalized)) {
                $phones[$normalized] = $normalized;
            }
        }
        $links = array_values($links);
        $phones = array_values($phones);
    }
}
?>
<!doctype html><html lang="vi"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>5.1 - Lọc link, email, số điện thoại</title><link rel="stylesheet" href="style.css"></head>
<body><main class="container"><?php include __DIR__ . '/nav.php'; ?>
<section class="card"><h1>Bài 5.1 — Tìm kiếm và thay thế dữ liệu</h1>
<form method="post"><div class="form-grid">
<label for="site">Chọn website</label><select id="site" name="site"><?php foreach ($sites as $key => $site): ?><option value="<?= h($key) ?>" <?= $siteKey === $key ? 'selected' : '' ?>><?= h($site['label']) ?></option><?php endforeach; ?></select>
<label for="html_input">Hoặc dán HTML</label><textarea id="html_input" name="html_input" placeholder="Nếu điền HTML thì chương trình phân tích nội dung ở đây thay vì tải từ web."><?= h($pastedHtml) ?></textarea>
<label for="image_name">Tên hình ảnh</label><input type="text" id="image_name" name="image_name" value="<?= h($imageName) ?>" placeholder="Ví dụ: anh_san_pham-01.jpg">
<div></div><label class="small"><input type="checkbox" name="demo" value="1" <?= $isDemo ? 'checked' : '' ?>> Dùng dữ liệu mẫu nếu không dán HTML</label>
<div></div><div><button name="submit" type="submit" value="1">Phân tích dữ liệu</button></div>
</div></form>
<div class="note">Quy tắc tên ảnh: chỉ gồm chữ không dấu, số, dấu <code>_</code> hoặc <code>-</code>; đuôi <code>.jpg</code>, <code>.jpeg</code>, <code>.png</code>, <code>.gif</code>, <code>.webp</code>.</div>
</section>
<?php if ($submitted): ?>
<?php if ($imageName !== ''): ?><section class="card"><h2>5.1(c) — Kiểm tra tên hình ảnh</h2><div class="<?= $imageValid ? 'success' : 'error' ?>">Tên <code><?= h($imageName) ?></code> <?= $imageValid ? 'hợp lệ' : 'không hợp lệ' ?>.</div></section><?php endif; ?>
<section class="card"><h2>5.1(a,b) — Kết quả lọc nội dung website</h2>
<?php if ($error): ?><div class="error"><?= h($error) ?></div><?php else: ?>
<?php if ($isDemo && trim($pastedHtml) === ''): ?><div class="note">Đang dùng HTML minh họa, không phải dữ liệu trực tiếp.</div><?php endif; ?>
<p>Đọc được <strong><?= number_format(strlen($html)) ?> byte</strong> HTML.</p>
<h2>Liên kết (<?= count($links) ?>)</h2>
<?php if ($links): ?><table><tr><th>STT</th><th>URL</th></tr><?php foreach (array_slice($links, 0, 70) as $i => $url): ?><tr><td><?= $i+1 ?></td><td><a class="srclink" target="_blank" rel="noopener noreferrer" href="<?= h($url) ?>"><?= h($url) ?></a></td></tr><?php endforeach; ?></table><?php if (count($links)>70): ?><p class="small">Chỉ hiển thị 70 liên kết đầu tiên.</p><?php endif; ?><?php else: ?><p>Không tìm được liên kết.</p><?php endif; ?>
<h2>Email (<?= count($emails) ?>)</h2><pre><?= $emails ? h(implode("\n", $emails)) : 'Không tìm thấy.' ?></pre>
<h2>Số điện thoại (<?= count($phones) ?>)</h2><pre><?= $phones ? h(implode("\n", $phones)) : 'Không tìm thấy.' ?></pre>
<?php endif; ?></section><?php endif; ?>
</main></body></html>
