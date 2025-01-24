@extends('layout')
@include('registrar.navbar_registrar')
@section('content')
    
        <div class="sub_dashboard">
            <h1 class="subh1">Add Subject</h1>
            <form class="subform1" action="{{ route('store_subject') }}" method="POST">
        @csrf
                <div class="mb-3">
                    <label for="code" class="form-label">Code:</label>
                    <input type="text" id="code" name="code" required class="form-control2 @error('code') is-invalid @enderror" value="{{ old('code') }}">

                @error('code')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" id="name" name="name" required class="form-control2 @error('name') is-invalid @enderror" value="{{ old('name') }}">

                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                </div>

<div class="mb-3">
    <label for="description" class="form-label">Description:</label>
    <textarea id="description" name="description" class="form-control2">{{ old('description') }}</textarea>
</div>
    </div>
                <button type="submit" class="create-sub">Add</button>
            </form>
        </div>
    </div>
@endsection