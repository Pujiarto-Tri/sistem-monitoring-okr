@extends('layouts.app')

@section('content')

    @csrf
<div class="container">
    <div class="container-fluid" style="margin-left: 1.3em; margin-top: 2em">
        
        <div class="card" style="width: 30rem;">
            <div class="card-body">
                <h5 class="card-title"> {{$team->team_name}} </h5>

                <h6 class="card-subtitle mb-2"> Objective List : </h6>
                <ul>
                    @foreach($objective as $objective)
                    <li> <p class="card-text"> {{$objective->objective_name}} </p> </li>
                    @endforeach
                </ul>
                <p></p>
                <a href="/sistem/home/edit_team/{{$team->id}}" class="btn btn-primary">Edit</a>
                <form action="/sistem/home/{{$team->id}}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger"> Delete </button>
                </form>

            </div>
          </div>

    </div>
</div>
@endsection
