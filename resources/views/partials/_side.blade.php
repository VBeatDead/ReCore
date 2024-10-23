<style>
    .share-buttons button,
    .bookmark-section button {
        transition: all 0.3s ease;
    }

    .share-buttons button:hover,
    .bookmark-section button:hover {
        transform: scale(1.05);
    }
</style>
<div class="sidebar col-md-3 col-xs-12" style="padding-right: 2%;">
    <h2 style="margin-bottom: -30px; font-size: 30px; padding-top: 30%;">Recent News</h2>
    <div class="container py-5">
        <div class="row g-4 position-relative">
            <div class="col-12">
                <div class="rounded overflow-hidden position-relative img-zoomin">
                    @foreach ($recentNews->shuffle()->take(1) as $recentItem)
                        <a href="{{ route('item.detail', ['id' => $randomItem->id, 'title' => $randomItem->title]) }}">
                            <img src="data:image/jpg;base64,{{ $randomItem->photoUrl }}" class="img-fluid" alt="img"
                                style="width: 800px; height: 250px; object-fit: cover;">
                            <div class="text-overlay">
                                <h4>{{ $randomItem->title }}</h4>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="d-flex g-4 mt-4" style="align-items: center;">
            <div class="sidemore">
                @foreach ($recentNews->shuffle()->take(5) as $recentItem)
                    <div class="recent-item-container img-zoomin" style="align-items: center;">
                        <div class="rounded overflow-hidden">
                            <a
                                href="{{ route('item.detail', ['id' => $recentItem->id, 'title' => $recentItem->title]) }}">
                                <img src="data:image/jpg;base64,{{ $recentItem->photoUrl }}" class="img-fluid"
                                    alt="img" style="width: 130px; height: 130px; object-fit: cover;">
                            </a>
                        </div>
                        <div class="text-container">
                            <div class="d-flex flex-column justify-content-center align-items-start h-100">
                                <a
                                    href="{{ route('item.detail', ['id' => $recentItem->id, 'title' => $recentItem->title]) }}">
                                    <h4 class="mb-2" style="font-size: 16px; margin-left: 20px;">
                                        {{ $recentItem->title }}</h4>
                                </a>
                                <div class="d-flex flex-column justify-content-center align-items-start h-100">
                                    <h4 class="mb-2"
                                        style="font-size: 16px; margin-left: 20px; font-weight: lighter;">
                                        {{ $recentItem->created_at->format('l, j F Y') }}</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Share Buttons Section -->
        <div class="share-buttons mt-4">
            <h5 class="mb-2">Share this:</h5>
            <div class="btn-group" role="group" aria-label="Share Buttons">
                <button class="btn btn-outline-primary" onclick="shareOnFacebook()">
                    <i class="fab fa-facebook"></i> Share
                </button>
                <button class="btn btn-outline-info" onclick="shareOnTwitter()">
                    <i class="fab fa-twitter"></i> Tweet
                </button>
                <button class="btn btn-outline-success" onclick="shareOnWhatsApp()">
                    <i class="fab fa-whatsapp"></i> Share
                </button>
                <button class="btn btn-outline-secondary" onclick="copyLink()">
                    <i class="fas fa-link"></i> Copy Link
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    function shareOnFacebook() {
        const url = encodeURIComponent(window.location.href);
        const title = encodeURIComponent(document.title);
        window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`, '_blank');
    }

    function shareOnTwitter() {
        const url = encodeURIComponent(window.location.href);
        const title = encodeURIComponent(document.title);
        window.open(`https://twitter.com/intent/tweet?url=${url}&text=${title}`, '_blank');
    }

    function shareOnWhatsApp() {
        const url = encodeURIComponent(window.location.href);
        const title = encodeURIComponent(document.title);
        window.open(`https://api.whatsapp.com/send?text=${title}%20${url}`, '_blank');
    }

    function copyLink() {
        navigator.clipboard.writeText(window.location.href).then(() => {
            alert('Link copied to clipboard!');
        });
    }
</script>
