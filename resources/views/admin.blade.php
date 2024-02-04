<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Your+Font+Name&display=swap">
    <link rel="icon" type="image/png" href="{{ asset('img/log.png') }}">
    <link rel="stylesheet" href="{{ asset('css/sideoff.css') }}">

    <style>
        body {
            background-color: #EBF9FF;
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
            padding-top: 80px;
            padding-left: 40px;
            padding-right: 80px;
            padding-bottom: 80px;
            padding-top: -3%;
        }

        .listitem {
            padding: 40px;
            align-items: center;
            justify-content: center;
            background-color: #2693C9;
            border-radius: 10px;
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
            transition: transform 0.5s;
        }

        .img-container img:hover {
            transform: scale(1.1);
        }

        .fixed-size-img {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }

        @media (max-width: 768px) {
            .title {
                order: 0;
                flex-grow: 1;
                text-align: center;
            }

            .title,
            .title a {
                margin-right: 0 !important;
            }

            .title h1 {
                font-size: 1.5rem;
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

            .sidelist {
                padding: 20px;
            }

            .listitem2 {
                padding: 2% 2% 3%;
            }

            .social {
                display: none;
            }

            .item-wrapper {
                flex-direction: column;
            }

            .col-md-1 {
                width: 100%;
                margin-bottom: 15px;
            }

            .col-md-11 {
                width: 100%;
            }

            .img-container {
                text-align: center;
            }

            .img-container img {
                width: 100%;
                height: auto;
            }

            .d-flex.justify-content-between.align-items-center {
                flex-direction: column;
                align-items: flex-start;
            }

            .action-buttons {
                width: 100%;
                margin-top: 10px;
            }

            .item-date,
            .comment-count {
                margin-left: 0 !important;
                text-align: left;
                margin-top: 5px;
            }
        }

        .item-wrapper {
            border-radius: 10px;
            padding: 10px;
            transition: box-shadow 0.3s;
            background-color: #EBF9FF;
        }

        .item-wrapper:hover {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        }

        .item-title {
            color: #000000;
            margin-left: 6px;
        }

        .action-buttons {
            margin-top: 5px;
        }

        .item-name,
        .item-date {
            color: #000000;
            margin-left: 6px;
        }

        .action-icon {
            width: 25px;
            height: 25px;
            margin-right: -8px;
        }

        .edit-btn,
        .delete-btn {
            display: none;
        }

        .item-wrapper:hover .edit-btn,
        .item-wrapper:hover .delete-btn {
            display: inline-block;
        }
    </style>

    @include('partials._sideoff')
</head>

<body>
    <div class="sideoff">
        <!-- <div class="add">
            <a href="{{ route('item.create') }}" class="btn btn-primary rounded ml-5">Add News</a>
        </div> -->
        <div class="sidelist d-flex w-100">
            <div class="listitem col-md-12 col-xs-12">
                @foreach($data->reverse() as $index => $item)
                <div class="row g-0 item-wrapper" style="margin-bottom: 30px; align-items: center;">
                    <div class="col-md-1">
                        <a href="{{ route('item.detail', ['id' => $item->id, 'title' => $item->title]) }}">
                            <div class="img-container">
                                <img src="data:image/jpg;base64,{{ $item->photoUrl }}" class="img-fluid fixed-size-img" alt="img">
                            </div>
                        </a>
                    </div>
                    <div class="col-md-11">
                        <div class="card-body d-flex flex-column">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <a href="{{ route('item.detail', ['id' => $item->id, 'title' => $item->title]) }}">
                                    <h5 class="card-title item-title">{{ $item->title }}</h5>
                                </a>
                                <div class="d-flex action-buttons">
                                    <a href="{{ route('item.edit', ['id' => $item->id]) }}" class="btn edit-btn">
                                        <img src="{{ asset('img/edit.png') }}" alt="Update" class="action-icon">
                                    </a>
                                    <form action="{{ route('item.delete', ['id' => $item->id]) }}" method="POST" style="margin-left: 0.5rem;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn delete-btn">
                                            <img src="{{ asset('img/delete.png') }}" alt="Delete" class="action-icon">
                                        </button>
                                    </form>
                                    <p class="item-name" style="padding-top: 8px;">{{ $item->name }}</p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <p class="item-date">{{ $item->created_at->format('l, j F Y') }}</p>
                                <p class="comment-count" style="margin-left: auto;">
                                    {{ $item->comments()->count() }}
                                    <img src="{{ asset('img/comment.png') }}" alt="comment" class="action-icon" style="margin-left: 7px; margin-right: 18px">
                                    {{ Session::get('page_views_' . $item->id, 0) }}
                                    <img src="{{ asset('img/bar-graph.png') }}" alt="visitor" class="action-icon" style="margin-left: 5px; margin-right: 1px; margin-bottom: 5px;">
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="..." crossorigin="anonymous"></script>
</body>

</html>