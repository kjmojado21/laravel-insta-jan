<div class="mt-3">
    {{-- show all the comments --}}

    <form action="{{route('comment.store',$post->id)}}" method="post">
        @csrf

        <div class="input-group">
            <textarea name="body" id="" rows="1" class="form-control"></textarea>
            <button type="submit" class="btn btn-outline-secondary btn-sm">Post</button>
        </div>
    </form>
</div>
