@extends('backend.layout_backend')

@section('content')

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header well" data-original-title>
                <h2><i class="icon-user"></i> Users</h2>
            </div>
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if('users')

                        @forelse($users as $user)
                    <tr>
                        <td class="center">{{$user->name}}</td>
                        <td class="center">{{$user->email}}</td>
                        <td class="center">
                            <span class="label label-success">@foreach($user->roles as $role){{$role->name}}@endforeach</span>
                        </td>
                        <td class="center">
                            <a class="btn btn-sm btn-success" href="#">
                                <i class="icon-zoom-in icon-white"></i>
                                View
                            </a>
                            <a class="btn btn-sm btn-info" href="#">
                                <i class="icon-edit icon-white"></i>
                                Edit
                            </a>
                            <a class="btn btn-sm btn-danger" href="#">
                                <i class="icon-trash icon-white"></i>
                                Delete
                            </a>
                        </td>
                    </tr>
                            @empty
                            <li>NO USER FOUND</li>
                        @endforelse
                        @endif

                    </tbody>
                </table>
            </div>
        </div><!--/span-->

    </div><!--/span-->
    <div class="text-center">{!! $users->links() !!}</div>


@endsection
