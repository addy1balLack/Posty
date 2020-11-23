@extends('layouts.app')
@section('content')

    <div class="row">

            <div class="col-lg-9 mb-3">
                @auth
                    @include('layouts.includes.alerts')
                    <div class="card">
                        <form action="{{ route('post.add') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header d-flex align-items-center">
                                <img src="{{ asset('images/thor.jpg') }}" class="rounded-circle" width="40px" height="40px" alt="">

                                <h5 class="ml-3 mt-2">What's on your mind</h5>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="post" class="sr-only @error('post') text-danger @enderror">Post</label>
                                    <textarea name="post" id="post" cols="3" placeholder="What's on your mind"
                                              class="form-control @error('post') is-invalid @enderror" rows="3"></textarea>

                                    @error('post')
                                    <span class="invalid-feedback form-text">
                                        {{ $errors->first('post') }}
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="card-footer bg-white">
                                <div class="d-flex justify-content-between">
                                    <div class="form-group">
                                        <input type="file" name="photo" id="file" class="form-control" accept="image/*" placeholder="Upload">
                                    </div>
                                    <div class="form-group mr-3">
                                        <button class="btn btn-primary" type="submit">Post</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>

                    @if(!is_null($recent_post))
                        <div class="card mt-3 mb-5">
                            <div class="card-header">
                                <h5>Recent Post</h5>
                            </div>

                            <div class="card-body">
                                <div class="card-title d-flex align-items-center">
                                    <img src="{{ asset('images/thor.jpg') }}" height="40px" class="rounded-circle mr-3" alt="">
                                    <div class="d-flex flex-column">
                                        <h6><a href="#">{{ auth()->user()->username }}</a></h6>
                                        <small class="card-subtitle">{{ $recent_post->created_at->diffForHumans() }}</small>
                                    </div>
                                </div>
                                <p class="card-text">{{ $recent_post->post }}</p>
                            </div>

                            @if(!is_null($recent_post->photo))
                                <div class="post-image">
                                    <img src="{{ asset('images/post.jpg') }}" class="card-img-bottom rounded-0" alt="...">
                                </div>
                            @endif

                            <div class="card-footer bg-white">
                                footer
                            </div>
                        </div>
                    @endif


                @endauth

                @if($posts->count())

                        <h4 class="text-muted my-3">Post Feeds</h4>

                        @foreach($posts as $post)
                            <div class="card mt-3">
                                <div class="card-body">
                                    <div class="card-title d-flex align-items-center">
                                        <img src="{{ asset('images/thor.jpg') }}" height="40px" class="rounded-circle mr-3" alt="">
                                        <div class="d-flex flex-column">
                                            <h6><a href="#">{{ $post->user->username }}</a></h6>
                                            <small class="card-subtitle">{{ $post->created_at->diffForHumans() }}</small>
                                        </div>
                                    </div>
                                    <p class="card-text">{{ $post->post }}</p>
                                </div>
                                @if(!is_null($post->photo))
                                    <div class="post-image">
                                        <img src="{{ asset('images/post.jpg') }}" class="card-img-bottom rounded-0" alt="...">
                                    </div>
                                @endif

                                <div class="card-footer bg-white d-flex justify-content-between">
                                    <form action="{{ route('post.like', $post) }}" method="post">
                                        @csrf

                                        <button type="submit" class="btn bg-white btn-sm">
                                            @if(auth()->check())
                                                @if($post->likedBy(auth()->user()))
                                                    <img src="{{ asset('images/like_filled.png') }}" class="mb-1" height="20px" alt="">

                                                    @else
                                                    <img src="{{ asset('images/like.png') }}" class="mb-1" height="20px" alt="">
                                                @endif

                                                @else
                                                <img src="{{ asset('images/like.png') }}" class="mb-1" height="20px" alt="">
                                            @endif

                                            <span class="badge ml-1">
                                                @if($post->likes->count() === 0 )
                                                    <small>Be the first person to like this post</small>

                                                    @else
                                                    {{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}
                                                @endif
                                            </span>
                                        </button>

                                    </form>

                                    <div class="user-likes">

                                    </div>

                                </div>
                            </div>
                        @endforeach
                @endif

            </div>

        <div class="col-lg-3">

        </div>
    </div>

@endsection
