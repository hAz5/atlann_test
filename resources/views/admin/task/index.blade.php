@extends('layouts.app')

@section('content')

    <div class="container-fluid">

        <div class="col-lg-10 offset-1">
            <div class="flex">
                <form>
                    <div class="col-lg-5">
                        <label class="col-form-label" for="date">created at : </label>
                        <input name="date" id="date" class="form-control" type="date" value="{{request('date')}}"/>

                    </div>
                    <br>
                    <div class="col-lg-5">
                        <button class="btn btn-success">search</button>
                    </div>

                </form>
                <br>

            </div>
        </div>
        <div class="col-lg-10  offset-1 text-center">

            <table class="table table-bordered table-hover">
                <thead>
                <tr class="text-center">
                    <th>Task ID</th>
                    <th> employee</th>
                    <th> name</th>
                    <th>note</th>
                    <th>spent time</th>
                    <th>date</th>
                    <th>last modify</th>

                </tr>
                </thead>

                <tbody>
                @forelse($tasks as $task)
                    <tr class="text-center">
                        <td>{{$task->id}}</td>
                        <td><a href="{{ route('admin.user.show', $task->user) }}"> {{$task->user->name}}</a></td>
                        <td>{{$task->name}}</td>
                        <td>{{substr($task->note,0,25)}}...</td>
                        <td>{{$task->time}}</td>
                        <td>{{$task->created_at->format('Y-m-d')}}</td>
                        <td>{{$task->updated_at->diffForHumans()}}</td>
                    </tr>
                    @empty
                        <tr>
                            <td colspan="7">
                                No Record Were Founded!
                            </td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

{{--            {{ $tasks->links() }}--}}
        </div>

    </div>



@endsection
