LAB 06 PHP - BAI TAP 4.1, 4.2, 4.3, NANG CAO 5.1, 5.2
=========================================================

1. Cai dat va chay tren XAMPP
- Giai nen thu muc lab06 vao C:\xampp\htdocs\lab06\
- Bat Apache trong XAMPP.
- Truy cap: http://localhost/lab06/
- Co the chay rieng tung file: http://localhost/lab06/lab06_1.php ...

2. Danh sach file
- lab06_1.php    : 4.1 - SHA1, MD5(SHA1), textarea, strip_tags, nl2br,
                   them \ truoc dau nhay don khi submit va stripslashes tren PHP.
- lab06_2.php    : File goc 06_2 (khong thuoc noi dung can sua).
- lab06_3.php    : 4.2 - Regex username, email, password, phone, ngay sinh.
- lab06_4_3.php  : 4.3 - file_get_contents, preg_match_all, print_r, bang tin.
- lab06_5_1.php  : 5.1 - Loc link, email, phone, validate ten file anh.
- lab06_5_2.php  : 5.2 - Quet tieu de Xa hoi tu 3 bao.
- index.php      : Trang chu dieu huong cac bai.
- nav.php, style.css, lab06_helpers.php: File dung chung.

3. Cau hinh 4.3 va 5.2
- Mo php.ini cua Apache trong XAMPP, tim va dat: allow_url_fopen = On
- Khoi dong lai Apache.
- Co mang Internet va SSL CA hop le (khong tat xac minh HTTPS).
- Thethao.vnexpress.net trong de cu co the thay bang https://vnexpress.net/the-thao.
- News.zing.vn trong de cu co the thay bang https://znews.vn/xa-hoi.html.
- Website ben ngoai co the doi duong dan, HTML, chong bot; chay thanh cong
  khong duoc dam bao. Neu khong tai duoc, thu che do Du lieu mau.

4. Goi y kiem tra nhanh
- 4.1: username=nguyenvan, mat khau=Abcdef12 (2 lan), ho ten=Nguyen Van A,
       thong tin=<b>Xin chao</b>\nToi la O'Brien (nhap xuong dong that).
       Ket qua: HTML duoc bo, xuong dong la <br>, dau \ duoc them va xoa.
- 4.2: username=nguyenvan, password=Abcdef12, email=a@gmail.com,
       ngay sinh=31/12/2004, phone=0912345678 -> Hop le.
       Thu password=abc123, date=31/02/2004, phone=0912abc -> Bao loi.
- 4.3 va 5.2: Tick Du lieu mau truoc, bam nut, de thu khong can Internet.
- 5.1: Tick Du lieu mau, nhap ten anh=anh_san_pham-01.jpg.

5. Luu y
- SHA1/MD5 chi de dap ung noi dung de bai, khong phu hop luu mat khau
  trong ung dung that. Nen dung password_hash()/password_verify().
- Biet truoc HTML website la can thiet; Regex khong bao dam dung khi thay doi.
