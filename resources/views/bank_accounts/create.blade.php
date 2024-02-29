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
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="/bank_accounts" method="post">
        @csrf
        <div class="mb-3 mt-3">
            <label for="name" class="form-label">صاحب حساب:</label>
            <select class="form-control" id="user_id" name="user_id">
                @foreach ($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3 mt-3">
            <label for="roles" class="col-sm-3 control-label">نوع حساب</label>

                <select class="custom-select" name="type">
                    <option value="0">قرض الحسنه</option>
                    <option value="1">دسته چک</option>
                    <option value="2">وام</option>
                    <option value="3">سپرده</option>
                </select>
        </div>
        <div class="mb-3 mt-3">
            <label for="account_number" class="form-label">شماره حساب:</label>
            <input type="number" class="form-control" id="account_number" placeholder="شماره حساب..." name="account_number" value="{{ old('account_number') }}">
        </div>
        <div class="mb-3 mt-3">
            <label for="sheba" class="form-label">شماره شبا:</label>
            <input type="number" class="form-control" id="sheba" placeholder="شماره شبا..." name="sheba" value="{{ old('sheba') }}">
        </div>
        <div class="mb-3 mt-3">
            <label for="cart" class="form-label">شماره کارت:</label>
            <input type="number" class="form-control" id="cart" placeholder="شماره کارت..." name="cart" value="{{ old('cart') }}">
        </div>
        <button type="submit" class="btn btn-primary">ارسال</button>
        <a href="/bank_accounts" class="btn btn-info">لیست حساب ها</a>
    </form>

</div>


@endsection