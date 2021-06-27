<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>New Objective</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-2">
        <div class="container-fluid">
        {{-- <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button> --}}
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/sistem/home/index">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/sistem/home/account/account_details">Account</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/">Logout</a>
            </li>
            </ul>
        </div>
        </div>
    </nav>

    <div class="container-fluid" style="margin-left: 1.3em; margin-top: 2em">
        <h1>New Objective</h1>
   <!--
    <script>
        function createKeyResultField() {
            var input = document.createElement('input');
            input.type ='text';
            input.name = 'keyresult';
            return input;
        }
        var inputField = document.getElementById('inputForm');
        document.getElementById('newKeyResultButton').addEventListener('click', function(e) {form.appendChild(createKeyResultField());
        });

    </script>
    -->
    <div class="row">
        <div class="col-sm">
            <form method="POST" action="/sistem/monitor/index">
                @csrf   
                <script>
                    function add()
                    {
                        var new_chq_no = parseInt($('#total_chq').val())+1;
                        var new_input="<input type='text' id='new_kr' name='keyresult_name' placeholder='New Key Result...'"+new_chq_no+"'>";
                        $('#inputForm').append(new_input);
                        $('#total_chq').val(new_chq_no)
                    }
                </script>

                <div class="form-group">
                    <label for="newObjective" class="form-label">Objective</label>
                        <input type="text" id=newObjective name="objective_name" class="form-control"{{-- "@error ('objective_name') is-invalid @enderror" --}}></input>
                            {{-- @error
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror --}}
                </div>
                <div class="form-group">
                    <label for="newKeyresult" class="form-label">Keyresult</label>
                        <input type="text" id=newKeyresult name="keyresult_name" class="form-control"></input>
                </div>
                <div class="form-group">
                    <input type="button" id=newKeyResultButton name=new_kr_add_btn class="btn btn-dark" value="Add new Key Result" onclick=add()>

                            {{-- <select name=selectQuarter id=selectQuarter class=quarter_select>
                                <option value="quarter1">Quarter 1</option>
                                <option value="quarter2">Quarter 2</option>
                                <option value="quarter3">Quarter 3</option>
                                <option value="quarter4">Quarter 4</option>
                            </select> --}}
                            <!--Quarter button
                                        <input type="button" id=select_quarter_button name=select_quarter value="Select Quarter">
                            -->
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href=index><input type="button" class="btn btn-danger" value="Cancel"></a>
                </div>
                
            </form>
        </div>
        <div class="col-sm"></div>
    </div>


    <!-- the code snipets for adding new text field
        function add(){
      var new_chq_no = parseInt($('#total_chq').val())+1;
      var new_input="<input type='text' id='new_"+new_chq_no+"'>";
      $('#new_chq').append(new_input);
      $('#total_chq').val(new_chq_no)
    }
    function remove(){
      var last_chq_no = $('#total_chq').val();
      if(last_chq_no>1){
        $('#new_'+last_chq_no).remove();
        $('#total_chq').val(last_chq_no-1);
      }
    }

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <input type="text">
    <button onclick="add()">Add</button>
    <button onclick="remove()">remove</button>
    <div id="new_chq"></div>
    <input type="hidden" value="1" id="total_chq">

    -->
</div>
</body>
</html>