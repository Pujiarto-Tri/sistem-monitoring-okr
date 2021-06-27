@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                Edit Objective
            </div>
            <div class="card-body">
                <form method="POST" action="/sistem/monitor/objective/edit/{{ $objective -> id }}">
                    @method('patch')
                    @csrf   

                    <div class="form-group row">
                        <label for="newObjective" class="col-md-4 col-form-label text-md-right">Objective</label>
                        <div class="col-md-6">
                            <input type="text" id=newObjective name="objective_name" class="form-control @error ('objective_name') is-invalid @enderror" value="{{ $objective -> objective_name}}">
                                @error('objective_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="newObjective" class="col-md-4 col-form-label text-md-right">Objective Details</label>
                        <div class="col-md-6">
                            <textarea id=newObjective name="objective_details" class="form-control">{{ $objective -> objective_details}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="newKeyresult" class="col-md-4 col-form-label text-md-right">Start Date</label>
                        <div class="col-md-6">
                            <input type="date" id=newKeyresult name="date" class="form-control" value="{{ $deadline->date }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="newKeyresult" class="col-md-4 col-form-label text-md-right">Final Date</label>
                        <div class="col-md-6">
                            <input type="date" id=newKeyresult name="until" class="form-control" value="{{ $deadline->until }}">
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">Save</button>
                </form>
                            <a href="/sistem/monitor/objective/details/{{ $objective->id}}"><input type="button" class="btn btn-danger" value="Cancel"></a>    
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
@endsection
