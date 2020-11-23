@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-9 mx-auto">
            <div class="card">
                <div class="card-header">
                    {{ auth()->user()->username }}'s Timeline
                </div>

                <div class="card-body">

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

                            <div class="card-footer bg-white">
                                footer
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="card">

            </div>
        </div>
    </div>
@endsection
