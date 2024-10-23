@extends('layout')

@section('content')

@include('registrar.navmenu_registrar')

<div class="container-fluid">
    <div class="row">
        <div class="col min-vh-100 py-3">
            <!-- toggler -->
            <button class="btn float-none" id="menuBtn" data-bs-toggle="offcanvas" data-bs-target="#offcanvas" role="button">
                <i class="bi bi-arrow-right-square-fill fs-3" data-bs-toggle="offcanvas" data-bs-target="#offcanvas"></i>
            </button>
            <div class="rec">
    <br>
    <br>
<h1 class="createBldgLbl">Create Building</h1>

    <form action="" method="POST">
    @csrf
    <div>
        <div class="recgray2">
            <br>
            <br>
            <br>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="name" id="bldgName" placeholder="name">
            <label for="name" id="nameLbl">Name</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" name="description" id="bldgDesc" placeholder="description">
            <label for="image" id="descLbl">Description</label>
          </div> 
        </div>
        <br>
        <button type="submit" id="createBldgBtn" id="createBldgBtn" class="btn btn-success">Create</button>   
    </div>
</form>
</div>
        </div>
    </div>
</div>

@endsection