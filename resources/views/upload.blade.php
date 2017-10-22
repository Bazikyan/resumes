@extends('layouts.layout') 
    
@section('form')          
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors as $error)
                <li>{{ $error[0] }}</li>
            @endforeach
        </ul>
    </div>
@endif


<form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="firstName">First Name</label>
        <input type="text" class="form-control" name="firstName" id="firstName">
    </div>
    <div class="form-group">
        <label for="lastName">Last Name</label>
        <input type="text" class="form-control" name="lastName" id="lastName">
    </div>
    <div class="form-group">
        <label for="keywords">Keywords</label>
        <input type="text" class="form-control" name="keywords" id="keywords">
    </div>
    <div class="form-group">
        <label for="file">Resume</label>
        <input type="file" class="btn btn-default" name="file" id="file" value="">
    </div>

    <button type="submit" class="btn btn-primary">Upload</button>
</form>
<br>

@if(isset($saved))
    <div class="alert alert-success">{{ $saved }}</div>
@endif
        
@endsection