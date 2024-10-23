<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
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
                            <input type="text" value="{{ old('name') }}" name="name" class="input"
                                placeholder="Name" required />
                            <input type="email" value="{{ old('email') }}" name="email" class="input"
                                placeholder="Email" required />
                            <input type="password" name="password" class="input" placeholder="Password" required />
                            <input type="password" name="password_confirmation" class="input form-control"
                                placeholder="Confirm Password" required />
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
                                <input type="email" value="{{ old('email') }}" name="email" class="input"
                                    placeholder="Email" />
                                <input type="password" name="password" class="input" placeholder="Your Password" />
                            </div>
                            <button name="submit" type="submit" class="submit-btn">Log in</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
