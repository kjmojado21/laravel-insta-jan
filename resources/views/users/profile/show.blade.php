@extends('layouts.app')

@section('title')


@section('content')
    @include('users.profile.header')

    <div style="margin-top:100px">
        @if ($user->posts->isNotEmpty())
            <div class="row">

                @foreach ($user->posts as $post)
                    <div class="col-lg-4 mb-4">
                        <a href="{{ route('post.show', $post->id) }}">
                            <img src="{{ $post->image }}" alt="" class="img-thumbnail">
                        </a>
                    </div>
                @endforeach

            </div>
        @endif
    </div>
@endsection
