<nav class="navbar navbar-expand-lg nav-custom-bg w-100">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav d-flex justify-content-start col-md-4 col-xs-12">
                <a class="nav-link active" style="margin-right: 5px; color: #EBF9FF;" href="{{ route('item.home')}}">HOME</a>
                <a class="nav-link active" style="margin-right: 5px; color: #EBF9FF" href="{{route('item.about')}}">ABOUT US</a>
                <a class="nav-link active" style="margin-right: 5px; color: #EBF9FF" href="{{route('item.contact')}}">CONTACT</a>
            </div>
            <div class="title d-flex justify-content-center col-md-4 col-xs-12">
                <h1>Game News</h1>
            </div>
            @if(Auth::check())
            <div class="title d-flex justify-content-end col-md-4 col-xs-12">
                @if(Auth::check() && Auth::user()->role == 'admin')
                <a href="{{ route('setting') }}">
                    <img class="rectangle" src="{{ asset('img/settings.png') }}" width="30px" style="margin-right: 40px;" />
                </a>
                @endif
                <a href="{{ route('logout') }}">
                    <img class="rectangle" src="{{ asset('img/logout.png') }}" width="30px" data-bs-toggle="modal" data-bs-target="#loginModal" style="margin-right: 5px;" />
                </a>
            </div>
            @else
            <div class="title d-flex justify-content-end col-md-4 col-xs-12">
                <img class="rectangle" src="{{ asset('img/icon-profile-circle.png') }}" width="35px" data-bs-toggle="modal" data-bs-target="#loginModal" style="margin-right: 8px;" />
            </div>
            <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="container py-5">
                            <div class="w-100 center border rounded px-3 py-3 mx-auto">
                                <h1 style="color: #000000;">Login</h1>
                                @if($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $item)
                                        <li>{{$item}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label" style="color: #000000;">Email</label>
                                        <input type="email" value="{{ old('email') }}" name="email" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label" style="color: #000000;">Password</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                    <div class="mb-3 d-grid">
                                        <button name="submit" type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                </form>
                                <div class="text-center">
                                    <p style="color: #000000;">Don't have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal" data-bs-dismiss="modal" style="color: blue;">Register</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="container py-5">
                            <div class="w-100 center border rounded px-3 py-3 mx-auto">
                                <h1 style="color: #000000;">Register</h1>
                                <form action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label" style="color: #000000;">Name</label>
                                        <input type="text" value="{{ old('name') }}" name="name" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label" style="color: #000000;">Email</label>
                                        <input type="email" value="{{ old('email') }}" name="email" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label" style="color: #000000;">Password</label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label" style="color: #000000;">Confirm Password</label>
                                        <input type="password" name="password_confirmation" class="form-control" required>
                                    </div>
                                    <div class="mb-3 d-grid">
                                        <button name="submit" type="submit" class="btn btn-primary">Register</button>
                                    </div>
                                </form>
                                <div class="text-center">
                                    <p style="color: #000000;">Already have an account? <a href="{{ route('login') }}" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal" style="color: blue;">Login</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</nav>