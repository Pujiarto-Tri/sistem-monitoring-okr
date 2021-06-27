@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1>Remove Objective</h1>
            
        <table class="table table-dark table-striped">
            <thead>
                <tr class="title" style="font-weight: bold">
                    <td scope="col">Objective Name</td>
                </tr>
            </thead>
            <tbody> 

                {{-- @foreach($objective as $obj) --}}  
                <tr>
                    <td scope="row">
                        place holder
                    </td>
                </tr>
                {{-- @endforeach --}}

            </tbody>
        </table>  

        <button class="btn btn-danger" type="submit">Delete Objective</button>
        <a href=index><input type="button" class="btn btn-danger" value="Cancel"></a>
    </div>
    
@endsection