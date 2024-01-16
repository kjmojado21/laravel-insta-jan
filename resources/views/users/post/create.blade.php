@extends('layouts.app')

@section('title', 'Create post')

@section('content')


    <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="" class="form-label d-block fw-bold">Category <span class="text-muted fw-normal">(Up to
                    3)</span>
            </label>

            @foreach ($all_categories as $category)
                <div class="form-check form-check-inline">
                    <input type="checkbox" name="category[]" id="{{ $category->name }}" class="form-check-input"
                        value="{{ $category->id }}">
                    <label for="{{ $category->name }}" class="form-check-label">
                        {{ $category->name }}
                    </label>
                </div>
            @endforeach
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="" rows="3" class="form-control"></textarea>
        </div>

        <div class="mb-3">
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
