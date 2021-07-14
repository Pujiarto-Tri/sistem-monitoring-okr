@extends('layouts.app')

@section('content')
@csrf
<div class="container">

    <h1>
        Keyresult Details
    </h1>

    <div class="row">
        <div class="col-lg-6 mb-4">     
            <div class="card" style="width: 30rem;">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold"> 
                        {{ $keyresult->keyresult_name }} 
                    </h5>
                        <h6 class="card-subtitle mb-2 text-muted">
                            Deadline : {{ $deadline->date }} - {{ $deadline->until }} 
                        </h6>
                        <h6 class="card-subtitle mb-2"> 
                            Keyresult Details
                        </h6>
                            <p class="card-text">
                                {{ $keyresult->keyresult_details }}
                            </p>
                        <h6 class="card-subtitle mb-2"> 
                            Progress 
                        </h6>
                            <div class="progress" style="height: 20px;">
                                <div class="progress-bar" role="progressbar" style="width: {{ $keyresult->progress }}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                    {{ $keyresult->progress }}%
                                </div>
                            </div>
                        <p></p>
                    <a href="/sistem/monitor/keyresult/edit/{{ $team->id}}/{{ $objective->id }}/{{ $keyresult->id }}" class="btn btn-primary">
                        Update
                    </a>
                    <a href="/sistem/monitor/index/{{ $team->id }}" class="btn btn-primary">
                        Cancel
                    </a>
                    <p></p>
                    <form action="/sistem/monitor/keyresult/details/{{$team->id}}/{{$objective->id}}/{{$keyresult->id}}" method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger"> Delete </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection