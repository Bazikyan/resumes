<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Resumes</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    
    <style type="text/css">
        .wrapper {
            margin: 0 auto;
            width: 75%;
            margin-left: 20px;
            margin-top: 10px;
            float: left;
        }
    </style>
</head>
<body>
   
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <div class="navbar-brand">Resumes</div>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{ route('home') }}">Search</a></li>
                <li><a href="{{ route('store') }}">Upload</a></li>
            </ul>
        </div>
    </nav>
   
    <div class="col-md-5">
        
            @yield('form')
              
    </div>
    
    @yield('footer')
 
</body>
</html>