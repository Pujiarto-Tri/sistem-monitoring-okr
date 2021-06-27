@extends('layouts.app')

@section('content')

@if(Auth::user())

<div class="ml-3 mr-3">

    @if (session('status'))
    <div class="alert alert-success">
        {{session('status')}}
    </div>
    @endif

    <div class="container" style="text-align: center;">
        <h5>Planing dan Evaluasi Badan Sistem Informasi</h5>
    </div>  

    <div class="container">
        <div>
            <h2>{{ $team->team_name }}</h2>
        </div>
    </div>
    @foreach ($objective as $objective)    
        <div class="mt-3" style="background-color: white;">
                <table class="table table-bordered" style="width=100%">
                    <tbody>
                    <tr>
                        <td></td>
                        <td class="w-50"></td>
                        <td class="w-5"></td>
                        <td> Objective fulfillment</td>
                        <td>JAN</td>
                        <td>FEB</td>
                        <td>MAR</td>
                        <td>APR</td>
                        <td>MAY</td>
                        <td>JUN</td>
                        <td>JUL</td>
                        <td>AUG</td>
                        <td>SEP</td>
                        <td>OCT</td>
                        <td>NOV</td>
                        <td>DEC</td>
                    </tr>
                    <tr>
                        <td style="font-weight:bold;">Objective</td>
                        <td>       
                            <a href="/sistem/monitor/objective/details/{{ $team->id }}/{{ $objective->id }}">
                                <div style="font-weight:bold;">{{ $objective->objective_name }}</div>
                            </a>
                        </td>
                        <td>
                            Progress
                        </td>
                        <td>
                            <div class="progress" style="height: 20px;">
                                <div class="progress-bar" role="progressbar" style="width: {{ $objective->progress}}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                            {{ $objective->progress }}%
                        </td>
                        @php
                        /* There still some bug objective quarter*/
                        $date = $objective->deadline->date;
                        $until = $objective->deadline->until;
                        $month1 = '2021-01-28';
                        $month2 = '2021-01-01';
                        $start_month = strtotime($month1);
                        $until_month = strtotime($month2);
                        for($i=1; $i<=12; $i++){
                            $sd = date('Y-m-d', $start_month);
                            $fd = date('Y-m-d', $until_month);
                            
                            if($date <= $sd && $until >= $fd){
                                echo "<td class='bg-primary'></td>";  
                            }
                            else {
                                echo "<td class='bg-secondary'></td>";
                            }
                            $start_month = strtotime('+1 month', $start_month);
                            $until_month = strtotime('+1 month', $until_month);
                            
                        }
                    @endphp
                    {{-- @php
                    $date = $objective->deadline->date;
                    $until = $objective->deadline->until;
                    @endphp
                        <td>
                            @php
                            $month1 = '2021-01-99';
                            $month2 = '2021-01-00';
                            if($date <= $month1 && $until >= $month2){
                                echo '1';
                            }
                             else {
                                 echo '0';
                            }
                            @endphp
                        </td>
                        repeat tilL DECEMBER if loop broken--}}
                    </tr> 
                    @foreach ($objective->keyresult as $keyresult)
                        <tr>
                            <td>Keyresult</td>
                            <td>
                                <a href="/sistem/monitor/keyresult/details/{{ $team->id }}/{{ $objective->id }}/{{ $keyresult->id }}">
                                    {{$keyresult->keyresult_name}}
                                </a>
                            </td>

                            <td>
                                <div class="progress" style="height: 20px;">
                                    <div class="progress-bar" role="progressbar" style="width: {{ $keyresult->progress }}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">  
                                    </div>  
                                </div>
                                {{ $keyresult->progress }}%
                            </td>
                            <td>
                            </td>
                            @php
                                /* There still some bug */
                                $date = $keyresult->deadline->date;
                                $until = $keyresult->deadline->until;
                                $month1 = '2021-01-28';
                                $month2 = '2021-01-01';
                                $start_month = strtotime($month1);
                                $until_month = strtotime($month2);
                                for($i=1; $i<=12; $i++){
                                    $sd = date('Y-m-d', $start_month);
                                    $fd = date('Y-m-d', $until_month);
                                    
                                    if($date <= $sd && $until >= $fd){
                                        echo "<td class='bg-primary'></td>";  
                                    }
                                    else {
                                        echo "<td class='bg-secondary'></td>";
                                    }
                                    $start_month = strtotime('+1 month', $start_month);
                                    $until_month = strtotime('+1 month', $until_month);
                                    
                                }
                            @endphp
                            
                        </tr>
                    @endforeach
                    @foreach($objective->task as $task)
                        <tr>
                            <td>Inisiative</td>
                            <td>
                                <a href="/sistem/monitor/task/details/{{ $team->id }}/{{ $objective->id }}/{{ $task->id }}">
                                    {{ $task->task_name}}
                                </a>
                            </td>
                            <td>
                                <div class="progress" style="height: 20px;">
                                    <div class="progress-bar" role="progressbar" style="width: {{ $task->progress }}%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                    </div>
                                </div>
                                {{ $task->progress }}%
                            </td>
                            <td>
                            </td>
                            @php
                                /* There still some bug */
                                $date = $task->deadline->date;
                                $until = $task->deadline->until;
                                $month1 = '2021-01-31';
                                $month2 = '2021-01-01';
                                $start_month = strtotime($month1);
                                $until_month = strtotime($month2);
                                for($i=1; $i<=12; $i++){
                                    $sd = date('Y-m-d', $start_month);
                                    $fd = date('Y-m-d', $until_month);
                                    
                                    if($date <= $sd && $until >= $fd){
                                        echo "<td class='bg-primary'></td>";  
                                    }
                                    else {
                                        echo "<td class='bg-secondary'></td>";
                                    }
                                    $start_month = strtotime('+1 month', $start_month);
                                    $until_month = strtotime('+1 month', $until_month);
                                    
                                }
                            @endphp
                        </tr>
                    @endforeach
                    </tbody>
            </table>

        </div>
    @endforeach
    
    
    <div class="mt-3 rounded" style="background-color: white;">
        <table class="table table-bordered">
            <tr>
                <td>Total Objective fulfillment</td>
                <td>
                    <div class="progress" style="height: 20px;">
                        <div class="progress-bar" role="progressbar" style="width: {{ $team->progress }}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                            {{ $team->progress }}%
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>


    <div class="mt-3 mb-3 container">  
        <a href="/sistem/monitor/objective/new/{{ $team->id }}"><input type="button" value="NEW OBJECTIVE" class="btn btn-primary"></a>
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