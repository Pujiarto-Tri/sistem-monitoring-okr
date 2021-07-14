@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card"> 
            <div class="card-header">
                New Initiative
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('sistem.task.store', [$team->id, $objective->id])}}">
                    @csrf   
                    <div class="form-group row">
                        <label for="newtask" class="col-md-4 col-form-label text-md-right">Initiative</label>
                        <div class="col-md-6">
                            <input type="text" id=newtask name="task_name" class="form-control @error ('task_name') is-invalid @enderror">
                                @error('task_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="newtask" class="col-md-4 col-form-label text-md-right">Start Date</label>
                        <div class="col-md-6">
                            <input type="date" id=newtask name="date" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="newtask" class="col-md-4 col-form-label text-md-right">Final Date</label>
                        <div class="col-md-6">
                            <input type="date" id=newtask name="until" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="/sistem/monitor/objective/details/{{ $team->id }}/{{ $objective->id }}"><input type="button" class="btn btn-danger" value="Cancel"></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection
