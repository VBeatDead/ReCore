<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Temukan berita terkini, ulasan game, panduan, dan informasi lengkap seputar dunia permainan video di situs kami. Dapatkan update terbaru mengenai game populer, teknologi gaming, dan acara esports. Jelajahi artikel-artikel menarik tentang gameplay, strategi, dan tren terkini dalam industri game. Sambut dunia game dengan pengetahuan yang mendalam hanya di situs info game kami.">
    <meta name="google-site-verification" content="idVH59Q3pfURpY0-Z__TljzYiSB7wjtBso9C__Uar7g" />
    <title>Inpo Game - Temukan Info Game Terbaru</title>
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
            padding: 80px;
        }

        .listitem {
            height: 80%;
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
            padding-left: 4%;
        }

        .img-zoomin {
            transition: 0.5s;
        }

        .img-zoomin:hover {
            transform: scale(1.03);
        }

        .itempopular {
            width: 18rem;
        }

        .list-item {
            list-style: none;
            padding: 0;
        }

        .list-group-item {
            height: 30px;
            overflow: hidden;
            transition: height 0.5s ease;
            position: relative;
            margin-bottom: 10px;
        }

        .list-group-item img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .list-group-item:hover {
            height: 150px;
        }

        .list-group-item:hover img {
            opacity: 1;
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

            .sidebar {
                margin-left: 0;
                width: 100%;
                margin-top: 20px;
                padding-left: 0;
                padding-right: 0;
            }

            .sidelist {
                flex-direction: column;
            }

            .hak {
                flex-direction: column;
                align-items: center;
            }

            .kontak,
            .social {
                text-align: center;
                justify-content: center;
                align-items: center;
                padding-left: 0;
                margin-top: 20px;
            }

            .logok,
            .kontak,
            .social {
                width: 100%;
            }

            .listitem {
                height: 100%;
                align-items: center;
                justify-content: center;
                background-color: #2693C9;
            }

            .sidelist {
                padding: 20px;
            }

            .sidebar,
            .social {
                display: none;
            }
        }

        @media (max-width: 1300px) {
            .sidebar {
                display: none;
            }

            .sidelist {
                padding: 20px;
            }

            .listitem.col-md-9 {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }

        .fixed-size-img {
            width: 380px;
            height: 230px;
            object-fit: cover;
        }

        .modal-content {
            background: transparent;
            box-shadow: none;
            border: none;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        .form-structor {
            background-color: transparent;
            width: 100%;
            max-width: 400px;
            padding: 20px;
        }


        .form-structor {
            background-color: #222;
            border-radius: 15px;
            height: 550px;
            width: 350px;
            position: relative;
            overflow: hidden;

            &::after {
                content: '';
                opacity: .8;
                position: absolute;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                background-repeat: no-repeat;
                background-position: left bottom;
                background-size: 500px;
                background-image: url("{{ asset('img/ga.png') }}");
            }

            .signup {
                position: absolute;
                top: 50%;
                left: 50%;
                -webkit-transform: translate(-50%, -50%);
                width: 65%;
                z-index: 5;
                -webkit-transition: all .3s ease;


                &.slide-up {
                    top: 5%;
                    -webkit-transform: translate(-50%, 0%);
                    -webkit-transition: all .3s ease;
                }

                &.slide-up .form-holder,
                &.slide-up .submit-btn {
                    opacity: 0;
                    visibility: hidden;
                }

                &.slide-up .form-title {
                    font-size: 1.3em;
                    cursor: pointer;
                }

                &.slide-up .form-title span {
                    margin-right: 5px;
                    opacity: 1;
                    visibility: visible;
                    -webkit-transition: all .3s ease;
                }

                .form-title {
                    color: #fff;
                    font-size: 1.7em;
                    text-align: center;

                    span {
                        color: rgba(0, 0, 0, 0.4);
                        opacity: 0;
                        visibility: hidden;
                        -webkit-transition: all .3s ease;
                    }
                }

                .form-holder {
                    border-radius: 15px;
                    background-color: #fff;
                    overflow: hidden;
                    margin-top: 50px;
                    opacity: 1;
                    visibility: visible;
                    -webkit-transition: all .3s ease;

                    .input {
                        border: 0;
                        outline: none;
                        box-shadow: none;
                        display: block;
                        height: 45px;
                        line-height: 30px;
                        padding: 8px 15px;
                        border-bottom: 1px solid #eee;
                        width: 100%;
                        font-size: 14px;

                        &:last-child {
                            border-bottom: 0;
                        }

                        &::-webkit-input-placeholder {
                            color: rgba(0, 0, 0, 0.4);
                        }
                    }
                }

                .submit-btn {
                    background-color: rgba(0, 0, 0, 0.4);
                    color: rgba(256, 256, 256, 0.7);
                    border: 0;
                    border-radius: 15px;
                    display: block;
                    margin: 15px auto;
                    padding: 15px 45px;
                    width: 100%;
                    font-size: 13px;
                    font-weight: bold;
                    cursor: pointer;
                    opacity: 1;
                    visibility: visible;
                    -webkit-transition: all .3s ease;

                    &:hover {
                        transition: all .3s ease;
                        background-color: rgba(0, 0, 0, 0.8);
                    }
                }
            }

            .login {
                position: absolute;
                top: 20%;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #fff;
                z-index: 5;
                -webkit-transition: all .3s ease;

                &::before {
                    content: '';
                    position: absolute;
                    left: 50%;
                    top: -20px;
                    -webkit-transform: translate(-50%, 0);
                    background-color: #fff;
                    width: 200%;
                    height: 250px;
                    border-radius: 50%;
                    z-index: 4;
                    -webkit-transition: all .3s ease;
                }

                .center {
                    position: absolute;
                    top: calc(50% - 10%);
                    left: 50%;
                    -webkit-transform: translate(-50%, -50%);
                    width: 65%;
                    z-index: 5;
                    -webkit-transition: all .3s ease;

                    .form-title {
                        color: #000;
                        font-size: 1.7em;
                        text-align: center;

                        span {
                            color: rgba(0, 0, 0, 0.4);
                            opacity: 0;
                            visibility: hidden;
                            -webkit-transition: all .3s ease;
                        }
                    }

                    .form-holder {
                        border-radius: 15px;
                        background-color: #fff;
                        border: 1px solid #bebebe;
                        overflow: hidden;
                        margin-top: 50px;
                        opacity: 1;
                        visibility: visible;
                        -webkit-transition: all .3s ease;

                        .input {
                            border: 0;
                            outline: none;
                            box-shadow: none;
                            display: block;
                            height: 45px;
                            line-height: 30px;
                            padding: 8px 15px;
                            border-bottom: 1px solid #bebebe;
                            width: 100%;
                            font-size: 14px;

                            &:last-child {
                                border-bottom: 0;
                            }

                            &::-webkit-input-placeholder {
                                color: rgba(0, 0, 0, 0.4);
                            }
                        }
                    }

                    .submit-btn {
                        background-color: #6B92A4;
                        color: rgba(256, 256, 256, 0.7);
                        border: 0;
                        border-radius: 15px;
                        display: block;
                        margin: 15px auto;
                        padding: 15px 45px;
                        width: 100%;
                        font-size: 13px;
                        font-weight: bold;
                        cursor: pointer;
                        opacity: 1;
                        visibility: visible;
                        -webkit-transition: all .3s ease;

                        &:hover {
                            transition: all .3s ease;
                            background-color: rgba(0, 0, 0, 0.8);
                        }
                    }
                }

                &.slide-up {
                    top: 90%;
                    -webkit-transition: all .3s ease;
                }

                &.slide-up .center {
                    top: 10%;
                    -webkit-transform: translate(-50%, 0%);
                    -webkit-transition: all .3s ease;
                }

                &.slide-up .form-holder,
                &.slide-up .submit-btn {
                    opacity: 0;
                    visibility: hidden;
                    -webkit-transition: all .3s ease;
                }

                &.slide-up .form-title {
                    font-size: 1.2em;
                    margin: 0;
                    padding: 0;
                    cursor: pointer;
                    -webkit-transition: all .3s ease;
                }

                &.slide-up .form-title span {
                    margin-right: 5px;
                    opacity: 1;
                    visibility: visible;
                    -webkit-transition: all .3s ease;
                }
            }
        }
    </style>

    @include('partials._navbar')
</head>

<body>
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div id="autoSlideCarousel" class="sizeslide carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach($data->shuffle()->take(3) as $index => $item)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <img width="95%" src="data:image/jpg;base64,{{ $item->photoUrl }}" class="img-fluid" alt="img">
                    <a href="{{ route('item.detail', ['id' => $item->id, 'title' => $item->title]) }}">
                        <div class="desc carousel-caption d-none d-md-block">
                            <h5>{{ $item->title }}</h5>
                            @php
                            $limitedDescription = strip_tags(htmlspecialchars_decode($item->description));
                            $descriptionWords = explode(' ', $limitedDescription);
                            $limitedDescription = implode(' ', array_slice($descriptionWords, 0, 10));
                            if (count($descriptionWords) > 10) {
                            $limitedDescription .= ' .....';
                            }
                            @endphp
                            <p>{{ $limitedDescription }}</p>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#autoSlideCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#autoSlideCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <div class="sidelist d-flex w-100">
        <div class="listitem col-md-9 col-xs-12">
            @foreach($data as $index => $item)
            @if($index < 7) <div class="row g-0 img-zoomin" style="margin-bottom: 30px;">
                <div class="col-md-4">
                    <a href="{{ route('item.detail', ['id' => $item->id, 'title' => $item->title]) }}">
                        <img src="data:image/jpg;base64,{{ $item->photoUrl }}" class="img-fluid rounded fixed-size-img" style="padding-right: 3%;" alt="img">
                    </a>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <a href="{{ route('item.detail', ['id' => $item->id, 'title' => $item->title]) }}">
                            <h5 class="card-title" style="color: #EBF9FF;">{{ $item->title }}</h5>
                            <p class="card-text" style="color: #EBF9FF;"><small>{{ $item->name }}</small></p>
                            <p class="card-text" style="padding-bottom: 10px; color: #EBF9FF;">
                                {{ \Illuminate\Support\Str::limit(strip_tags($item->description), 255) }}
                            </p>
                        </a>
                    </div>
                </div>
        </div>
        @else
        @break
        @endif
        @endforeach
        <div class="card-footer">
            {{ $data->links('pagination::bootstrap-4') }}
        </div>
    </div>
    <div class="sidebar col-md-3 col-xs-12" style="margin-left: 80px;">
        <h4 style="margin-left: 20px;">Popular</h4>
        <div class="itempopular">
            <ul class="list-item">
                @foreach($page->take(15) as $item)
                <li class="list-group-item">
                    <a href="{{ route('item.detail', ['id' => $item->id, 'title' => $item->title]) }}">
                        {{ $item->title }}
                        <img src="data:image/jpg;base64,{{ $item->photoUrl }}" alt="Item Image">
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
        <!-- @if(Auth::check() && Auth::user()->role == 'user')
        <div class="add">
            <a href="{{ route('item.create') }}" class="btn btn-primary rounded ml-5">Add News</a>
        </div>
        @endif -->
    </div>
    </div>
    @include('partials._footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="..." crossorigin="anonymous"></script>
    <script>
        $('#autoSlideCarousel').carousel({
            interval: 1000
        });
    </script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-H9NTB97Z3X"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-H9NTB97Z3X');
    </script>
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