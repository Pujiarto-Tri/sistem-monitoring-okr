@extends('layouts.app')

@section('content')

@csrf
<div class="container">
    <div class="container-fluid" style="margin-left: 1.3em; margin-top: 2em">
        
        <div class="card" style="width: 30rem;">
            <div class="card-body">
                <h5 class="card-title"> User : {{$user->name}} </h5>
                <h6 class="card-subtitle mb-2 text-muted"> Email : {{$user->email}}  </h6>
                <h6 class="card-subtitle mb-2"> Team List : </h6>
                    <ul>
                        @foreach($team as $team)
                        <li> <p class="card-text"> {{$team->team_name}} </p> </li>
                        @endforeach
                    </ul>
                <a href="/sistem/home/account/account_details/account_edit/{{$user->id}}" class="btn btn-primary">Edit</a>
              
                <form action="{{$user->id}}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger"> Delete </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection