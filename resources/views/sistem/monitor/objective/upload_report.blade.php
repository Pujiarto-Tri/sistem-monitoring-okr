@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card"> 
            <div class="card-header">
                Report
            </div>
            <div class="card-body">
                <form method="POST" action="{{route('sistem.report.store', [$team->id, $objective->id])}}" enctype="multipart/form-data">
                    @csrf   
                    <div class="form-group row">
                        <label for="newObjective" class="col-md-4 col-form-label text-md-right">Upload Report</label>
                        <div class="col-md-6">
                            <input type="file" id=newObjective name="report" class="form-control @error ('report') is-invalid @enderror">
                                @error('report')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">Upload</button>
                            <a href="/sistem/monitor/index/{{ $team->id }}"><input type="button" class="btn btn-danger" value="Cancel"></a>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>



@endsection
