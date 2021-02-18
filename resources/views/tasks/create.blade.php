@extends('layouts.app')

@section('content')
<div class="container">
<h1 class="col-md-8 text-md-right">Add new task</h1>
    <form action="/p" enctype="multipart/form-data" method="post">
    @csrf
                    <div class="form-group row">
                            <label for="task" class="col-md-4 col-form-label text-md-right">
                                Task
                            </label>

                            <div class="col-md-6">
                                <input id="task"
                                        type="text"
                                        class="form-control @error('task') is-invalid @enderror"
                                        name="task" value="{{ old('name') }}"
                                        required
                                        autocomplete="task"
                                        autofocus>

                                @error('task')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="deadline" class="col-md-4 col-form-label text-md-right">
                            Deadline
                            </label>

                            <div class="col-md-6">
                                <input id="deadline"
                                        type="date"
                                        class="form-control @error('deadline') is-invalid @enderror"
                                        name="deadline"
                                        value="{{ old('deadline') }}"
                                        required >

                                @error('deadline')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-6">
                                <button type="submit" class="btn btn-primary">
                                    Add New Task
                                </button>
                            </div>
                        </div>
    </form>
</div>
@endsection
