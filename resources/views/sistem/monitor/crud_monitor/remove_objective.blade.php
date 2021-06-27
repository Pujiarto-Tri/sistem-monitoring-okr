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

</body>
</html>