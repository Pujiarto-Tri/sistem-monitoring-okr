@extends('layouts.app')

@section('content')
@csrf
<div class="container">

    <h1>Objective Details</h1>

    <div class="row">
        <div class="col-lg-6 mb-4">     
            <div class="card" style="width: 30rem;">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold"> {{ $objective->objective_name }} </h5>
                    <h6 class="card-subtitle mb-2 text-muted">Deadline :{{--  {{ $deadline ->date }} - {{ $deadline->until }} --}}</h6>
                    <p class="card-text">{{ $objective->objective_details }}</p>
                    <h6 class="card-subtitle mb-2"> Keyresult List : </h6>
                    <ul>  
                        @foreach($keyresult as $keyresult)
                        <li> <p class="card-text"> {{ $keyresult->keyresult_name }} </p> </li>
                        @endforeach
                    </ul>
                    <h6 class="card-subtitle mb-2"> Initiative : </h6>
                    <ul>
                        @foreach($task as $task)
                        <li> <p class="card-text"> {{ $task->task_name }} </p> </li>
                        @endforeach
                    </ul>
                    <h6 class="card-subtitle mb-2"> Progress </h6>
                    <div class="progress" style="height: 20px;">
                        <div class="progress-bar" role="progressbar" style="width: {{ $objective->progress }}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                            {{ $objective->progress }}%
                        </div>
                    </div>
                    <p></p>
                    <a href="/sistem/monitor/objective/edit/{{ $team->id }}/{{ $objective->id }}" class="btn btn-primary">
                        Edit
                    </a>
                    <a href="/sistem/monitor/keyresult/new/{{ $team->id }}/{{ $objective->id }}" class="btn btn-success">
                        Add a new Keyresult
                    </a>
                    <a href="/sistem/monitor/task/new/{{ $team->id }}/{{ $objective->id }}" class="btn btn-success">
                        Add a new Inisiative
                    </a>
                    <p></p>
                    <form method="POST" class="d-inline">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger"> Delete </button>
                    </form>
                    <a href="/sistem/monitor/index/{{ $team->id }}" class="btn btn-secondary">
                        Cancel
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <div class="card" style="width: 30rem; float: right;">
                <div class="card-body">
                    <h5 class="card-subtitle mb-2"> Progress </h5>
                    <h6 class="card-subtitle mb-2"> Keyresult </h6>

                    <ul>
                        @foreach($kr as $kr)
                        <li> 
                            <p class="card-text"> 
                                {{ $kr->keyresult_name }} 
                            </p> 
                            <div class="progress" style="height: 20px;">
                                <div class="progress-bar" role="progressbar" style="width: {{ $kr->progress }}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                    {{ $kr->progress }}%
                                </div>
                            </div>
                        </li>
                        @endforeach    
                    </ul>
                   

                    <h6 class="card-subtitle mb-2"> Initiative </h6>
                    <ul>
                        @foreach($tt as $tt)
                        <li> 
                            <p class="card-text"> 
                                {{ $tt->task_name }}
                            </p>
                            <div class="progress" style="height: 20px;">
                                <div class="progress-bar" role="progressbar" style="width: {{ $tt->progress }}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                    {{ $tt->progress }}%
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>

                    <div class="input-group mb-3">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="inputGroupFile02">
                          <label class="custom-file-label" for="inputGroupFile02">Upload Report</label>
                        </div>
                        <div class="input-group-append">
                          <span class="input-group-text" id="">Upload</span>
                        </div>
                    </div>

                    <a href="/sistem/monitor/details/{{ $objective->id }}/{{-- {{ $keyresult->objective_id }} --}}{{-- /{{ $deadline -> objective_id }} --}}{{-- /{{ $task -> objective_id }} --}}/crud_monitor/edit_objective" class="btn btn-primary">
                        Save
                    </a>

                </div>
            </div>
        </div>
</div>

@endsection