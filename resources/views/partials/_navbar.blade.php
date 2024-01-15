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
                    <a href="{{ route('logout') }}">
                        <img class="rectangle" src="../img/logout.png" width="30px" data-bs-toggle="modal" data-bs-target="#loginModal" />
                    </a>
                </div>
                @else
                <div class="title d-flex justify-content-end col-md-4 col-xs-12">
                    <img class="rectangle" src="../img/icon-profile-circle.png" width="40px" data-bs-toggle="modal" data-bs-target="#loginModal" />
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
                                    <form action="" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" value="{{ old('email') }}" name="email" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                        <div class="mb-3 d-grid">
                                            <button name="submit" type="submit" class="btn btn-primary">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </nav>