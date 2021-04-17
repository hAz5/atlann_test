@extends('layouts.app')
@section('css')
    <link href="/css/time-pick-light.css" rel="stylesheet"/>
@endsection
@section('content')


    <div class="col-lg-10 offset-1">
        <form action="{{route('employee.task.update', $task)}}" method="POST" id="task-edit-form">
            @csrf
            {!! method_field('PUT') !!}
            <div class="form-group">
                <label class="col-form-label" for="name">Name:</label>
                <input class="form-control  @error('name') is-invalid @enderror" type="text" id="name" name="name"
                       value="{{old('name', $task->name)}}"/>
                @error('name')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label class="col-form-label" for="note">note:</label>
                <textarea class="form-control  @error('note') is-invalid @enderror" type="text" id="note"
                          name="note">{{old('note', $task->note)}}</textarea>
                @error('note')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="form-group">
                <label class="col-form-label" for="time">time:</label>
                <input class="form-control  @error('time') is-invalid @enderror" type="text" id="time" name="time"
                       value="{{old('time', $task->time)}}"/>

                @error('time')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <button class="btn btn-primary">save edit</button>
            <a href="{{route('employee.task.index')}}">
                <button type="button" class="btn btn-secondary">back</button>
            </a>
        </form>


    </div>
@endsection
