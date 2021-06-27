@extends('layouts.app')

@section('content')

    @csrf
<div class="container">
    <div class="container-fluid" style="margin-left: 1.3em; margin-top: 2em">
        
        <div class="card" style="width: 30rem;">
            <div class="card-body">
                <h5 class="card-title"> {{ $product -> product_name }} </h5>
                <h6 class="card-subtitle mb-2 text-muted"> {{ $team -> team_name }} </h6>
                <p class="card-text"> {{ $product -> product_details}} </p>


                <a href="{{ $product -> product_id }}/edit_product" class="btn btn-primary">Edit</a>
              
                <form action="{{ $product-> prodcut_id }}" method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger"> Delete </button>
                </form>

            </div>
          </div>

    </div>
</div>
@endsection
