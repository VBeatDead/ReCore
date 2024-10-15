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

    @include('partials._navbar')
</head>

<body>
    <div class="d-flex flex-column flex-md-row w-100">
        <div class="content col-md-9 col-xs-12">
            <div class="detailnews">
                <div class="listitem2" , style="padding-top: 2%;">
                    @if ($item)
                        <h1>{{ $item->title }}</h1>
                    @else
                        <p>No item found.</p>
                    @endif
                </div>
                <div class="listitem2">
                    @if ($item)
                        <p>{{ $item->name }}</p>
                        <p style="margin-top: -15px;">{{ $item->created_at->format('l, j F Y') }}</p>
                    @else
                        <p>No item found.</p>
                    @endif
                </div>
                <div style="text-align: center;">
                    @if ($item)
                        <div class="img-container">
                            <img src="data:image/jpg;base64,{{ $item->photoUrl }}" class="img-fluid" alt="img"
                                style="width: 900px; height: 550px; object-fit: cover;">
                        </div>
                    @else
                        <p>No item found.</p>
                    @endif
                </div>
                <div class="listitem2" , style="padding-bottom: 2%; text-align: justify;">
                    @if ($item)
                        <p style="padding-top: 3%;">{!! htmlspecialchars_decode($item->description) !!}</p>
                    @else
                        <p>No item found.</p>
                    @endif
                </div>
            </div>
        </div>
        @include('partials._side')
    </div>
    <div class="listitem2" style="padding-top: 2%; padding-bottom: 3%;">
        <h2>Comments</h2>
        @if ($item && $item->comments)
            @if ($item->comments->count() > 0)
                <ul class="comment-list">
                    @foreach ($item->comments as $comment)
                        <li class="comment-item">
                            <div class="comment-header">
                                <span class="user-name">{{ $comment->user->name }}</span>
                                <span class="comment-date">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                            <div class="comment-content">{{ $comment->content }}</div>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>No comments yet. Be the first to comment!</p>
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
                    <textarea name="content" class="form-control @error('content') is-invalid @enderror" required>{{ old('content') }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        @else
            <p>Please <a href="{{ route('login') }}">login</a> to leave a comment.</p>
        @endauth
    </div>
    </div>
    @include('partials._footer')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="..." crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @endif

        @if (session('error'))
            toastr.error("{{ session('error') }}");
        @endif
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
