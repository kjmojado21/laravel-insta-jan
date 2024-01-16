<div class="container p-0">
    <img src="{{ $post->image }}" class="w-100" alt="">
</div>
<div class="card-body">
    <div class="row align-items-center">
        <div class="col-auto">
            {{-- heart button --}}
            <form action="" method="post">
                @csrf
                <button type="submit" class="btn shadow-none icon-sm">
                    <i class="fa-regular fa-heart"></i>
                </button>
            </form>
        </div>
        <div class="col-auto px-0">
            {{-- counter --}}
            3
        </div>
        <div class="col text-end">
            {{-- categories --}}
            {{-- {{$post->categoryPost}} --}}
           @foreach ($post->categoryPost as $category_post)
                <div class="badge bg-secondary bg-opacity-50">
                    {{$category_post->category->name}}
                </div>
           @endforeach
        </div>
    </div>
    <a href="#" class="text-decoration-none text-dark fw-bold">{{$post->user->name}}</a>
    &nbsp; <p class="d-inline fw-light">{{$post->description}}</p>
    <p class=" text-muted xsmall">{{$post->created_at->diffForHumans()}}</p>
</div>
