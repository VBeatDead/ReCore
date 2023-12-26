<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Game</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Your+Font+Name&display=swap">
    <!-- <link rel="stylesheet" href=".\css\app.css"> -->

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
            height: auto;
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
    </style>

    <nav class="navbar navbar-expand-lg nav-custom-bg w-100">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav d-flex justify-content-start col-md-4 col-xs-12">
                    <a class="nav-link active" style="margin-right: 5px; color: #EBF9FF;" href="#">HOME</a>
                    <a class="nav-link active" style="margin-right: 5px; color: #EBF9FF" href="#">ABOUT US</a>
                    <a class="nav-link active" style="margin-right: 5px; color: #EBF9FF" href="#">CONTACT</a>
                </div>
                <div class="title d-flex justify-content-center col-md-4 col-xs-12">
                    <h1>Game News</h1>
                </div>
                <div class="title d-flex justify-content-end col-md-4 col-xs-12">
                    <img class="rectangle" src="../img/icon-profile-circle.png" width="40px" data-bs-toggle="modal" data-bs-target="#loginModal" />
                </div>
                <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="loginModalLabel" style="color: #000000;">Login</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="mb-3">
                                        <label for="email" class="form-label" style="color: #000000;">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label" style="color: #000000;">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</head>

<body>
    <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="sizeslide carousel-inner">
            @foreach($data as $index => $item)
            @if($index < 3) <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                <img src="data:image/jpg;base64,{{ base64_encode($item->photoUrl) }}" class="d-block w-100" alt="img">
                <div class="desc carousel-caption d-none d-md-block">
                    <h5>{{ $item->title }}</h5>
                    @php
                    $descriptionWords = explode(' ', $item->description);
                    $limitedDescription = implode(' ', array_slice($descriptionWords, 0, 10));

                    // Check if there are more words in the description
                    if (count($descriptionWords) > 10) {
                    $limitedDescription .= ' .....';
                    }
                    @endphp
                    <p>{{ $limitedDescription }}</p>
                </div>
        </div>
        @else
        @break
        @endif
        @endforeach

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
            @if($index < 7) <div class="row g-0" style="margin-bottom: 30px;">
                <div class="col-md-4">
                    <img width="95%" src="data:image/jpg;base64,{{ base64_encode($item->photoUrl) }}" class="img-fluid" alt="img">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title" style="color: #EBF9FF;">{{ $item->title }}</h5>
                        <p class="card-text" style="color: #EBF9FF;"><small>{{ $item->name }}</small></p>
                        <p class="card-text" style="padding-bottom: 10px; color: #EBF9FF;">{{ $item->description }}</p>
                    </div>
                </div>
        </div>
        @else
        @break
        @endif
        @endforeach

    </div>
    <div class="sidebar col-md-3 col-xs-12" style="margin-left: 80px;">
        <h4 style="margin-left: 20px;">Popular</h4>
        <div class="itempopular" style="width: 18rem;">
            <ul class="list-item">
                @foreach($data as $item)
                <li class="list-group-item">{{ $item->title }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    </div>
    <footer class="text-center bg-body-tertiary">
        <div class="hak d-flex col-md-12 col-xs-12 p-30">
            <div class="logok col-md-6 col-xs-12">
                <img src="../img/log.png" alt="img" style="width: 94px;">
                <p>Info Game</p>
            </div>
            <div class="kontak col-md-3 col-xs-12" style="text-align: justify; padding-left: 8%;">
                <p>Kontak</p>
                <p> <img src="../img/hp.png" alt="logo-hendphone" width="18" height="18" style="margin-right: 10px;">+628317786428</p>
                <p> <img src="../img/mail.png" alt="logo-email" width="18" height="18" style="margin-right: 10px;">vallov@infgame.com</p>
            </div>
            <div class="social col-md-3 col-xs-12" style="text-align: justify;">
                <p>Scoial Media</p>
                <p>Ikuti jejaring sosial untuk mendapatkan informasi terbaru</p>
            </div>
        </div>
        <div class="hak2 text-center p-3 col-md-12 col-xs-12">
            Hak Cipta © 2014 - 2023. Semua hak dilindungi oleh InfoGame
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="..." crossorigin="anonymous"></script>
</body>

</html>