@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-bordered">
        <tr>
            <th>File</th>
            <th>Donwload</th>
        </tr>
        @foreach($report as $report)
        <tr> 
            <th>{{ $report->name }}</th>
            <th><a href="{{route('sistem.report.download', [$team->id, $objective->id, $report->name])}}">Donwload Now</a></th>  
        </tr>
        @endforeach
    </table>
</div>
@endsection
