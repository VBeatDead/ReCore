<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Your+Font+Name&display=swap">

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

        .listitem2 {
            height: 100%;
            width: 100%;
            padding-left: 10%;
            padding-right: 10%;
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

    @include('partials._navbar')
</head>

<body>
    <div class="detailnews">
        <div class="listitem2" , style="padding-top: 2%;">
            @if($item)
            <h1>{{ $item->title }}</h1>
            @else
            <p>No item found.</p>
            @endif
        </div>
        <div class="listitem2">
            @if($item)
            <p>{{ $item->name }}</p>
            <p style="margin-top: -15px;">{{ $item->created_at->format('l, j F Y') }}</p>
            @else
            <p>No item found.</p>
            @endif
        </div>
        <div style="text-align: center;">
            @if($item)
            <img width="95%" src="data:image/jpg;base64,{{ $item->photoUrl }}" class="img-fluid" alt="img" style="width: 80%; height: auto;">
            @else
            <p>No item found.</p>
            @endif
        </div>
        <div class="listitem2" , style="padding-bottom: 2%; text-align: justify;">
            @if($item)
            <p style="padding-top: 3%;">{!! nl2br(e($item->description)) !!}</p>
            @else
            <p>No item found.</p>
            @endif
        </div>
    </div>
    <div class="listitem2" style="padding-top: 2%; padding-bottom: 3%;">
        <h2>Comments</h2>
        @if($item && $item->comments)
        @if($item->comments->count() > 0)
        <ul>
            @foreach($item->comments as $comment)
            <li>{{ $comment->user->name }}: {{ $comment->content }}</li>
            @endforeach
        </ul>
        @else
        <p>No comments yet.</p>
        @endif
        @else
        <p>No item found.</p>
        @endif
        @auth
        <form action="{{ route('comment.store') }}" method="POST">
            @csrf
            <input type="hidden" name="item_id" value="{{ $item->id }}">
            <div class="mb-3">
                <label for="content" class="form-label">Leave a comment:</label>
                <textarea name="content" class="form-control" required style="width: 30%;"></textarea>
            </div>
            <div class="mb-3 d-flex justify-content-end" style="width: 30%;">
                <button type="submit" class="btn btn-primary justify-content-end">Submit</button>
            </div>
        </form>
        @else
        <p>Please <a href="{{ route('login') }}">login</a> to leave a comment.</p>
        @endauth
    </div>
    </div>
    @include('partials._footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="..." crossorigin="anonymous"></script>
</body>

</html>