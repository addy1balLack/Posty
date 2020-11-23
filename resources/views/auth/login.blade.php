@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-5 mx-auto">
            <div class="card">
                <form action="{{ route('login') }}" method="post">
                    @csrf

                    <div class="card-body">

                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" placeholder="Your Email" value="{{ old('email') ?? '' }}"
                                   class="form-control @error('email') is-invalid @enderror form-control-lg bg-light py-4">

                            @error('email')
                            <span class="invalid-feedback form-text">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password" class="sr-only">Choose Password</label>
                            <input type="password" name="password" id="password" placeholder="Choose Password"
                                   class="form-control @error('password') is-invalid @enderror form-control-lg bg-light py-4">

                            @error('password')
                            <span class="invalid-feedback form-text">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="remember" id="remember">
                                <label class="form-check-label" for="remember">Remember me</label>
                            </div>

                            <a href="#" class="nav-link">Forgot Password?</a>
                        </div>


                        <div class="form-group">
                            <button type="submit" class="w-100 btn btn-lg btn-primary py-2">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
