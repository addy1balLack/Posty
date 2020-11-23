@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-5 mx-auto">
            <div class="card">
                <form action="{{ route('register') }}" method="post">
                    @csrf

                    <div class="card-body">
                        <div class="form-group">
                            <label for="name" class="sr-only @error('name') text-danger @enderror">Name</label>
                            <input type="text" name="name" id="name" placeholder="Your Name" value="{{ old('name') ?? '' }}"
                                   class="form-control form-control-lg bg-light py-4 @error('name') is-invalid @enderror">
                            @error('name')
                            <span class="invalid-feedback form-text" role="alert">
                                <strong>{{$errors -> first ('name')}}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="username" class="sr-only">Username</label>
                            <input type="text" name="username" id="username" placeholder="Username" value="{{ old('username') ?? '' }}"
                                   class="form-control @error('username') is-invalid @enderror form-control-lg bg-light py-4">
                            @error('username')
                            <span class="invalid-feedback form-text" role="alert">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                            @enderror
                        </div>

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

                        <div class="form-group">
                            <label for="password_confirmation" class="sr-only">Repeat Password</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repeat Password"
                                   class="form-control form-control-lg bg-light py-4 @error('password_confirmation') is-invalid @enderror">

                            @error('password_confirmation')
                            <span class="invalid-feedback form-text">
                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="w-100 btn btn-lg btn-primary py-2">Register</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
