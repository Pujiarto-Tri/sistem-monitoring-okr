@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    
                    <div class="card-header">
                        Add new team
                    </div>

                        <div class="card-body">

                            <form method="POST" action="/sistem/home/index">
                                @csrf
                                <div class="form-group row">
                                    
                                    <label for="teamName" class="col-md-4 col-form-label text-md-right">Team Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="teamName" name="team_name" class="form-control @error ('team_name') is-invalid @enderror" >
                                            @error('team_name')
                                                <div class="invalid-feedback d-block" role="alert">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                </div>
    
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <a href="/sistem/home/index"><button type="button" class="btn btn-danger">Cancel</button></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                </div>
            </div>   
        </div>
    </div>
    

@endsection