@extends('layouts.layout')       

@section('form')
        
<form action="{{ route('home') }}" method="post" >
    {{ csrf_field() }}
    <div class="form-group">
        <label for="firstName">First Name</label>
        <input type="text" class="form-control" name="firstName" id="firstName" placeholder="" value="{{ old('firstName') }}">
    </div>
    <div class="form-group">
        <label for="lastName">Last Name</label>
        <input type="text" class="form-control" name="lastName" id="lastName" placeholder="" value="{{ old('lastName') }}">
    </div>
    <div class="form-group">
        <label for="keywords">Keywords</label>
        <input type="text" class="form-control" name="keywords" id="keywords" placeholder="" value="{{ old('keywords') }}">
    </div>

    <button type="submit" class="btn btn-primary">Search</button>
</form>
<br>
               
@endsection
  
@section('footer')  
        
@if(isset($spec))
<div class="wrapper">
    <section class="panel panel-primary">
        <div class="panel-heading">
            Specialists
        </div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Keywords</th>
                    <th>Resume</th>
                </thead>
                <tbody>
                   @foreach($spec as $sp)
                    <tr>
                        <th>{{ $sp->firstName }}</th>
                        <th>{{ $sp->lastName }}</th>
                        <th>{{ $sp->keywords }}</th>
                        <th>
                            <a href="storage/resumes/{{$sp->fileName}}" download="{{ 'resume_'.$sp->firstName.'_'.$sp->lastName.'.'.pathinfo($sp->fileName, PATHINFO_EXTENSION) }}">
                                <button type="button" class="btn btn-primary">Download</button>
                            </a>
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</div>
@endif

@endsection
