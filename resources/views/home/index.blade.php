@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class='d-flex justify-content-between'>
                            <span>
                                <strong>hello {{$user -> name}}, </strong> these are your tasks
                            </span>
                            <a href="/p/create">Add new task</a>
                    </div>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class='d-flex'>
                        <div class='col-3'>
                            Task
                        </div>
                        <div class='col-3'>
                            Created
                        </div>
                        <div class='col-3'>
                            Deadline
                        </div>
                        <div class='col-3'>
                            Status
                        </div>
                    </div>

                    @foreach($user->tasks as $task)
                    <div class='d-flex'>
                        <div class='col-3'>
                            {{$task->task}}
                        </div>
                        <div class='col-3'>
                            {{$task->created_at}}
                        </div>
                        <div class='col-3'>
                            {{$task->deadline}}
                        </div>
                        <div class='col-3'>
                            @if ($task->status)
                                <i class="bi bi-x" style="color:green;">v</i>
                            @else
                                <i class="bi bi-x" style="color:red;">x</i>
                            @endif
                        </div>
                        <!-- <div class='col-2'>
                            <button type="submit" class="btn btn-primary">
                                    Mark as done
                            </button>
                        </div> -->
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
