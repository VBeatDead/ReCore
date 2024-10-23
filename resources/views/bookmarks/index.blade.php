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

    <style>
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

<body class="bg-light">
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
                                    {{-- <button class="btn btn-sm btn-outline-primary"
                                        onclick="editNotes({{ $bookmark->item->id }})">
                                        <i class="fas fa-edit"></i> Edit Notes
                                    </button> --}}
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

    {{-- <!-- Notes Modal -->
    <div class="modal fade" id="editNotesModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-edit"></i> Edit Bookmark Notes</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <textarea class="form-control" id="editBookmarkNotes" rows="4" placeholder="Add your notes here..."></textarea>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <i class="fas fa-times"></i> Cancel
                    </button>
                    <button type="button" class="btn btn-primary" onclick="saveNotes()">
                        <i class="fas fa-save"></i> Save Notes
                    </button>
                </div>
            </div>
        </div>
    </div> --}}

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let currentBookmarkId = null;

        function editNotes(itemId) {
            currentBookmarkId = itemId;
            const modal = new bootstrap.Modal(document.getElementById('editNotesModal'));

            // Get current notes
            fetch(`/bookmark/${itemId}/notes`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('editBookmarkNotes').value = data.notes || '';
                    modal.show();
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
                .then(response => response.json())
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
