@extends('layouts.app')

@section('content')

@if(Auth::user())

<div class="container">

    <div class="container-fluid">
      <h1 class="mb-4">Product List</h1>
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
                      <td scope="col">Product Name</td>
                      <td scope="col">Progress</td>
                      <td scope="col">Action</td>
                  </tr>
              </thead>
              <tbody> 

                @foreach($product as $p)

                  <tr>
                    
                      <td>
                        {{ $p -> product_name }}
                      </td>
                      <td>
                          <div class="progress">
                              <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                          </div>
                      </td>
                      <td>
                        <a href="/sistem/home/product/{{ $p -> d }}/{{ $p -> id }}" class="badge badge-primary">Details</a>
                      </td>

                  </tr>
                  @endforeach
          
              </tbody>
          </table>
          <div class="button_wraper">
              <a href="add_product"><input type="button" value="ADD PRODUCT" class="btn btn-primary"></a>
              
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
