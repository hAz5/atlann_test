@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h3>User Task List</h3>
            </div>
            <div class="card-body">
                <div class="col-lg-10  offset-1 text-center">
                    <div>
                        <span class="btn btn-xs btn-success"><b>Name:</b> {{$user->name}}</span>
                            <span class="btn btn-xs btn-danger"><b>Email:</b> {{$user->email}}</span>
                            <span class="btn btn-xs btn-primary"><b>Roles:</b> {{ implode(', ', $user->roles->pluck('name')->toArray()) }}</span>

                    </div>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr class="text-center">
                            <th>Name</th>
                            <th>Note</th>
                            <th>Time</th>
                            <th>Created At</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($tasks as $task)
                            <tr class="text-center">
                                <th>{{ $task->name }}</th>
                                <th>{{ $task->note }}</th>
                                <th>{{ $task->time }}</th>
                                <th>{{ $user->created_at }}</th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
