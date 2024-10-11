@extends('layout')

@section('content')
<div class="login">
<form>
  <div class="row mb-3">
    <label for="inputEmail" class="row-sm-3 row-form-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="inputEmail">
    </div>
  </div>
  <div class="row mb-3">
    <label for="inputPassword" class="row-sm-3 row-form-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword">
    </div>
  </div>
  <br>
  <button type="submit" class="btn btn-success">Login</button>
</form>
</div>
@endsection