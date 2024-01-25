<div class="card-header bg-white py-3">
    <div class="row aligh-items-center">
        <div class="col-auto">
            {{-- avatar --}}
            <a href="#">
                @if ($post->user->avatar)
                    <img src="{{ $post->user->avatar }}" alt="" class="rounded-circle avatar-sm">
                @else
                    <i class="fa-solid fa-circle-user icon-sm text-secondary"></i>
                @endif
            </a>
        </div>
        <div class="col ps-0">
            {{-- name --}}
            <a href="#" class="text-decoration-none text-dark">
                {{ $post->user->name }}
            </a>
        </div>
        <div class="col-auto">
            <div class="dropdown">
                <button class="btn btn-sm shadow-none" data-bs-toggle="dropdown">
                    <i class="fa-solid fa-ellipsis"></i>
                </button>
                {{-- if you are the owner of the post. you can edit and delete --}}
                @if ($post->user_id == Auth::user()->id)
                    <div class="dropdown-menu">
                        <a href="{{ route('post.edit', $post->id) }}" class="dropdown-item">
                            <i class="fa-regular fa-pen-to-square"></i> Edit
                        </a>
                        <button class="dropdown-item text-danger" data-bs-toggle="modal"
                            data-bs-target="#delete-post-{{ $post->id }}">
                            <i class="fa-regular fa-trash-can"></i>Delete
                        </button>
                    </div>
                @else
                    <div class="dropdown-menu">
                        @if ($post->user->isFollowed())
                            {{-- if youre not the owner, show unfollow button --}}
                            <form action="{{route('follow.delete',$post->user->id)}}" method="post">
                                @csrf
                                @method('DELETE')

                                <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#">
                                    Unfollow
                                </button>
                            </form>
                        @else
                            {{-- if youre not the owner, show unfollow button --}}
                            <form action="{{ route('follow.store', $post->user->id) }}" method="post">
                                @csrf
                                {{-- @method('DELETE') --}}

                                <button class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#">
                                    Follow
                                </button>
                            </form>
                        @endif
                    </div>

                @endif
            </div>
            @include('users.post.contents.modals.delete')
        </div>
    </div>
</div>
