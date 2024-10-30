<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game News</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Your+Font+Name&display=swap">
    <link rel="icon" type="image/png" href="{{ asset('img/log.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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

        /* Add these styles to your CSS file */
        .share-buttons .btn {
            margin-right: 0.5rem;
        }

        .bookmark-btn {
            transition: all 0.3s ease;
        }

        .bookmark-btn:hover {
            transform: scale(1.05);
        }

        .bookmark-btn i {
            margin-right: 0.5rem;
        }

        .notes-section {
            background-color: #f8f9fa;
            padding: 1rem;
            border-radius: 0.25rem;
        }

        .modal-dialog {
            max-width: 500px;
        }

        #bookmarkNotes {
            min-height: 100px;
        }

        .share-buttons button,
        .bookmark-section button {
            transition: all 0.3s ease;
        }

        .share-buttons button:hover,
        .bookmark-section button:hover {
            transform: scale(1.05);
        }

        .bookmark-btn:hover {
            background-color: #2693C9;
            color: #fff;
        }

        .bookmark-panel {
            animation: slideDown 0.2s ease-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .bookmark-btn:hover {
            background-color: rgba(38, 147, 201, 0.1) !important;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #2693C9;
        }

        /* Add overlay when panel is open */
        .bookmark-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
            z-index: 999;
        }
    </style>
    @include('partials._navbar')
</head>

