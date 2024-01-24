<div class="container p-0">
    <a href="{{ route('post.show', $post->id) }}">
        <img src="{{ $post->image }}" class="w-100" alt="image {{ $post->id }}">
    </a>
</div>
<div class="card-body">
    <div class="row align-items-center">
        <div class="col-auto">
            {{-- heart button --}}
            @if ($post->isLiked())
                <form action="{{route('like.delete',$post->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn shadow-none icon-sm text-danger">
                        <i class="fa-solid fa-heart"></i>
                    </button>
                </form>
            @else
                <form action="{{ route('like.store', $post->id) }}" method="post">
                    @csrf
                    <button type="submit" class="btn shadow-none icon-sm">
                        <i class="fa-regular fa-heart"></i>
                    </button>
                </form>
            @endif
        </div>
        <div class="col-auto px-0">
            {{-- counter --}}
           {{$post->likes->count()}}
        </div>
        <div class="col text-end">
            {{-- categories --}}
            {{-- {{$post->categoryPost}} --}}
            @foreach ($post->categoryPost as $category_post)
                <div class="badge bg-secondary bg-opacity-50">
                    {{ $category_post->category->name }}
                </div>
            @endforeach
        </div>
    </div>
    <a href="#" class="text-decoration-none text-dark fw-bold">{{ $post->user->name }}</a>
    &nbsp; <p class="d-inline fw-light">{{ $post->description }}</p>
    <p class=" text-muted xsmall">{{ $post->created_at->diffForHumans() }}</p>

    {{-- comment section --}}
    @include('users.post.contents.comments')
</div>
