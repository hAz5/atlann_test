@extends('layouts.app')

@section('content')
    <div class="container-fluid">

        <div class="col-lg-10 offset-1">
            <a href="{{route('employee.task.create')}}">
                <button class="btn btn-success">Create Task</button>
            </a>
        </div>
        <div class="col-lg-10  offset-1 text-center">
            <table class="table table-bordered table-hover">
                <thead>
                <tr class="text-center">
                    <th>Task ID</th>
                    <th> name</th>
                    <th>note</th>
                    <th>spent time</th>
                    <th>date</th>
                    <th>last modify</th>
                    <th>operation</th>
                </tr>
                </thead>

                <tbody>
                @foreach($tasks as $task)
                    <tr class="text-center">
                        <td>{{$task->id}}</td>
                        <td>{{$task->name}}</td>
                        <td>{{substr($task->note,0,25)}}...</td>
                        <td>{{$task->time}}</td>
                        <td>{{$task->created_at->format('Y-m-d')}}</td>
                        <td>{{$task->updated_at->diffForHumans()}}</td>
                        <td>
                            <a href="{{route('employee.task.edit', $task)}}">
                                <button class="btn btn-outline-primary">Edit</button>
                            </a>

                            <button type="button" class="btn btn-outline-danger" id="task-delete"
                                    data-url="{{route('employee.task.edit', $task)}}">
                                Delete
                            </button>


                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

            {{ $tasks->links() }}
        </div>

    </div>


@endsection

@section('js')
    <script type="text/javascript">
        $(document).ready(function () {
            function createInput(name, type, value) {
                let input = document.createElement("input");
                input.setAttribute('type', type);
                input.setAttribute('name', name);
                input.setAttribute('value', value);

                return input;
            }

            $(document).on('click', 'button#task-delete', function () {
                let form = document.createElement("form");
                form.setAttribute('method', "post");
                form.setAttribute('action', $(this).data('url'));

                form.appendChild(createInput('_token','hidden' ,$('meta[name=csrf-token]')[0].content));
                form.appendChild(createInput('_method', 'hidden', 'DELETE'));

                document.getElementsByTagName('body')[0].appendChild(form);

                form.submit();
            })
        })
    </script>

@endsection
