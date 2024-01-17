<div class="sidebar col-md-3 col-xs-12" style="padding-right: 2%;">
    <h2 style="margin-bottom: -30px; font-size: 30px; padding-top: 30%;">Recent News</h2>
    <div class="container py-5">
        <div class="row g-4 position-relative">
            <div class="col-12">
                <div class="rounded overflow-hidden position-relative img-zoomin">
                    <img width="100%" src="data:image/jpg;base64,{{ $randomItem->photoUrl }}" class="img-fluid" alt="img" style="width: 100%; height: 100%; object-fit: cover;">
                    <div class="text-overlay">
                        <h4>{{ $randomItem->title }}</h4>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex g-4 mt-4" style="align-items: center;">
            <div class="sidemore">
                @foreach($recentNews->shuffle()->take(5) as $recentItem)
                <div class="recent-item-container img-zoomin" style="align-items: center;">
                    <div class="rounded overflow-hidden">
                        <a href="{{ route('item.detail', ['id' => $recentItem->id, 'title' => $recentItem->title]) }}">
                            <img src="data:image/jpg;base64,{{ $recentItem->photoUrl }}" class="img-fluid" alt="img" style="width: 130px; height: 130px; object-fit: cover;">
                        </a>
                    </div>
                    <div class="text-container">
                        <div class="d-flex flex-column justify-content-center align-items-start h-100">
                            <a href="{{ route('item.detail', ['id' => $recentItem->id, 'title' => $recentItem->title]) }}">
                                <h4 class="mb-2" style="font-size: 16px; margin-left: 20px;">{{ $recentItem->title }}</h4>
                            </a>
                            <div class="d-flex flex-column justify-content-center align-items-start h-100">
                                <h4 class="mb-2" style="font-size: 16px; margin-left: 20px; font-weight: lighter;">{{ $recentItem->created_at->format('l, j F Y') }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>