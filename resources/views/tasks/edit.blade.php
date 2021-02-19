@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p/{{$task->id}}" enctype="multipart/form-data" method="post">
    @csrf
    <div class='d-flex pb-2'>
                        <div class='col-1'>
                           task:
                        </div>
                        <input value="{{$task->task}}" class='col-11' />
    </div>
    <div class='d-flex pb-2'>
                        <div class='col-1'>
                            Created:
                        </div>
                        <input type="date" value="{{substr($task->created_at,0,10)}}" class='col-11' />
    </div>
    <div class='d-flex pb-2'>
                        <div class='col-1'>
                            Deadline:
                        </div>
                        <input type="date" value="{{substr($task->deadline,0,10)}}" class='col-11' />
    </div>
    <div class='d-flex pb-2 '>
                        <div class='col-1'>
                            status:
                        </div>
                        <select class='col-11'>
                            <option
                            value="1"
                            selected="{{$task->status == 1 && 'selected'}}">Done</option>
                            <option
                            value="0"
                            selected="{{$task->status == 0 && 'selected'}}">Not done</option>
                        </select>
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
