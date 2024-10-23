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
        .star-rating {
            direction: rtl;
            display: inline-block;
            padding: 20px;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            color: #bbb;
            font-size: 30px;
            padding: 0;
            cursor: pointer;
            -webkit-transition: all .3s ease-in-out;
            transition: all .3s ease-in-out;
        }

        .star-rating label:hover,
        .star-rating label:hover~label,
        .star-rating input:checked~label {
            color: #f2b600;
        }

        .badge.bg-gold {
            background-color: #FFD700;
            color: #000;
        }

        .badge.bg-silver {
            background-color: #C0C0C0;
            color: #000;
        }

        .badge.bg-bronze {
            background-color: #CD7F32;
            color: #fff;
        }
    </style>
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
    <div class="listitem2 rating-section" style="padding-top: 2%; padding-bottom: 3%;">
        <h2>Rating & Review</h2>

        <!-- Display Average Rating -->
        @if ($item && $item->ratings->count() > 0)
            <div class="average-rating mb-4">
                <h4>Rating Rata-rata: {{ number_format($item->ratings->avg('rating'), 1) }}/5</h4>
                <div class="rating-stats">
                    <div class="progress-container">
                        @for ($i = 5; $i >= 1; $i--)
                            <div class="rating-bar d-flex align-items-center mb-1">
                                <span class="me-2">{{ $i }} ★</span>
                                <div class="progress flex-grow-1" style="height: 20px;">
                                    @php
                                        $percentage =
                                            $item->ratings->count() > 0
                                                ? ($item->ratings->where('rating', $i)->count() /
                                                        $item->ratings->count()) *
                                                    100
                                                : 0;
                                    @endphp
                                    <div class="progress-bar bg-warning" role="progressbar"
                                        style="width: {{ $percentage }}%" aria-valuenow="{{ $percentage }}"
                                        aria-valuemin="0" aria-valuemax="100">
                                        {{ number_format($percentage, 1) }}%
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </div>
        @endif

        <!-- Rating Form -->
        @auth
            @if (!$item->ratings->where('user_id', auth()->id())->first())
                <form action="{{ route('rating.store') }}" method="POST" class="rating-form bg-light p-4 rounded">
                    @csrf
                    <input type="hidden" name="item_id" value="{{ $item->id }}">

                    <div class="mb-3">
                        <label class="form-label">Rating Anda</label>
                        <div class="star-rating">
                            @for ($i = 5; $i >= 1; $i--)
                                <input type="radio" id="star{{ $i }}" name="rating"
                                    value="{{ $i }}" required>
                                <label for="star{{ $i }}">★</label>
                            @endfor
                        </div>
                        @error('rating')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="review" class="form-label">Review Anda</label>
                        <textarea name="review" id="review" class="form-control @error('review') is-invalid @enderror" rows="3"
                            required>{{ old('review') }}</textarea>
                        @error('review')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Kategori</label>
                        <select name="category" id="category" class="form-select @error('category') is-invalid @enderror"
                            required>
                            <option value="">Pilih kategori</option>
                            <option value="UI/UX">UI/UX</option>
                            <option value="Konten">Konten</option>
                            <option value="Teknis">Teknis</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                        @error('category')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tags" class="form-label">Tags (pisahkan dengan koma)</label>
                        <input type="text" name="tags" id="tags"
                            class="form-control @error('tags') is-invalid @enderror"
                            placeholder="contoh: #bagus, #informatif, #detail">
                        @error('tags')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Kirim Rating & Review</button>
                </form>
            @else
                <div class="alert alert-info">Anda sudah memberikan rating untuk berita ini.</div>
            @endif
        @else
            <p>Silakan <a href="{{ route('login') }}">login</a> untuk memberikan rating dan review.</p>
        @endauth

        <!-- Display Reviews -->
        <div class="reviews-section mt-4">
            <h3>Review Terbaru</h3>
            @if ($item && $item->ratings->count() > 0)
                @foreach ($item->ratings->sortByDesc('created_at') as $rating)
                    <div class="review-card mb-3 p-3 border rounded">
                        <div class="review-header d-flex justify-content-between align-items-center">
                            <div>
                                <strong>{{ $rating->user->name }}</strong>
                                <span class="stars ms-2">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $rating->rating)
                                            <span class="text-warning">★</span>
                                        @else
                                            <span class="text-secondary">★</span>
                                        @endif
                                    @endfor
                                </span>
                                <span class="badge bg-{{ $rating->badge }} ms-2">{{ $rating->status }}</span>
                            </div>
                            <small class="text-muted">{{ $rating->created_at->diffForHumans() }}</small>
                        </div>
                        <div class="review-content mt-2">
                            <p class="mb-1">{{ $rating->review }}</p>
                            <div class="review-meta">
                                <small class="text-muted">Kategori: {{ $rating->category }}</small>
                                @if ($rating->tags)
                                    <div class="tags mt-1">
                                        @foreach (explode(',', $rating->tags) as $tag)
                                            <span class="badge bg-secondary">{{ trim($tag) }}</span>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>Belum ada review. Jadilah yang pertama memberikan review!</p>
            @endif
        </div>
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
