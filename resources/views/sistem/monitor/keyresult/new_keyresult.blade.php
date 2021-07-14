@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card"> 
            <div class="card-header">
                New Keyresult
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('sistem.monitor.keyresult.store', [$team->id, $objective->id])}}">
                    @csrf   
                    <div class="form-group row">
                        <label for="newkeyresult" class="col-md-4 col-form-label text-md-right">Keyresult</label>
                        <div class="col-md-6">
                            <input type="text" id=newkeyresult name="keyresult_name" class="form-control @error ('keyresult_name') is-invalid @enderror">
                                @error('keyresult_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="newkeyresult" class="col-md-4 col-form-label text-md-right">keyresult Details</label>
                        <div class="col-md-6">
                            <textarea id=newkeyresult name="keyresult_details" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="newKeyresult" class="col-md-4 col-form-label text-md-right">Start Date</label>
                        <div class="col-md-6">
                            <input type="date" id=newKeyresult name="date" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="newKeyresult" class="col-md-4 col-form-label text-md-right">Final Date</label>
                        <div class="col-md-6">
                            <input type="date" id=newKeyresult name="until" class="form-control">
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
