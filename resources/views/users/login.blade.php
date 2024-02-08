@extends('master')

@section('content')


@if(isset($error))
<div class="alert alert-danger">
    <ul>
        <li>{{ $error }}</li>
    </ul>
</div>
@endif
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<div class="card card-primary">
<form action="/login" method="post">
    {{ csrf_field() }}
        <div class="card-body">
            <div class="form-group">
                <label for="mobile">موبایل : </label>
                <input type="text" class="form-control" id="mobile" placeholder="9362919101" name="mobile" value="{{ old('mobile') }}">
            </div>
            <div class="form-group">
                <label for="password">رمز عبور : </label>
                <input type="password" class="form-control" id="password" placeholder="رمز عبور" name="password" value="{{ old('password') }}">
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">ورود</button>
        </div>
    </form>
</div>



@endsection