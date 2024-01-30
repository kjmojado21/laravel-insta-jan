@extends('layouts.app')


@section('title', 'Admin:Users')

@section('content')
    <table class="table table-hover align-middle bg-white border text-secondary">
        <thead class="small table-success text-secondary">
            <th></th>
            <th>NAME</th>
            <th>EMAIL</th>
            <th>CREATED AT</th>
            <th>STATUS</th>
            <th></th>
        </thead>
        <tbody>
            @foreach ($all_users as $user)
                <tr>
                    <td>
                        @if ($user->avatar)
                            <img src="{{ $user->avatar }}" alt="avatar {{ $user->id }}"
                                class="rounded-circle mx-auto avatar-md">
                        @else
                            <i class="fa-solid fa-circle-user d-block text-center icon-md"></i>
                        @endif
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->diffForHumans() }}</td>
                    <td>
                        @if ($user->trashed())
                            <i class="fa-solid fa-circle text-danger"></i>
                        @else
                            <i class="fa-solid fa-circle text-success"></i>
                        @endif
                    </td>
                    <td>
                        @if ($user->id != Auth::user()->id)
                            <div class="dropdown">
                                <button type="button" class="btn btn-sm" data-bs-toggle="dropdown">
                                    <i class="fa-solid fa-ellipsis"></i>
                                </button>
                                <div class="dropdown-menu">
                                    @if ($user->trashed())
                                        <button class="dropdown-item text-success" data-bs-toggle="modal"
                                            data-bs-target="#activate-user-{{ $user->id }}">Activate
                                            {{ $user->name }}
                                        </button>
                                    @else
                                        <button class="dropdown-item text-danger" data-bs-toggle="modal"
                                            data-bs-target="#deactivate-user-{{ $user->id }}">Deactivate
                                            {{ $user->name }}
                                        </button>
                                    @endif
                                </div>
                            </div>

                            {{-- modal here --}}
                            @include('admin.users.modals.status')
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $all_users->links() }}
    </div>
@endsection
