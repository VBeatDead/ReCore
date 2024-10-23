<style>
    @media (max-width: 990px) {
        .navbar-nav {
            flex-grow: 1;
        }

        .navbar-toggler {
            order: -1;
        }

        .title {
            order: 0;
            flex-grow: 1;
            text-align: center;
        }

        .navbar-nav,
        .title,
        .title a {
            margin-right: 0 !important;
        }

        .title h1 {
            font-size: 1.75rem;
        }

        .navbar-collapse {
            flex-basis: 100%;
        }

        .navbar-collapse.show {
            display: flex;
        }

        .hak {
            flex-direction: column;
            align-items: center;
        }

        .kontak,
        .social {
            text-align: center;
            padding-left: 0;
            margin-top: 20px;
        }

        .logok,
        .kontak,
        .social {
            width: 100%;
        }

        .content,
        .sidebar {
            width: 100%;
            padding: 0;
            margin: 0;
        }

        .sidebar {
            padding-top: 0;
        }

        .listitem2 {
            padding: 2% 2% 3%;
        }

        .comment-item {
            width: 100%;
        }

        .comment-content {
            word-wrap: break-word;
        }

        form {
            width: 100%;
        }

        textarea {
            width: 100%;
        }

        .d-flex.justify-content-end {
            justify-content: start;
        }

        .social {
            display: none;
        }

        .img-container {
            width: 100%;
            height: 400px;
            padding: 3%;
        }
    }
</style>
<nav class="navbar navbar-expand-lg nav-custom-bg w-100">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav d-flex justify-content-start col-md-4 col-xs-12">
                <a class="nav-link active" style="margin-right: 5px; color: #EBF9FF;"
                    href="{{ route('item.home') }}">HOME</a>
                <a class="nav-link active" style="margin-right: 5px; color: #EBF9FF"
                    href="{{ route('item.about') }}">DISCLAMER</a>
                <a class="nav-link active" style="margin-right: 5px; color: #EBF9FF"
                    href="{{ route('item.contact') }}">CONTACT</a>
            </div>
            <div class="title d-flex justify-content-center col-md-4 col-xs-12">
                <h1>Inpo Game</h1>
            </div>
            @if (Auth::check())
                <div class="title d-flex justify-content-end col-md-4 col-xs-12">
                    @if ((Auth::check() && Auth::user()->role == 'admin') || Auth::user()->role == 'in')
                        <a href="{{ route('setting') }}">
                            <img class="rectangle walls" src="{{ asset('img/settings.png') }}" width="30px"
                                style="margin-right: 40px;" />
                        </a>
                    @endif
                    @auth
                        <a class="nav-link" href="{{ route('bookmark.index') }}">
                            <!-- Bookmark Icon Same Size as Other Icons -->
                            <img class="rectangle" src="{{ asset('img/bookmark.png') }}" width="30px"
                                style="margin-right: 40px;" />
                        </a>
                    @endauth
                    <a href="{{ route('logout') }}">
                        <img class="rectangle walls" src="{{ asset('img/logout.png') }}" width="30px"
                            data-bs-toggle="modal" data-bs-target="#loginModal" style="margin-right: 5px;" />
                    </a>
                </div>
            @else
                <div class="title d-flex justify-content-end col-md-4 col-xs-12">
                    <img class="rectangle" src="{{ asset('img/icon-profile-circle.png') }}" width="35px"
                        data-bs-toggle="modal" data-bs-target="#loginModal" style="margin-right: 8px;" />
                </div>
                <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $item)
                                            <li>{{ $item }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-structor">
                                <div class="signup slide-up">
                                    <h2 class="form-title" id="signup"><span>or</span>Sign up</h2>
                                    <form action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <div class="form-holder">
                                            <input type="text" value="{{ old('name') }}" name="name"
                                                class="input" placeholder="Name" required />
                                            <input type="email" value="{{ old('email') }}" name="email"
                                                class="input" placeholder="Email" required />
                                            <input type="password" name="password" class="input" placeholder="Password"
                                                required />
                                            <input type="password" name="password_confirmation"
                                                class="input form-control" placeholder="Confirm Password" required />
                                        </div>
                                        <button name="submit" type="submit" class="submit-btn">Sign up</button>
                                    </form>
                                </div>
                                <form action="{{ route('login') }}" method="POST">
                                    @csrf
                                    <div class="login">
                                        <div class="center">
                                            <h2 class="form-title" id="login"><span>or</span>Log in</h2>
                                            <div class="form-holder">
                                                <input type="email" value="{{ old('email') }}" name="email"
                                                    class="input" placeholder="Email" />
                                                <input type="password" name="password" class="input"
                                                    placeholder="Your Password" />
                                            </div>
                                            <button name="submit" type="submit" class="submit-btn">Log in</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
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
            </div> -->
            @endif
        </div>
    </div>
</nav>
