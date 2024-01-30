
<div class="modal fade" id="deactivate-user-{{ $user->id }}" >
    <div class="modal-dialog">
        <div class="modal-content border-danger">
            <div class="modal-header border-danger">
                <h5 class="modal-title text-danger" id="modalTitleId">
                  <i class="fa-solid fa-user-slash"></i>  Deactivate User
                </h5>
            </div>
            <div class="modal-body">
                <p>Are you sure to deactivate <span class="fw-bold">{{$user->name}}</span> ?</p>
                <div class="mt-3">
                </div>
            </div>
            <div class="modal-footer">
               <form action="{{route('admin.users.deactivate',$user->id)}}" method="post">
                @csrf
                @method('DELETE')

                <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">
                    Cancel
                </button>
                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
               </form>
            </div>
        </div>
    </div>
</div>
{{-- activate user --}}

<div class="modal fade" id="activate-user-{{ $user->id }}" >
    <div class="modal-dialog">
        <div class="modal-content border-success">
            <div class="modal-header border-success">
                <h5 class="modal-title text-success" id="modalTitleId">
                  <i class="fa-solid fa-user-check"></i>  Activate User
                </h5>
            </div>
            <div class="modal-body">
                <p>Are you sure to Activate <span class="fw-bold">{{$user->name}}</span> ?</p>
                <div class="mt-3">
                </div>
            </div>
            <div class="modal-footer">
               <form action="{{route('admin.users.activate',$user->id)}}" method="post">
                @csrf
                @method('PATCH')

                <button type="button" class="btn btn-outline-success btn-sm" data-bs-dismiss="modal">
                    Cancel
                </button>
                <button type="submit" class="btn btn-success btn-sm">Activate</button>
               </form>
            </div>
        </div>
    </div>
</div>

<!-- Optional: Place to the bottom of scripts -->
<script>
    const myModal = new bootstrap.Modal(
        document.getElementById("modalId"),
        options,
    );
</script>
