@extends('layouts.app')
@section('css')
    <link href="/css/time-pick-light.css" rel="stylesheet"/>
@endsection
@section('content')


    <div class="col-lg-10 offset-1">
        <form action="{{route('employee.task.store')}}" method="POST" id="task-create-form">
            @csrf

            <div class="form-group">
                <label class="col-form-label" for="name">Name:</label>
                <input class="form-control  @error('name') is-invalid @enderror" type="text" id="name" name="name"
                       value="{{old('name')}}"/>
                @error('name')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label class="col-form-label" for="note">note:</label>
                <textarea class="form-control  @error('note') is-invalid @enderror" type="text" id="note"
                          name="note">{{old('note')}}</textarea>
                @error('note')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <div class="form-group">
                <label class="col-form-label" for="time">time:</label>
                <input class="form-control  @error('time') is-invalid @enderror" type="time" id="time" name="time"
                       value="{{old('time', '60')}}"/>


                @error('time')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <button class="btn btn-primary">save</button>
            <a href="{{route('employee.task.index')}}">
                <button type="button" class="btn btn-secondary">back</button>
            </a>
        </form>


    </div>
@endsection

@section('js')
    <script src="/js/time-pick.js"></script>
    <script>
        $(document).ready(function () {
            tp.attach({
                target: "time",
            });

            $('#task-create-form').submit(function (e) {
                let value = $('#time').val()
                value = (Number(value.split(':')[0]) * 60) + (Number(value.split(':')[1]));

                if (isNaN(value)) {
                    return false;
                }

                $('#time').val(value);

                return true;
            })
        });

    </script>
@endsection
