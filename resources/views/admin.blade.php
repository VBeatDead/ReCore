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

        .img-container {
            overflow: hidden;
            width: 95%;
            margin: auto;
        }

        .img-container img {
            width: 100%;
            transition: transform 0.5s;
        }

        .img-container img:hover {
            transform: scale(1.1);
        }
    </style>

    @include('partials._navbar')
</head>

<body>
    <div class="add">
        <a href="{{ route('item.create') }}" class="btn btn-primary rounded ml-5">Add News</a>
    </div>
    <div class="sidelist d-flex w-100">
        <div class="listitem col-md-12 col-xs-12">
            @foreach($data->reverse() as $index => $item)
            <div class="row g-0" style="margin-bottom: 30px;">
                <div class="col-md-4">
                    <a href="{{ route('item.detail', ['id' => $item->id, 'title' => $item->title]) }}">
                        <div class="img-container">
                            <img src="data:image/jpg;base64,{{ $item->photoUrl }}" class="img-fluid" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <a href="{{ route('item.detail', ['id' => $item->id, 'title' => $item->title]) }}">
                            <h5 class="card-title" style="color: #EBF9FF;">{{ $item->title }}</h5>
                        </a>
                        <p class="card-text" style="color: #EBF9FF;"><small>{{ $item->name }}</small></p>
                        <p class="card-text" style="padding-bottom: 10px; color: #EBF9FF;">
                            {{ \Illuminate\Support\Str::limit($item->description, 255) }}
                        </p>
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('item.edit', ['id' => $item->id]) }}" class="btn btn-primary">Update</a>
                            <form action="{{ route('item.delete', ['id' => $item->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger ml-2">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    </div>
    @include('partials._footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="..." crossorigin="anonymous"></script>
</body>

</html>