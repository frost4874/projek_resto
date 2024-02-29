<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Aplikasi Kami</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url('restoran.jpg')no-repeat center center fixed; /* Ganti 'background.jpg' dengan nama file gambar background yang Anda inginkan */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
        .container {
            max-width: 960px;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8); /* Opacity untuk membuat latar belakang sedikit transparan */
            border-radius: 10px; /* Membuat sudut elemen container terlihat melengkung */
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.3); /* Menambahkan efek bayangan untuk memberi kesan mewah */
        }
        header {
            background-color: rgba(248, 249, 250, 0.9); /* Ubah opacity latar belakang header */
            padding: 20px 0;
            text-align: center;
        }
        header h1 {
            color: #333;
        }
        .about-section {
            padding: 50px 0;
            background-color: transparent; /* Ubah warna latar belakang menjadi transparan */
            text-align: center;
        }
        .about-section h2 {
            color: #333;
        }
        .about-section p {
            color: #666;
            margin-bottom: 20px;
            line-height: 1.6;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px;
            transition: background-color 0.3s ease; /* Tambahkan efek transisi saat hover */
        }
        .btn:hover {
            background-color: #0056b3;
        }
        footer {
            background-color: rgba(52, 58, 64, 0.9); /* Ubah opacity latar belakang footer */
            color: #fff;
            text-align: center;
            padding: 20px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <!-- Bagian Header -->
    <header>
        <h1>Tentang Aplikasi Kami</h1>
        <a href="{{ route('login') }}" class="btn">Login</a>
        <a href="{{ route('register') }}" class="btn">Daftar</a>
    </header>

    <!-- Bagian Konten About Us -->
    <section class="about-section">
        <div class="container">
            <h2>Selamat datang di aplikasi kami!</h2>
            <!-- Isi konten about us -->
            <p>
            Kami adalah tim yang berkomitmen untuk memberikan pengalaman kuliner yang istimewa bagi setiap pengguna kami. Dengan kombinasi antara kemewahan dan kenyamanan, kami hadir untuk memenuhi kebutuhan dan keinginan Anda dalam menemukan tempat makan yang sempurna.
            </p>
            <p>
            Kami mengerti bahwa setiap momen berharga, dan itulah mengapa kami selalu berusaha untuk menciptakan suasana yang tepat untuk Anda menikmati makanan lezat kami. Dari kenyamanan tempat duduk hingga pilihan menu yang beragam, setiap detail dirancang untuk memastikan pengalaman kuliner Anda menjadi tak terlupakan.
            </p>
            <p>
            Dengan layanan kami yang ramah dan profesional, kami mengundang Anda untuk menjelajahi berbagai restoran dan kafe yang tersedia di dalam aplikasi kami. Jadikan setiap kunjungan Anda sebagai petualangan kuliner yang menarik, di mana Anda dapat menikmati sajian istimewa dari berbagai masakan dunia.
            </p>
            <p>
            Terima kasih telah mempercayakan kami sebagai mitra kuliner Anda. Kami berharap dapat terus memberikan pengalaman yang memuaskan dan membuat Anda kembali lagi dan lagi.
            </p>
            <p>
            Selamat menikmati dan selamat bersantap di Restoran & Kafe Favorit Anda!
            </p>
            <a href="#" class="btn">Hubungi Kami</a>
        </div>
    </section>

    <!-- Bagian Footer -->
    <footer>
        <p>&copy; 2024</p>
    </footer>
</body>
</html>
