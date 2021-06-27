@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card"> 
            <div class="card-header">
                New Objective
            </div>
            <div class="card-body">
                <form method="POST" action="/sistem/monitor/index/{{$team->id}}">
                    @csrf   
                    <div class="form-group row">
                        <label for="newObjective" class="col-md-4 col-form-label text-md-right">Objective</label>
                        <div class="col-md-6">
                            <input type="text" id=newObjective name="objective_name" class="form-control @error ('objective_name') is-invalid @enderror">
                                @error('objective_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="newObjective" class="col-md-4 col-form-label text-md-right">Objective Details</label>
                        <div class="col-md-6">
                            <textarea id=newObjective name="objective_details" class="form-control"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="newKeyresult" class="col-md-4 col-form-label text-md-right">Start Date</label>
                        <div class="col-md-6">
                            <input type="date" id=newKeyresult name="date" class="form-control">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="newKeyresult" class="col-md-4 col-form-label text-md-right">Final Date</label>
                        <div class="col-md-6">
                            <input type="date" id=newKeyresult name="until" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary">Save</button>
                            <a href="/sistem/monitor/index/{{ $team->id }}"><input type="button" class="btn btn-danger" value="Cancel"></a>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>



@endsection

{{-- use this if add objective, keyresult and task in one page
    
    <div id="dynamicAddRemove">
                        <div class="form-group row">
                            <label for="newKeyresult" class="col-md-4 col-form-label text-md-right">Keyresult</label>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <input type="text" id=newKeyresult name="moreFields[0][keyresult_name]" class="form-control">
                                    <div class="input-group-append">  
                                        <button type="button" name="add" id="add-btn" class="btn btn-success btn-outline-secondary">+</button>
                                    </div>

                                    <script type="text/javascript">
                                        var i = 0;
                                        $("#add-btn").click(function(){
                                        ++i;
                                        $("#dynamicAddRemove").append('<div id="kr" class="form-group row"><label for="newKeyresult" class="col-md-4 col-form-label text-md-right">Keyresult</label><div class="col-md-6"><div class="input-group mb-3"><input type="text" name="moreFields['+i+'][keyresult_name]" class="form-control"><div class="input-group-append"><button type="button" class="btn btn-danger remove-tr">-</button></div></div></div></div><div>');
                                        });
                                        $(document).on('click', '.remove-tr', function(){  
                                        $(this).parents("#kr").remove();
                                        });  
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="dynamicAddRemovetk">
                        <div class="form-group row">
                            <label for="newtask" class="col-md-4 col-form-label text-md-right">Inisiative</label>
                            <div class="col-md-6">
                                <div class="input-group mb-3">
                                    <input type="text" id=newKeyresult name="moreFields[0][task_name]" class="form-control">
                                    <div class="input-group-append">  
                                        <button type="button" name="add" id="add-btntk" class="btn btn-success btn-outline-secondary">+</button>
                                    </div>

                                    <script type="text/javascript">
                                        var i = 0;
                                        $("#add-btntk").click(function(){
                                        ++i;
                                        $("#dynamicAddRemovetk").append('<div id="tk" class="form-group row"><label for="newKeyresult" class="col-md-4 col-form-label text-md-right">Inisiative</label><div class="col-md-6"><div class="input-group mb-3"><input type="text" name="moreFields['+i+'][task_name]" class="form-control"><div class="input-group-append"><button type="button" class="btn btn-danger remove-tk">-</button></div></div></div></div><div>');
                                        });
                                        $(document).on('click', '.remove-tk', function(){  
                                        $(this).parents("#tk").remove();
                                        });  
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div> --}}
