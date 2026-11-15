<?php
require_once __DIR__ . '/lab06_helpers.php';
// Dùng URL chuyên mục hiện nay tương ứng các tên trang trong đề gốc.
$sites = [
    'znews' => ['name' => 'Znews (trước đây news.zing.vn)', 'url' => 'https://znews.vn/xa-hoi.html'],
    'dantri' => ['name' => 'Dân trí', 'url' => 'https://dantri.com.vn/xa-hoi.htm'],
    'vietnamnet' => ['name' => 'VietNamNet - Thời sự', 'url' => 'https://vietnamnet.vn/thoi-su'],
];
$run = isset($_GET['run']);
$isDemo = isset($_GET['demo']);
$results = [];
if ($run) {
    foreach ($sites as $key => $site) {
        if ($isDemo) {
            // Đây là dữ liệu minh họa rõ ràng để kiểm tra Regex khi offline.
            $html = '<html><body>'
                . '<h3 class="article-title"><a href="https://' . parse_url($site['url'], PHP_URL_HOST) . '/bai-viet-minh-hoa-123456.html">Bản tin xã hội minh họa số một của ' . h($site['name']) . '</a></h3>'
                . '<h2><a href="https://' . parse_url($site['url'], PHP_URL_HOST) . '/bai-viet-minh-hoa-234567.html">Bản tin xã hội minh họa số hai của ' . h($site['name']) . '</a></h2>'
                . '</body></html>';
            $error = null;
        } else {
            [$html, $error] = getRemoteHtml($site['url']);
        }
        $results[$key] = [
            'site' => $site,
            'error' => $error,
            'titles' => $html === null ? [] : extractNewsHeadlines($html, $site['url'], 15),
        ];
    }
}
?>
<!doctype html><html lang="vi"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>5.2 - Quét tin mục Xã hội</title><link rel="stylesheet" href="style.css"></head>
<body><main class="container"><?php include __DIR__ . '/nav.php'; ?>
<section class="card"><h1>Bài 5.2 — Quét tiêu đề các tin mục Xã hội</h1>
<p>Đọc HTML qua <code>file_get_contents()</code>, tìm các khối tiêu đề bằng <code>preg_match_all()</code>, lấy liên kết và in ra trình duyệt.</p>
<form method="get" class="choices">
<label><input type="checkbox" name="demo" value="1" <?= $isDemo ? 'checked' : '' ?>> Dữ liệu mẫu ngoại tuyến</label>
<button type="submit" name="run" value="1">Quét 3 trang báo</button>
</form><p class="small">Tin trực tiếp phụ thuộc kết nối Internet và cấu trúc HTML của từng trang. Nếu không có tiêu đề, kiểm tra lại pattern theo HTML thực tế.</p></section>
<?php if ($run): ?>
<?php if ($isDemo): ?><div class="note">Kết quả dưới đây là tiêu đề minh họa, không phải tin tức trực tiếp.</div><?php endif; ?>
<?php foreach ($results as $result): ?>
<section class="card"><h2><?= h($result['site']['name']) ?></h2>
<p><a target="_blank" rel="noopener noreferrer" href="<?= h($result['site']['url']) ?>"><?= h($result['site']['url']) ?></a></p>
<?php if ($result['error']): ?><div class="error"><?= h($result['error']) ?></div>
<?php elseif (!$result['titles']): ?><div class="note">Đã tải HTML nhưng chưa phát hiện tiêu đề tương ứng. Trang có thể đổi class hoặc chặn quét tin.</div>
<?php else: ?><table><thead><tr><th>STT</th><th>Tiêu đề tin</th></tr></thead><tbody>
<?php foreach ($result['titles'] as $i => $item): ?><tr><td><?= $i+1 ?></td><td><a href="<?= h($item['url']) ?>" target="_blank" rel="noopener noreferrer"><?= h($item['title']) ?></a></td></tr><?php endforeach; ?>
</tbody></table><?php endif; ?>
</section>
<?php endforeach; ?>
<?php endif; ?>
</main></body></html>
