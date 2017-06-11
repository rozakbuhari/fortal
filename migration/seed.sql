# User Seeds
INSERT INTO `user` (`password`, `fullname`, `email`, `gender`, `created_at`)
VALUES ('admin', 'Administrator', 'admin@email.com', 1, NOW());

INSERT INTO `user` (`password`, `fullname`, `email`, `gender`, `created_at`)
VALUES ('citra', 'Ariyana Arcitra', 'arcitra@email.com', 2, NOW());

# Role Seeds
INSERT INTO `role` (`name`, `title`, `created_at`)
VALUES ('admin', 'Administrator', NOW());

INSERT INTO `role` (`name`, `title`, `created_at`)
VALUES ('basic', 'Anggota Perpustakaan', NOW());

# User Role Seeds
INSERT INTO `user_role` (`user_id`, `role_id`, `created_at`)
VALUES ('1', '1', NOW());

INSERT INTO `user_role` (`user_id`, `role_id`, `created_at`)
VALUES ('2', '2', NOW());

#Post Seeds
INSERT INTO `posts` (`title`, `content`, `author_id`, `category_id`, `created_at`)
VALUES ('16 Kapal Polair Banten Siap Patroli di Selat Sunda saat Arus Mudik', 'Cilegon - Polisi Udara dan Air (Polair) Polda Banten akan meningkatkan pengamanan di Selat Sunda selama musim mudik Lebaran 2017. Pengamanan itu berupa patroli rutin mengawal kapal-kapal yang hendak menyeberang ke Bakauheni.

Polair Polda Banten mengerahkan 120 personel untuk Operasi Ramadniya 2017. Hal itu untuk mengantisipasi hal-hal yang tidak diinginkan baik di laut maupun di atas kapal feri.

"Kita lebih mempersiapkan pengamanan lalu lintas saat di laut, kita lebih kepada pengamanannya, sebelum hari H nanti kita akan mengawal kapal-kapal ferry yang akan menyeberang dari Merak ke Bakauheni," kata Direktur Polair Polda Banten, Kombes Imam Thobroni kepada wartawan usai acara buka bersama Kapolda Banten di Markas Polair Polda Banten di Kota Cilegon, Selasa (6/6/2017).', 1, 1, NOW());

INSERT INTO `posts` (`title`, `content`, `author_id`,  `category_id`, `created_at`)
VALUES ('Kompetisi Kelestarian Bumi Digelar, Sampaikan Ide Terbaikmu', 'Jakarta - Penggundulan hutan menjadi salah satu faktor turunnya peringkat Indonesia di Climate Change Performance Index 2017. Padahal Indonesia mempunyai peran ganda dalam perubahan iklim, yaitu pihak yang terkena dampak dan mampu memberikan solusi.

United Nations Environment Programme (UNEP) atau Program Lingkungan PBB meluncurkan ''Young Champions of the Earth'', sebuah inisiatif baru yang bertujuan mendorong dan mendukung para pemuda-pemudi berusia 18 sampai 30 tahun yang memiliki gagasan cemerlang untuk menyelamatkan lingkungan. Setiap tahun, enam orang pemuda, satu dari masing-masing wilayah global PBB, akan dinobatkan sebagai ''Young Champions of the Earth''.

"Ada begitu banyak potensi di Indonesia untuk mengatasi perubahan iklim. Namun kami masih menghadapi berbagai kendala lingkungan. Oleh sebab itulah kami dari Covestro Indonesia sangat mendukung inisiatif UNEP ini," ungkap Managing Director PT Covestro Polymers Indonesia Lars Kesternich, melalui keterangan tertulisnya, Selasa (6/6/2017).', 2, 3, NOW());

INSERT INTO `posts` (`title`, `content`, `author_id`,  `category_id`, `created_at`)
VALUES ('Menyelinap ke Pesawat Lion Air, Pria Tak Bertiket Ditangkap', 'Jakarta - Seorang pria berinisial AF (40) yang tidak memiliki boarding pass menyelinap masuk ke dalam pesawat Lion Air dengan nomor penerbangan JT 384 tujuan Jakarta. AF menyelinap masuk ke pesawat di Bandara Internasional Kualanamu, Deli Serdang, Sumatera Utara.

Aksi itu dilakukan AF pada Minggu (4/6) lalu. Dari informasi sementara, warga Desa Bandar Setia, Kecamatan Percut Sei Tuan, itu berhasil melewati pemeriksaan di security checkpoint dengan cara menyelinap saat penumpang lainnya menggunakan boarding pass untuk melewati pintu barcode.

"AF berhasil mengelabui petugas keamanan dan selanjutnya berjalan menuju Gate 8 terminal keberangkatan domestik. AF berhasil masuk ke kabin pesawat setelah memanfaatkan kelengahan petugas boarding Lion Air yang sedang sibuk memeriksa bagasi penumpang lainnya," kata Kepala Bagian Kerja Sama dan Humas Perhubungan Udara Kementerian Perhubungan Agoes Soebagio lewat keterangan tertulis yang diterima detikcom, Selasa (6/6/2017).', 1, 1, NOW());

# Category Seeds
INSERT INTO `categories` (`name`, `slug`, `created_at`)
VALUES ('Kesehatan', 'kesehatan', NOW());

INSERT INTO `categories` (`name`, `slug`, `created_at`)
VALUES ('Olahraga', 'olahraga', NOW());

INSERT INTO `categories` (`name`, `slug`, `created_at`)
VALUES ('Teknologi', 'teknologi', NOW());

INSERT INTO `categories` (`name`, `slug`, `created_at`)
VALUES ('Otomotif', 'otomotif', NOW());

INSERT INTO `categories` (`name`, `slug`, `created_at`)
VALUES ('Ekonomi', 'ekonomi', NOW());

# Security Question
INSERT INTO `security_questions` (`name`, `created_at`)
VALUES ('Siapa nama guru SD anda?', NOW());

INSERT INTO `security_questions` (`name`, `created_at`)
VALUES ('Apa nama hewan peliharaan anda?', NOW());

INSERT INTO `security_questions` (`name`, `created_at`)
VALUES ('Siapa nama mantan anda yang ke-7?', NOW());

INSERT INTO `security_questions` (`name`, `created_at`)
VALUES ('Kapan anda dilahirkan?', NOW());

# Ads Seeds
INSERT INTO `ads` (`image`,`text`, `expired`, `created_at`)
VALUES ('baju.png', 'Baju Koko', CURDATE() + INTERVAL 3 DAY, NOW());

INSERT INTO `ads` (`image`,`text`, `expired`, `created_at`)
VALUES ('gajah-duduk.jpg', 'Gajah Duduk', CURDATE() + INTERVAL 3 DAY, NOW());

INSERT INTO `ads` (`image`,`text`, `expired`, `created_at`)
VALUES ('sirup.jpg', 'Sirup', SUBDATE(CURRENT_DATE(), 1), SUBDATE(CURRENT_DATE(), 2));

INSERT INTO `ads` (`image`,`text`, `expired`, `created_at`)
VALUES ('tahu-bulat.jpg', 'Tahu Bulat', CURDATE() + INTERVAL 3 DAY, NOW());

# Comments Seeds
INSERT INTO `comments` (`author_id`, `post_id`, `content`, `created_at`)
VALUES (1, 1, 'Hello, Ini Komentar Admin.', NOW());

INSERT INTO `comments` (`author_id`, `post_id`, `content`, `created_at`)
VALUES (2, 1, 'Hello, Ini Komentar Citra.', NOW());

INSERT INTO `comments` (`author_id`, `post_id`, `content`, `created_at`)
VALUES (1, 1, 'Hello, Ini Komentar Admin.', NOW());
