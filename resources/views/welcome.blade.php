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
            height: 50px;
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
                            $descriptionWords = explode(' ', $item->description);
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
                        <img width="95%" src="data:image/jpg;base64,{{ $item->photoUrl }}" class="img-fluid" alt="img">
                    </a>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <a href="{{ route('item.detail', ['id' => $item->id, 'title' => $item->title]) }}">
                            <h5 class="card-title" style="color: #EBF9FF;">{{ $item->title }}</h5>
                            <p class="card-text" style="color: #EBF9FF;"><small>{{ $item->name }}</small></p>
                            <p class="card-text" style="padding-bottom: 10px; color: #EBF9FF;">
                                {{ \Illuminate\Support\Str::limit($item->description, 255) }}
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
        @if(Auth::check() && Auth::user()->role == 'user')
        <div class="add">
            <a href="{{ route('item.create') }}" class="btn btn-primary rounded ml-5">Add News</a>
        </div>
        @endif
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
</body>

</html>