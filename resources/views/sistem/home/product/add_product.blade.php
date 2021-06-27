@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    
                    <div class="card-header">
                        Add new Product
                    </div>

                        <div class="card-body">
                    
                            <form method="POST" action="/sistem/home/index">
                                @csrf
                            
                                <div class="form-group row">
                                    <label for="productName" class="col-md-4 col-form-label text-md-right">Product Name</label>
                                    <div class="col-md-6">
                                        <input type="text" id="productName" name="product_name" class="form-control @error ('product_name') is-invalid @enderror" >
                                            @error('product_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label for="productDetails" class="col-md-4 col-form-label text-md-right">Product Details</label>
                                    <div class="col-md-6">
                                        <input type="text" id="productName" name="product_details" class="form-control" >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="productDetails" class="col-md-4 col-form-label text-md-right">Assign Existing Team</label>
                                    <div class="col-md-6">
                                        <select class="form-control" id="sel1">
                                            @foreach ($team as $t)
                                            <option> {{ $t -> team_name }} </option>
                                            @endforeach
                                          </select>
                                    </div>
                                </div>
                                
                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                        <a href="/sistem/home/index"><button type="button" class="btn btn-danger">Cancel</button></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                </div>
            </div>   
        </div>
    </div>
    

@endsection