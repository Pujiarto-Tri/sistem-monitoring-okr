<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Objective Details</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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

        <h1>Objective Detils</h1>
        
        <div class="card" style="width: 30rem;">
            <div class="card-body">
                <h5 class="card-title"> {{ $objective -> objective_name }} </h5>
                <h6 class="card-subtitle mb-2 text-muted">  Deadline </h6>
                <p class="card-text">Objective details</p>
                <p class="card-text"> {{ $keyresult -> keyresult_name }} </p>
                <p class="card-text">task list</p>

                <a href="/sistem/monitor/{{ $objective -> objective_id }}/{{ $keyresult -> keyresult_id }}/crud_monitor/edit_objective" class="btn btn-primary">Edit</a>

                <form method="POST" class="d-inline">
                    @method('delete')
                    @csrf
                    <button type="submit" class="btn btn-danger"> Delete </button>
                </form>

                <button type="sumbit" class="btn btn-dark">Cancel</button>

            </div>
          </div>

    </div>

</body>
</html>