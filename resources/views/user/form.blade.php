@extends('layouts.content')

@section('content')
<h2>Tambah User</h2>
<form method="POST" action="{{ route('user.store') }}">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
          </div>
          @error('name')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
      <div class="form-group col-md-6">
        <label for="">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
      </div>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

            <div class="form-group col-md-6">
                <label for="role">Role</label>
                <select class="form-control @error('role') is-invalid @enderror" name="role" required>
                    <option value="">Pilih Role</option>
                    <option value="admin">Admin</option>
                    <option value="staff">Staff</option>
                    <option value="kepsek">Kepsek</option>
                </select>
                @error('role')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

      <div class="form-group col-md-6">
        <label for="inputPassword4">Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
      </div>
        @error('password')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    {{-- <div class="form-group">
      <label for="inputAddress">Address</label>
      <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
    </div>
    <div class="form-group">
      <label for="inputAddress2">Address 2</label>
      <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputCity">City</label>
        <input type="text" class="form-control" id="inputCity">
      </div>
      <div class="form-group col-md-4">
        <label for="inputState">State</label>
        <select id="inputState" class="form-control">
          <option selected>Choose...</option>
          <option>...</option>
        </select>
      </div>
      <div class="form-group col-md-2">
        <label for="inputZip">Zip</label>
        <input type="text" class="form-control" id="inputZip">
      </div>
    </div>
    <div class="form-group">
      <div class="form-check">
        <input class="form-check-input" type="checkbox" id="gridCheck">
        <label class="form-check-label" for="gridCheck">
          Check me out
        </label>
      </div>
    </div> --}}
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
