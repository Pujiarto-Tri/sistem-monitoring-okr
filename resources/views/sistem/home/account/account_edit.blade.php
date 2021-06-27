@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            
            <div class="card-header">
                Edit User
            </div>

                <div class="card-body">
                    <form method="POST"{{--  action="/sistem/home/{{ $team -> team_id }}/{{ $product -> product_id}} --}}">
                        @method('patch')
                        @csrf
                        <div class="form-group row">
                            <label for="teamName" class="col-md-4 col-form-label text-md-right">Change Username : </label>
                            <div class="col-md-6">
                                <input type="text" id="teamName" name="team_name" class="{{-- @error ('team_name') is-invalid @enderror --}} form-control"{{--  value="{{ $team -> team_name}}" --}} >
                                    {{-- @error
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror --}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="teamName" class="col-md-4 col-form-label text-md-right">Change Email : </label>
                            <div class="col-md-6">
                                <input type="text" id="teamName" name="team_name" class="{{-- @error ('team_name') is-invalid @enderror --}} form-control"{{--  value="{{ $team -> team_name}}" --}} >
                                    {{-- @error
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror --}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="productName" class="col-md-4 col-form-label text-md-right">Old Password : </label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control {{-- @error('password') is-invalid @enderror --}}" name="password" required autocomplete="current-password">
                                    {{-- @error
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror --}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="productName" class="col-md-4 col-form-label text-md-right">New Password : </label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control {{-- @error('password') is-invalid @enderror --}}" name="password" required autocomplete="current-password">
                                    {{-- @error
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror --}}
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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
@endsection