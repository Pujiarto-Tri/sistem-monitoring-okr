@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            
            <div class="row">
                <div class="col-sm-6">
                  <div class="card">
                    <div class="card-body">
                      <h5 class="card-title">Team List</h5>
                      <p class="card-text">All team that available.</p>
                      <a href="/sistem/home/index" class="btn btn-primary">Team List</a>
                    </div>
                  </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