<body>
    <div class="d-flex flex-column flex-md-row w-100">
        <div class="content col-md-9 col-xs-12">
            <div class="detailnews">
                <div class="listitem2"
                    style="padding-top: 2%; display: flex; justify-content: space-between; align-items: center;">
                    <h1 style="margin: 0;">{{ $item ? $item->title : 'No item found.' }}</h1>
                    <div class="bookmark-section">
                        @auth
                            <div class="bookmark-wrapper position-relative">
                                <!-- Bookmark Button -->
                                <button type="button" class="btn bookmark-btn d-flex align-items-center gap-2"
                                    onclick="toggleBookmarkPanel(this)" data-item-id="{{ $item->id }}"
                                    data-bookmarked="{{ $item->isBookmarkedBy(auth()->user()) }}"
                                    data-csrf="{{ csrf_token() }}"
                                    style="background-color: transparent; border: 2px solid #2693C9; border-radius: 25px; padding: 10px 15px; transition: all 0.3s ease;">
                                    <i class="fa{{ $item->isBookmarkedBy(auth()->user()) ? 's' : 'r' }} fa-bookmark"
                                        style="color: #2693C9;"></i>
                                    <span style="color: #2693C9;">
                                        {{ $item->isBookmarkedBy(auth()->user()) ? 'Bookmarked' : 'Bookmark' }}
                                    </span>
                                </button>

                                <!-- Bookmark Panel -->
                                <div id="bookmarkPanel-{{ $item->id }}" class="bookmark-panel"
                                    style="display: none; position: absolute; top: 100%; right: 0; margin-top: 10px; width: 300px; background: white; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); z-index: 1000;">
                                    <div class="p-3">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h6 class="m-0 fw-bold">Add to Bookmarks</h6>
                                            <button type="button" class="btn-close"
                                                onclick="closeBookmarkPanel({{ $item->id }})">
                                            </button>
                                        </div>
                                        <div class="mb-3">
                                            <textarea id="bookmarkNotes-{{ $item->id }}" class="form-control border-0 bg-light" rows="3"
                                                placeholder="Add note (optional)" style="resize: none; border-radius: 8px;"></textarea>
                                        </div>
                                        <div class="d-flex gap-2">
                                            <button type="button" class="btn btn-light flex-grow-1"
                                                onclick="closeBookmarkPanel({{ $item->id }})"
                                                style="border-radius: 20px;">
                                                Cancel
                                            </button>
                                            <button type="button" class="btn btn-primary flex-grow-1"
                                                onclick="saveBookmark({{ $item->id }})" style="border-radius: 20px;">
                                                Save
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <a href="#" class="btn btn-outline-primary"
                                style="border-radius: 25px; padding: 10px 15px;" data-bs-toggle="modal"
                                data-bs-target="#loginModal">
                                <i class="fas fa-user me-2"></i> Login to Save
                            </a>
                        @endauth
                    </div>
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
                <div class="listitem2" style="padding-bottom: 2%; text-align: justify;">
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
                        <select name="category" id="category"
                            class="form-select @error('category') is-invalid @enderror" required>
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

        function toggleBookmarkPanel(button) {
            const itemId = button.dataset.itemId;
            const isBookmarked = button.dataset.bookmarked === 'true';

            if (isBookmarked) {
                // If already bookmarked, remove it
                removeBookmark(button);
            } else {
                // Show bookmark panel
                const panel = document.getElementById(`bookmarkPanel-${itemId}`);
                panel.style.display = 'block';

                // Add overlay
                const overlay = document.createElement('div');
                overlay.className = 'bookmark-overlay';
                overlay.onclick = () => closeBookmarkPanel(itemId);
                document.body.appendChild(overlay);

                // Focus textarea
                document.getElementById(`bookmarkNotes-${itemId}`).focus();
            }
        }

        function closeBookmarkPanel(itemId) {
            const panel = document.getElementById(`bookmarkPanel-${itemId}`);
            panel.style.display = 'none';

            // Remove overlay
            const overlay = document.querySelector('.bookmark-overlay');
            if (overlay) {
                overlay.remove();
            }

            // Clear textarea
            document.getElementById(`bookmarkNotes-${itemId}`).value = '';
        }

        function saveBookmark(itemId) {
            const button = document.querySelector(`[data-item-id="${itemId}"]`);
            const notes = document.getElementById(`bookmarkNotes-${itemId}`).value;
            const csrfToken = button.dataset.csrf;

            fetch(`/bookmark/${itemId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        notes
                    })
                })
                .then(response => response.json())
                .then(data => {
                    // Update button state
                    button.dataset.bookmarked = 'true';
                    const icon = button.querySelector('i');
                    const text = button.querySelector('span');

                    icon.className = 'fas fa-bookmark';
                    text.textContent = 'Bookmarked';

                    // Close panel
                    closeBookmarkPanel(itemId);

                    // Show success toast
                    showToast('Bookmark saved successfully!');
                })
                .catch(error => {
                    console.error('Error:', error);
                    showToast('Failed to save bookmark. Please try again.', 'error');
                });
        }

        function removeBookmark(button) {
            const itemId = button.dataset.itemId;
            const csrfToken = button.dataset.csrf;

            fetch(`/bookmark/${itemId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    // Update button state
                    button.dataset.bookmarked = 'false';
                    const icon = button.querySelector('i');
                    const text = button.querySelector('span');

                    icon.className = 'far fa-bookmark';
                    text.textContent = 'Bookmark';

                    showToast('Bookmark removed successfully!');
                })
                .catch(error => {
                    console.error('Error:', error);
                    showToast('Failed to remove bookmark. Please try again.', 'error');
                });
        }

        // Toast notification function
        function showToast(message, type = 'success') {
            const toast = document.createElement('div');
            toast.className = `toast-notification ${type}`;
            toast.style.cssText = `
        position: fixed;
        bottom: 20px;
        right: 20px;
        padding: 12px 24px;
        background: ${type === 'success' ? '#4CAF50' : '#F44336'};
        color: white;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        z-index: 1000;
        animation: slideIn 0.3s ease-out;
    `;

            toast.textContent = message;
            document.body.appendChild(toast);

            setTimeout(() => {
                toast.style.animation = 'slideOut 0.3s ease-out';
                setTimeout(() => toast.remove(), 300);
            }, 3000);
        }

        // Add CSS for toast animations
        const style = document.createElement('style');
        style.textContent = `
    @keyframes slideIn {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes slideOut {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }
`;
        document.head.appendChild(style);

        function toggleBookmark(button) {
            const itemId = button.dataset.itemId;
            const isBookmarked = button.dataset.bookmarked === 'true';
            const csrfToken = button.dataset.csrf;
            const notes = document.getElementById('bookmarkNotes')?.value || '';

            if (!csrfToken) {
                console.error('CSRF token not found');
                alert('Security token not found. Please refresh the page.');
                return;
            }

            fetch(`/bookmark/${itemId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        notes
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Success:', data);

                    // Update button state
                    button.dataset.bookmarked = !isBookmarked;
                    const icon = button.querySelector('i');
                    const text = button.querySelector('span');

                    if (data.status === 'added') {
                        icon.className = 'fas fa-bookmark';
                        text.textContent = 'Bookmarked';
                    } else {
                        icon.className = 'far fa-bookmark';
                        text.textContent = 'Bookmark';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Failed to toggle bookmark. Please try again.');
                });
        }

        function saveBookmarkNotes() {
            const itemId = document.querySelector('.bookmark-btn').dataset.itemId;
            const notes = document.getElementById('bookmarkNotes').value;

            fetch(`/bookmark/${itemId}/notes`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        notes
                    })
                })
                .then(response => response.json())
                .then(data => {
                    const modal = bootstrap.Modal.getInstance(document.getElementById('bookmarkNotesModal'));
                    modal.hide();
                });
        }
    </script>
</body>

</html>
