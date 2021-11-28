@extends('layouts.app')
@section('content')
<div class="panel panel-primary" style='text-align: center;'>
  <div class="panel-heading center">
  <h2>How to Upload File or Image and save in Database in Laravel 8</h2></div>
    <div class="panel-body">
   
      @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block" style='width:319px'>
          <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
      @endif   
  
      @if (count($errors) > 0)
        <div class="alert alert-danger">
          <strong>Whoops!</strong> There were some problems with your input.
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif
  <!-- this Form to Add new file or Image  -->
      <form action="{{ route('file.upload.post') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-6">
              this is that input to add image in Template
            <input type="file" name="file" class="form-control">
          </div>
          <div class="col-md-6">
            <button type="submit" class="btn btn-success">Upload</button>
          </div>
        </div>
      </form>
  
      </div><br>
      <!-- by this below code we can Show all datas from Table -->
        @if($products)
          @foreach ($products as $product)
            <img src="uploads/{{ $product->photo }}" width= '155'     height= '117px;'>
          @endforeach 
        @endif
      </div>

@endsection