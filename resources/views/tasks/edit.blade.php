@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p/{{$task->id}}" enctype="multipart/form-data" method="post">
    @csrf
    @method('put')
    <div class='d-flex pb-2'>
                        <div class='col-1'>
                           task:
                        </div>
                        <input
                            id="task"
                            name="task"
                            value="{{$task->task}}"
                            class="col-11 form-control @error('task') is-invalid @enderror"
                            required
                            autocomplete="task"
                            autofocus/>
                        @error('task')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
    </div>
    <div class='d-flex pb-2'>
                        <div class='col-1'>
                            Created:
                        </div>
                        <div class='col-11'>
                            {{$task->created_at}}
                        </div>
    </div>
    <div class='d-flex pb-2'>
                        <div class='col-1'>
                            Deadline:
                        </div>
                        <input
                        id="deadline"
                        type="date"
                        value="{{substr($task->deadline,0,10)}}"
                        class="col-11 form-control @error('deadline') is-invalid @enderror"
                        required
                        name="deadline"/>
                        @error('deadline')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
    </div>
    <div class='d-flex pb-2 '>
                        <div class='col-1'>
                            status:
                        </div>
                        <select
                        id="status"
                        class='col-11 form-control'
                        required
                        name="status">
                            <option
                            value="1"
                            selected="{{$task->status == 1 && 'selected'}}">Done</option>
                            <option
                            value="0"
                            selected="{{$task->status == 0 && 'selected'}}">Not done</option>
                        </select>
                        <!-- @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror -->
    </div>
    <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-6">
                                <button type="submit" class="btn btn-primary">
                                    Update Task
                                </button>
                            </div>
                        </div>
    </form>
</div>
@endsection
