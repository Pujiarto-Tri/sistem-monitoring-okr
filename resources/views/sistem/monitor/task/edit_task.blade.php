@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                Update Initiative
            </div>
            <div class="card-body">
                <form action="{{ route('sistem.task.update',[$team->id, $objective->id, $task->id])}}" method="POST">
                    @method('patch')
                    @csrf   

                    <div class="form-group row">
                        <label for="newObjective" class="col-md-4 col-form-label text-md-right">Initiative</label>
                        <div class="col-md-6">
                            <input type="text" id=newObjective name="task_name" class="form-control @error ('task_name') is-invalid @enderror" value="{{ $task->task_name }}">
                                @error('task_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>
                    </div>

                    <!-- <div class="form-group row">
                        <label for="newObjective" class="col-md-4 col-form-label text-md-right">Initiative Details</label>
                        <div class="col-md-6">
                            <textarea id=newObjective name="task_details" class="form-control">{{ $task->task_details}}</textarea>
                        </div>
                    </div> -->

                    <div class="form-group row">
                        <label for="newtask" class="col-md-4 col-form-label text-md-right">Start Date</label>
                        <div class="col-md-6">
                            <input type="date" id=newtask name="date" class="form-control" value="{{ $deadline->date }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="newtask" class="col-md-4 col-form-label text-md-right">Final Date</label>
                        <div class="col-md-6">
                            <input type="date" id=newtask name="until" class="form-control" value="{{ $deadline->until }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="newtask" class="col-md-4 col-form-label text-md-right">Progress</label>
                        <div class="col-md-6">
                            <input type="range" name="progress" class="form-control-range" id="formControlRange1" value="{{ $task->progress }}" min="0" max="100" oninput="this.nextElementSibling.value = this.value">
                            <output>{{ $task->progress }}</output>%
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="/sistem/monitor/index/{{ $team->id }}"><input type="button" class="btn btn-danger" value="Cancel"></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
