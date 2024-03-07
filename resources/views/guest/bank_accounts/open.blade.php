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

<div class="col-md-6">
    <form action="/bank_accounts/open" method="post">

        {{ csrf_field() }}
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">نام:</label>
            <input type="text" class="form-control" id="name" placeholder="نام" name="name" value="{{ old('name') }}">
        </div>
        <div class="mb-3 mt-3">
            <label for="mobile" class="form-label">موبایل :</label>
            <input type="text" class="form-control" id="mobile" placeholder="موبایل" name="mobile" value="{{ old('mobile') }}">
        </div>
        <div class="mb-3 mt-3">
            <label for="national_code" class="form-label">کد ملی:</label>
            <input type="text" class="form-control" id="national_code" placeholder="کد ملی" name="national_code" value="{{ old('national_code') }}">
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">ایمیل :</label>
            <input type="email" class="form-control" id="email" placeholder="ایمیل" name="email" value="{{ old('email') }}">
        </div>
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">نوع حساب :</label>
            <select class="custom-select" name="type">
                <option value="0">قرض الحسنه</option>
                <option value="1">دسته چک</option>
                <option value="2">وام</option>
                <option value="3">سپرده</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">رمز عبور :</label>
            <input type="password" class="form-control" id="password" placeholder="رمز عبور" name="password" value="{{ old('password') }}">
        </div>
        <button type="submit" class="btn btn-primary">افتتاح حساب</button>
    </form>

</div>

@endsection