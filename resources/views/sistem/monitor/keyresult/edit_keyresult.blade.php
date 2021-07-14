@extends('layouts.app')

@section('content')

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
{{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/js/bootstrap.min.js"></script> --}}

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                Update Keyresult
            </div>
            <div class="card-body">
                <form action="{{ route('sistem.monitor.keyresult.details',[$team->id, $objective->id, $keyresult->id])}}" method="POST">
                    @method('patch')
                    @csrf   

                    <div class="form-group row">
                        <label for="newObjective" class="col-md-4 col-form-label text-md-right">Keyresult</label>
                        <div class="col-md-6">
                            <input type="text" id=newObjective name="keyresult_name" class="form-control @error ('keyresult_name') is-invalid @enderror" value="{{ $keyresult->keyresult_name }}">
                                @error('keyresult_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="newObjective" class="col-md-4 col-form-label text-md-right">Keyresult Details</label>
                        <div class="col-md-6">
                            <textarea id=newObjective name="keyresult_details" class="form-control">{{ $keyresult->keyresult_details}}</textarea>
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

                    <div class="form-group row">
                        <label for="newKeyresult" class="col-md-4 col-form-label text-md-right">Progress</label>
                        <div class="col-md-6">
                            <input type="range" name="progress" class="form-control-range" id="formControlRange1" value="{{ $keyresult->progress }}" min="0" max="100" oninput="this.nextElementSibling.value = this.value">
                            <output>{{ $keyresult->progress }}</output>%
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="/sistem/monitor/keyresult/details/{{ $team->id }}/{{ $objective->id}}/{{ $keyresult->id }}}"><input type="button" class="btn btn-danger" value="Cancel"></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
