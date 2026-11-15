<?php
require_once __DIR__ . '/lab06_helpers.php';
$source = 'https://vnexpress.net/the-thao'; // Đường dẫn mới thay cho thethao.vnexpress.net trong đề cũ.
$run = isset($_GET['run']);
$isDemo = isset($_GET['demo']);
$html = null;
$error = null;
$matches = [];
$rows = [];
$pattern = '~<(div|h3)\b(?=[^>]*\bclass\s*=\s*(["\'])[^"\']*(?:title_news|title-news)[^"\']*\2)[^>]*>.*?</\1>~isu';
if ($run) {
    if ($isDemo) {
        $html = '<!doctype html><html><head><title>Trang HTML minh họa</title></head><body>'
            . '<div class="title_news"><a href="https://vnexpress.net/the-thao">Tiêu đề thể thao minh họa thứ nhất</a></div>'
            . '<h3 class="title-news"><a href="/the-thao">Tiêu đề thể thao minh họa thứ hai</a></h3>'
            . '</body></html>';
    } else {
        [$html, $error] = getRemoteHtml($source);
    }
    if ($html !== null) {
        // Dùng preg_match_all theo yêu cầu 4.3(d).
        preg_match_all($pattern, $html, $matches);
        foreach ($matches[0] as $block) {
            $article = getAnchorFromHtml($block, $source);
            if ($article) {
                $rows[$article['url']] = $article;
            }
            if (count($rows) >= 25) break;
        }
        $rows = array_values($rows);
    }
}
?>
<!doctype html><html lang="vi"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>4.3 - Đọc HTML từ VnExpress</title><link rel="stylesheet" href="style.css"></head>
<body><main class="container"><?php include __DIR__ . '/nav.php'; ?>
<section class="card"><h1>Bài 4.3 — Lấy và phân tích HTML từ website khác</h1>
<p><strong>Website:</strong> <a href="<?= h($source) ?>" target="_blank" rel="noopener noreferrer"><?= h($source) ?></a></p>
<p>Dùng <code>file_get_contents()</code> để đọc HTML, <code>preg_match_all()</code> để lấy khối có class <code>title_news</code> hoặc <code>title-news</code>, rồi in mảng bằng <code>print_r()</code> và trích bảng tin.</p>
<form method="get" class="choices">
<label><input type="checkbox" name="demo" value="1" <?= $isDemo ? 'checked' : '' ?>> Dùng dữ liệu mẫu (không cần Internet)</label>
<button type="submit" name="run" value="1">Đọc HTML và phân tích</button>
</form></section>
<?php if ($run): ?>
<section class="card"><h2>4.3(b,c) — HTML lấy được</h2>
<?php if ($error): ?><div class="error"><?= h($error) ?></div><?php else: ?>
<?php if ($isDemo): ?><div class="note">Đang dùng HTML minh họa, không phải tin tức trực tiếp.</div><?php endif; ?>
<p>Dung lượng HTML: <strong><?= number_format(strlen($html)) ?> byte</strong>.</p>
<details><summary>Xem nội dung HTML gốc (đã chuyển thành văn bản để xem an toàn)</summary><pre><?= h($html) ?></pre></details>
</section>
<section class="card"><h2>4.3(d) — Kết quả preg_match_all và print_r</h2>
<p><strong>Pattern:</strong> <code><?= h($pattern) ?></code></p>
<p>Số khối phù hợp: <strong><?= count($matches[0]) ?></strong></p>
<pre><?= h(print_r(array_slice($matches[0], 0, 15), true)) ?></pre>
<?php if (!$matches[0]): ?><div class="note">Không có class title_news/title-news trong HTML nhận được. Website có thể đã đổi cấu trúc hoặc chỉ trả HTML rút gọn.</div><?php endif; ?>
</section>
<section class="card"><h2>4.3(e) — Bảng các tiêu đề đã trích</h2>
<?php if ($rows): ?><table><thead><tr><th>STT</th><th>Tiêu đề</th><th>Liên kết</th></tr></thead><tbody>
<?php foreach ($rows as $i => $row): ?><tr><td><?= $i + 1 ?></td><td><?= h($row['title']) ?></td><td><a class="srclink" href="<?= h($row['url']) ?>" target="_blank" rel="noopener noreferrer">Mở bài viết</a></td></tr><?php endforeach; ?>
</tbody></table><?php else: ?><p>Chưa có tiêu đề phù hợp để hiển thị.</p><?php endif; ?>
</section>
<?php endif; ?>
<?php endif; ?>
</main></body></html>
