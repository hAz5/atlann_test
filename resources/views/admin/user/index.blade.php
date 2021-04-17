@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3>Users List</h3>
            </div>
            <div class="card-body">
                <div class="col-lg-10  offset-1 text-center">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr class="text-center">
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Spent Time</th>
                            <th>Last Task Date</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($users as $user)
                            <tr class="text-center">
                                <th><a href="{{ route('admin.user.show', $user) }}"> {{ $user->name }}</a></th>
                                <th>{{ $user->email }}</th>
                                <th>{{ implode(', ', $user->roles->pluck('name')->toArray()) }}</th>
                                <th>{{ $user->spent_time }}</th>
                                <th>{{ $user->last_task }}</th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
