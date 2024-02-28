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

<div style="margin-top: 20px;">
        <div class="col-lg-12">
            <p>
                <a href="/bank_accounts/create" class="btn btn-info">ایجاد حساب</a>
            </p>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>کاربر مالک</th>
                    <th>شماره حساب</th>
                    <th>شماره شبا</th>
                    <th>شماره کارت</th>
                    <th>موجودی</th>
                    <th>ثبت داده ها</th>
                    <th>عملیات</th>
                </tr>
                @foreach($bankAccounts as $bankAccount)
                <tr>
                    <td>{{ $bankAccount->id }}</td>
                    <td>{{ $bankAccount->user?->name }}</td>
                    <td>{{ $bankAccount->account_number }}</td>
                    <td>{{ $bankAccount->sheba }}</td>
                    <td>{{ $bankAccount->cart }}</td>
                    <td>{{ $bankAccount->balance }}</td>
                    <td>{{ $bankAccount->created_at }}</td>
                    <td>
                    <div style="float: right; width: 88px; margin-right: 10px;"> 
                    
                    <a href="/bank_accounts/{{ $bankAccount->id }}" class="btn btn-info">ویرایش</a>
                    </div>
                    <div style="float: right; width: 70px; margin-right: 10px;"> 
                        <form action="/bank_accounts/{{ $bankAccount->id }}" method="post">
                            @method('DELETE') {{ csrf_field() }}
                            <input type="hidden" value="{{ $bankAccount->id }}">
                            <button class="btn btn-danger" type="submit">حذف</button>
                        </form>
                    </div>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>


@endsection