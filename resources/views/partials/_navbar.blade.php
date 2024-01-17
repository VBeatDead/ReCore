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
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="container py-5">
                            <div class="w-100 center border rounded p-4 mx-auto" style="background-color: #f8f9fa;">
                                <h1 class="text-center mb-4" style="color: #3498db;">Login</h1>
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
                                        <label for="email" class="form-label" style="color: #495057;">Email</label>
                                        <input type="email" value="{{ old('email') }}" name="email" class="form-control" placeholder="Your Email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label" style="color: #495057;">Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Your Password">
                                    </div>
                                    <div class="mb-3 d-grid">
                                        <button name="submit" type="submit" class="btn btn-primary btn-block" style="background-color: #3498db;">Login</button>
                                    </div>
                                </form>
                                <div class="text-center">
                                    <p style="color: #495057;">Don't have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#registerModal" data-bs-dismiss="modal" style="color: #3498db; text-decoration: underline;">Register</a></p>
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
                            <div class="w-100 center border rounded px-4 py-4 mx-auto">
                                <h1 class="text-center mb-4" style="color: #3498db;">Register</h1>
                                <form action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label" style="color: #495057;">Name</label>
                                        <input type="text" value="{{ old('name') }}" name="name" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label" style="color: #495057;">Email</label>
                                        <input type="email" value="{{ old('email') }}" name="email" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label" style="color: #495057;">Password</label>
                                        <input type="password" name="password" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password_confirmation" class="form-label" style="color: #495057;">Confirm Password</label>
                                        <input type="password" name="password_confirmation" class="form-control" required>
                                    </div>
                                    <div class="mb-3 d-grid">
                                        <button name="submit" type="submit" class="btn btn-primary btn-block" style="background-color: #3498db;">Register</button>
                                    </div>
                                </form>
                                <div class="text-center">
                                    <p style="color: #495057;">Already have an account? <a href="{{ route('login') }}" data-bs-toggle="modal" data-bs-target="#loginModal" data-bs-dismiss="modal" style="color: #3498db; text-decoration: underline;">Login</a></p>
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