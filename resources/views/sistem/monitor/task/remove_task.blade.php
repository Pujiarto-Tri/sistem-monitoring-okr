@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1>Remove Keyresult</h1>
            
        <table class="table table-dark table-striped">
            <thead>
                <tr class="title" style="font-weight: bold">
                    <td scope="col">Keyresult Name</td>
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

        <button class="btn btn-danger" type="submit">Delete Keyresult</button>
        <a href=index><input type="button" class="btn btn-danger" value="Cancel"></a>
    </div>
    
@endsection