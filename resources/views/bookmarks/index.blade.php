<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>My Bookmarks</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <style>
        .notes-modal .modal-content {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
        }

        .notes-modal .modal-header {
            background: linear-gradient(135deg, #6B73FF 0%, #000DFF 100%);
            padding: 1.5rem;
            border: none;
        }

        .notes-modal .modal-title {
            color: white;
            font-size: 1.3rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .notes-modal .btn-close {
            background-color: white;
            opacity: 0.8;
            transition: 0.3s;
        }

        .notes-modal .btn-close:hover {
            opacity: 1;
            transform: rotate(90deg);
        }

        .notes-modal .modal-body {
            padding: 2rem;
            background: #f8f9ff;
        }

        .notes-modal textarea {
            border: 2px solid #e1e5ff;
            border-radius: 15px;
            padding: 1rem;
            font-size: 1rem;
            line-height: 1.6;
            transition: all 0.3s;
            resize: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.04);
            background: white;
        }

        .notes-modal textarea:focus {
            border-color: #6B73FF;
            box-shadow: 0 8px 15px rgba(107, 115, 255, 0.1);
            outline: none;
        }

        .notes-modal .modal-footer {
            padding: 1.5rem;
            border: none;
            background: white;
            gap: 15px;
        }

        .notes-modal .btn {
            padding: 0.8rem 1.5rem;
            border-radius: 12px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .notes-modal .btn-cancel {
            background: #f1f3f9;
            color: #666;
            border: none;
        }

        .notes-modal .btn-cancel:hover {
            background: #e4e7f2;
            transform: translateY(-2px);
        }

        .notes-modal .btn-save {
            background: linear-gradient(135deg, #6B73FF 0%, #000DFF 100%);
            border: none;
            color: white;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .notes-modal .btn-save:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(107, 115, 255, 0.3);
        }

        .notes-modal .btn i {
            font-size: 0.9rem;
        }

        .character-count {
            font-size: 0.85rem;
            color: #666;
            text-align: right;
            margin-top: 0.5rem;
        }

        /* Animation classes */
        .slide-up {
            animation: slideUp 0.4s ease-out;
        }

        @keyframes slideUp {
            from {
                transform: translateY(20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .walls {
            margin-top: 8px;
        }

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

        .card {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transform: translateY(-2px);
        }

        .page-title {
            color: #333;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #eee;
        }

        .btn-outline-primary:hover {
            transform: translateY(-1px);
        }

        .btn-outline-danger:hover {
            transform: translateY(-1px);
        }

        .alert-info {
            border-left: 4px solid #17a2b8;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    @include('partials._navbar')

    <!-- Main Content -->
    <div class="container py-4">
        <h1 class="page-title">
            <i class="fas fa-bookmark text-primary"></i> My Bookmarks
        </h1>

        @if ($bookmarks->count() > 0)
            <div class="row">
                @foreach ($bookmarks as $bookmark)
                    <div class="col-md-6 mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="{{ route('detail.show', ['id' => $bookmark->item->id, 'title' => $bookmark->item->title]) }}"
                                        class="text-decoration-none">
                                        {{ $bookmark->item->title }}
                                    </a>
                                </h5>
                                <p class="card-text text-muted">
                                    <i class="far fa-clock"></i>
                                    Bookmarked {{ $bookmark->created_at->diffForHumans() }}
                                </p>

                                @if ($bookmark->notes)
                                    <div class="notes-section mt-3">
                                        <h6><i class="fas fa-sticky-note text-warning"></i> Notes:</h6>
                                        <p class="mb-0">{{ $bookmark->notes }}</p>
                                    </div>
                                @endif

                                <div class="mt-3 d-flex gap-2">
                                    <button class="btn btn-sm btn-outline-primary"
                                        onclick="editNotes({{ $bookmark->item->id }})">
                                        <i class="fas fa-edit"></i> Edit Notes
                                    </button>
                                    <button class="btn btn-sm btn-outline-danger"
                                        onclick="removeBookmark({{ $bookmark->item->id }})">
                                        <i class="fas fa-trash-alt"></i> Remove
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="d-flex justify-content-center mt-4">
                {{ $bookmarks->links() }}
            </div>
        @else
            <div class="alert alert-info d-flex align-items-center">
                <i class="fas fa-info-circle me-2"></i>
                You haven't bookmarked any articles yet.
            </div>
        @endif
    </div>

    <div class="modal fade notes-modal" id="editNotesModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content slide-up shadow-lg">
                <div class="modal-header">
                    <h5 class="modal-title">
                        <i class="fas fa-feather-alt"></i>
                        Update Your Notes
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <textarea class="form-control" id="editBookmarkNotes" rows="5"
                        placeholder="Share your thoughts, ideas, and reflections here..." maxlength="500" onkeyup="countChars(this)">
                    </textarea>
                    <div class="character-count">
                        <span id="charCount">0</span>/500 characters
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-cancel" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i> Cancel
                    </button>
                    <button type="button" class="btn btn-save" onclick="saveNotes()">
                        <i class="fas fa-check"></i>
                        Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>

    <script>
        let currentBookmarkId = null;

        function editNotes(itemId) {
            currentBookmarkId = itemId;
            fetch(`/bookmark/${itemId}/notes`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('editBookmarkNotes').value = data.notes || '';
                    $('#editNotesModal').modal('show');
                })
                .catch(error => {
                    console.error('Error fetching notes:', error);
                    alert('Failed to fetch notes.');
                });

        }


        function saveNotes() {
            const notes = document.getElementById('editBookmarkNotes').value;

            fetch(`/bookmark/${currentBookmarkId}/notes`, {
                    method: 'PATCH',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: JSON.stringify({
                        notes
                    })
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Failed to update notes');
                    }
                    return response.json();
                })
                .then(data => {
                    bootstrap.Modal.getInstance(document.getElementById('editNotesModal')).hide();
                    window.location.reload();
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Failed to save notes. Please try again.');
                });
        }

        function removeBookmark(itemId) {
            if (confirm('Are you sure you want to remove this bookmark?')) {
                fetch(`/bookmark/${itemId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.status === 'removed') {
                            window.location.reload();
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Failed to remove bookmark. Please try again.');
                    });
            }
        }
    </script>
</body>

</html>
