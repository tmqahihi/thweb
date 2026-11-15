<?php
// Các hàm dùng chung cho bài thực hành Lab 06.
function h($value): string
{
    return htmlspecialchars((string)$value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function postText(string $field): string
{
    $value = $_POST[$field] ?? '';
    return is_string($value) ? $value : '';
}

function getRemoteHtml(string $url): array
{
    // Chỉ gọi hàm này với các URL tin tức cố định (hoặc danh sách cho phép).
    if (!filter_var($url, FILTER_VALIDATE_URL) || !in_array(parse_url($url, PHP_URL_SCHEME), ['http', 'https'], true)) {
        return [null, 'Địa chỉ website không hợp lệ.'];
    }
    if (!filter_var(ini_get('allow_url_fopen'), FILTER_VALIDATE_BOOLEAN)) {
        return [null, 'Cần bật allow_url_fopen = On trong php.ini và khởi động lại Apache.'];
    }
    $context = stream_context_create([
        'http' => [
            'method' => 'GET',
            'header' => "User-Agent: Mozilla/5.0 (compatible; Lab06PHP/1.0)\r\nAccept: text/html,application/xhtml+xml\r\n",
            'timeout' => 12,
            'follow_location' => 1,
            'max_redirects' => 5,
            'ignore_errors' => false,
        ],
        'ssl' => ['verify_peer' => true, 'verify_peer_name' => true],
    ]);
    // Giới hạn tải 2 MB HTML tránh đọc trang quá lớn.
    $html = @file_get_contents($url, false, $context, 0, 2 * 1024 * 1024);
    if ($html === false || trim($html) === '') {
        return [null, 'Không tải được HTML (mạng, HTTPS, trang chặn truy cập hoặc đổi đường dẫn).'];
    }
    return [$html, null];
}

function normalizeUrl(string $href, string $base): ?string
{
    $href = trim(html_entity_decode($href, ENT_QUOTES | ENT_HTML5, 'UTF-8'));
    if ($href === '' || preg_match('~^(?:javascript:|mailto:|tel:|#)~i', $href)) {
        return null;
    }
    if (preg_match('~^https?://~i', $href)) {
        $url = $href;
    } else {
        $parts = parse_url($base);
        if (!isset($parts['scheme'], $parts['host'])) {
            return null;
        }
        $origin = $parts['scheme'] . '://' . $parts['host'];
        if (str_starts_with($href, '//')) {
            $url = $parts['scheme'] . ':' . $href;
        } elseif (str_starts_with($href, '/')) {
            $url = $origin . $href;
        } elseif (str_starts_with($href, '?')) {
            $url = $origin . ($parts['path'] ?? '/') . $href;
        } else {
            $folder = dirname($parts['path'] ?? '/');
            $url = $origin . rtrim($folder, '/') . '/' . $href;
        }
    }
    return filter_var($url, FILTER_VALIDATE_URL) ? $url : null;
}

function cleanHeading(string $html): string
{
    $text = html_entity_decode(strip_tags($html), ENT_QUOTES | ENT_HTML5, 'UTF-8');
    return trim(preg_replace('/\s+/u', ' ', $text) ?? $text);
}

function getAnchorFromHtml(string $html, string $base): ?array
{
    // Đọc href bằng Regex; hỗ trợ thuộc tính nháy đơn hoặc nháy kép.
    if (!preg_match('~<a\b[^>]*\bhref\s*=\s*(["\'])(.*?)\1[^>]*>(.*?)</a>~isu', $html, $m)) {
        return null;
    }
    $link = normalizeUrl($m[2], $base);
    $title = cleanHeading($m[3]);
    if (!$link || $title === '') {
        return null;
    }
    return ['title' => $title, 'url' => $link];
}

function extractNewsHeadlines(string $html, string $base, int $limit = 15): array
{
    // 5.2: dùng preg_match_all lọc khối tiêu đề và tiếp tục trích <a> bên trong.
    preg_match_all('~<(h2|h3|h4|p)\b[^>]*>.*?</\1>~isu', $html, $matched);
    $result = [];
    $baseHost = strtolower((string)parse_url($base, PHP_URL_HOST));
    foreach ($matched[0] as $block) {
        $row = getAnchorFromHtml($block, $base);
        if (!$row) {
            continue;
        }
        $host = strtolower((string)parse_url($row['url'], PHP_URL_HOST));
        $path = (string)parse_url($row['url'], PHP_URL_PATH);
        // Bài viết phải thuộc cùng website và thường kết thúc bằng .htm/.html.
        if ($host !== $baseHost || !preg_match('~\.(?:html|htm)$~i', $path)) {
            continue;
        }
        // Bỏ đường dẫn đến chuyên mục / trang chủ nếu lọt vào mảng.
        if (preg_match('~^/(?:xa-hoi|thoi-su|tin-tuc|index)(?:\.html|\.htm)?$~i', $path)) {
            continue;
        }
        if (strlen($row['title']) < 18) {
            continue;
        }
        $result[$row['url']] = $row;
        if (count($result) >= $limit) {
            break;
        }
    }
    return array_values($result);
}
