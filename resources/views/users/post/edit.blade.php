@extends('layouts.app')

@section('title', 'Edit post')

@section('content')


    <form action="{{route('post.update',$post->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="" class="form-label d-block fw-bold">Category <span class="text-muted fw-normal">(Up to
                    3)</span>
            </label>

            @foreach ($all_categories as $category)
                <div class="form-check form-check-inline">
                    @if (in_array($category->id, $selected_categories))
                        <input type="checkbox" name="category[]" id="{{ $category->name }}" class="form-check-input"
                            value="{{ $category->id }}" checked>
                    @else
                        <input type="checkbox" name="category[]" id="{{ $category->name }}" class="form-check-input"
                            value="{{ $category->id }}">
                    @endif


                    <label for="{{ $category->name }}" class="form-check-label">
                        {{ $category->name }}
                    </label>
                </div>
            @endforeach
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="" rows="3" class="form-control">{{ $post->description }}</textarea>
        </div>

        <div class="mb-3">
            <img src="{{ $post->image }}" alt="" class="d-block img-thumbnail" height="250" width="250">
            <label for="image" class="form-label">Image</label>
            <input type="file" name="image" id="image" class="form-control">
            <p class="form-text">
                Accepted Formats: jpeg, jpg, png, gif <br>
                Maximum file size: 148mb
            </p>
        </div>
        <button type="submit" class="btn btn-primary px-5">Post</button>
    </form>

@endsection
