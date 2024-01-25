<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Your+Font+Name&display=swap">
    <link rel="icon" type="image/png" href="{{ asset('img/log.png') }}">

    <style>
        body {
            background-color: #EBF9FF;
        }

        nav {
            color: white;
            display: flex;
            justify-content: center;
            background-color: #2693C9;
        }

        nav a {
            text-decoration: #EBF9FF;
            color: #EBF9FF;
        }

        a {
            text-decoration: none;
            color: #000000;
        }

        .sizeslide {
            height: auto;
        }

        .carousel-item {
            position: relative;
        }

        .carousel-item::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: linear-gradient(180deg, rgba(0, 0, 0, 0.3) 0%, rgba(0, 0, 0, 0.6) 100%);
            z-index: 1;
        }

        .carousel-item img {
            width: 100%;
            height: 700px;
            object-fit: cover;
            z-index: 0;
        }

        .desc {
            position: absolute;
            top: 80%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            z-index: 2;
            text-align: center;
        }

        .sidelist {
            padding-left: 80px;
            padding-right: 80px;
            padding-bottom: 80px;
            padding-top: -3%;
        }

        .listitem {
            padding: 40px;
            align-items: center;
            justify-content: center;
            background-color: #2693C9;
        }

        .itempopular .list-group-item {
            padding-bottom: 15px;
            border-top: 1px solid #000000;
            position: relative;
        }

        .list-group-item::before {
            content: "• ";
            position: absolute;
            left: -20px;
        }

        .hak {
            padding: 40px;
            color: #EBF9FF;
            background-color: #386FA4;
        }

        .logok {
            display: flex;
            padding-left: 8%;
            align-items: center;
        }

        .logok img {
            width: 94px;
            margin-right: 10px;
        }

        .logok p {
            color: #EBF9FF;
            font-size: 50px;
            margin-left: 20px;
            text-align: center;
            font-weight: bold;
        }

        .hak2 {
            color: #EBF9FF;
            background-color: #2693C9;
        }

        .add {
            justify-content: center;
            text-align: center;
            padding: 3%;
        }

        .ab {
            padding-top: 3%;
            padding-left: 30%;
            padding-right: 30%;
            padding-bottom: 3%;
            display: flexbox;
            justify-content: center;
        }

        @media (max-width: 768px) {
            .navbar-nav {
                flex-grow: 1;
            }

            .navbar-toggler {
                order: -1;
            }

            .title {
                order: 0;
                flex-grow: 1;
                text-align: center;
            }

            .navbar-nav,
            .title,
            .title a {
                margin-right: 0 !important;
            }

            .title h1 {
                font-size: 1.5rem;
            }

            .navbar-collapse {
                flex-basis: 100%;
            }

            .navbar-collapse.show {
                display: flex;
            }

            .hak {
                flex-direction: column;
                align-items: center;
            }

            .kontak,
            .social {
                text-align: center;
                padding-left: 0;
                margin-top: 20px;
            }

            .logok,
            .kontak,
            .social {
                width: 100%;
            }

            .content,
            .sidebar {
                width: 100%;
                padding: 0;
                margin: 0;
            }

            .sidebar {
                padding-top: 0;
            }

            .ab{
                padding: 5%;
            }

            .social {
                display: none;
            }
        }
    </style>

    @include('partials._navbar')
</head>

<body>
    <div class="ab">
        <h1 style="text-align: center;">Disclamer</h1>
        <div>
            <h1 style="text-align: center;">Penggunaan Website Ini Hanya Untuk Tugas Pribadi</h1>
            <p style="text-align: justify;">Seluruh konten yang terdapat di website ini dibuat semata-mata untuk memenuhi tugas pribadi saya dalam pembelajaran Laravel. Saya dengan tegas menyatakan bahwa konten-konten yang ada di dalamnya tidak dimaksudkan untuk tujuan komersial, dan saya tidak memiliki niat untuk mengklaim kepemilikan atas materi yang bukan hasil karya saya.</p>

            <ol style="text-align: justify;">
                <li><strong>Konten dari Sumber Eksternal:</strong> Sebagian besar konten, seperti teks dan gambar, diambil dari sumber-sumber eksternal sebagai referensi dalam rangka pembelajaran. Sumber informasi tersebut memiliki hak cipta dan kepemilikan masing-masing.</li>

                <li><strong>Konten Berlisensi:</strong> Beberapa konten mungkin diambil dari sumber yang memiliki lisensi tertentu. Saya telah berupaya sebaik mungkin untuk mematuhi ketentuan lisensi tersebut dan memberikan kredit yang sesuai. Jika ada kelalaian, harap beri tahu saya agar saya dapat segera mengatasinya.</li>

                <li><strong>Keterbatasan Tanggung Jawab:</strong> Saya tidak bertanggung jawab atas penggunaan yang salah atau ilegal atas konten yang disediakan di website ini. Saya juga tidak bertanggung jawab atas kerugian atau kerusakan yang mungkin timbul akibat penggunaan informasi dari website ini.</li>

                <li><strong>Konten Pribadi:</strong> Semua pandangan dan pendapat yang terdapat di website ini merupakan pandangan pribadi saya dan tidak mencerminkan pandangan lembaga atau individu lainnya.</li>

                <li><strong>Penggunaan Kode dan Script:</strong> Kode dan script yang disediakan di website ini dimaksudkan untuk keperluan pembelajaran saja. Saya menyarankan agar Anda tidak menggunakan atau mengimplementasikan kode tersebut tanpa pemahaman mendalam dan pertimbangan keamanan.</li>
            </ol>

            <p style="text-align: justify;">Dengan mengakses dan menggunakan website ini, Anda setuju untuk memahami dan menerima kondisi-kondisi yang tercantum dalam disclaimer ini. Saya berhak untuk mengubah atau memperbarui disclaimer ini tanpa pemberitahuan sebelumnya.</p>
        </div>
    </div>
    </div>
    @include('partials._footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="..." crossorigin="anonymous"></script>
</body>

</html>