@extends('layouts.app')

@section('content')

@if(Auth::user())

<div class="container">

    <div class="container-fluid">
      <h1 class="mb-4">Team Index</h1>
    </div>

    <div class="card">
      
      <div class="card-body">
      <div class="container-fluid">

      
        @if (session('status'))
          <div class="alert alert-success">
              {{session('status')}}
          </div>
        @endif

          <table class="table">
              <thead class="thead-dark">
                  <tr class="title" style="font-weight: bold">
                      <td scope="col">Team Name</td>
                      <td scope="col">Progress</td>
                      <td scope="col">Action</td>
                  </tr>
              </thead>
              <tbody> 

                @foreach($team as $team)
                  <tr> 
                      <td scope="row">
                        <a href="/sistem/monitor/index/{{$team->id}}">
                          {{$team->team_name}}
                        </a>
                      </td>
                      <td>
                          <div class="progress bg-dark" style="height: 20px;">
                              <div class="progress-bar" role="progressbar" style="width: {{ $team->progress }}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                {{ $team->progress }}%
                              </div>
                          </div>
                      </td>
                      <td>
                        <a href="/sistem/home/{{$team->id}}/{{$team->id}}" class="badge badge-primary">Details</a>
                      </td>
                  </tr>
                  @endforeach
          
              </tbody>
          </table>
          <div class="button_wraper">
              <a href="add_team"><input type="button" value="ADD TEAM" class="btn btn-primary"></a>
              
          </div>
      </div>
    </div>
    </div>
</div>

@else

<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-8">
          <div class="card">
              <div class="card-header">Error</div>

              <div class="card-body">
                  You need to Login first!
              </div>
          </div>
      </div>
  </div>
</div>

@endif

@endsection
