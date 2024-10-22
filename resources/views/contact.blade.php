<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Your+Font+Name&display=swap">
    <link rel="icon" type="image/png" href="{{ asset('img/log.png') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        body {
            background-color: #EBF9FF;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
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
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            text-align: center;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin-bottom: 15px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
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

            .ab {
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
        <h1>Contact Form</h1>
        <p>If you want to contact us for something important:</p>
        <ul>
            <li>
                <p>Ahmad Tiova Ian Avola <a
                        href="mailto:tiovavallov@webmail.umm.ac.id">(tiovavallov@webmail.umm.ac.id)</a></p>
            </li>
            <li>
                <p>Brian Yudhistira <a
                        href="mailto:brianyudhistira1@webmail.umm.ac.id">(brianyudhistira1@webmail.umm.ac.id)</a></p>
            </li>
            <li>
                <p>Muhammad Afif Raihan <a
                        href="mailto:afifraihan59@webmail.umm.ac.id">(afifraihan59@webmail.umm.ac.id)</a></p>
            </li>
            <li>
                <p>P. Nuarastu Rangga W: <a href="mailto:rangga@webmail.umm.ac.id">rangga@webmail.umm.ac.id</a></p>
            </li>
        </ul>
    </div>
    </div>
    @include('partials._footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="..." crossorigin="anonymous"></script>
    <script>
        console.clear();

        const loginBtn = document.getElementById('login');
        const signupBtn = document.getElementById('signup');

        loginBtn.addEventListener('click', (e) => {
            let parent = e.target.parentNode.parentNode;
            Array.from(e.target.parentNode.parentNode.classList).find((element) => {
                if (element !== "slide-up") {
                    parent.classList.add('slide-up')
                } else {
                    signupBtn.parentNode.classList.add('slide-up')
                    parent.classList.remove('slide-up')
                }
            });
        });

        signupBtn.addEventListener('click', (e) => {
            let parent = e.target.parentNode;
            Array.from(e.target.parentNode.classList).find((element) => {
                if (element !== "slide-up") {
                    parent.classList.add('slide-up')
                } else {
                    loginBtn.parentNode.parentNode.classList.add('slide-up')
                    parent.classList.remove('slide-up')
                }
            });
        });
    </script>
</body>

</html>
