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
                <a href="/users/create" class="btn btn-info">ایجاد کاربر</a>
            </p>
            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>نام</th>
                    <th>ایمیل</th>
                    <th>موبایل</th>
                    <th>کد ملی</th>
                    <th>ثبت داده ها</th>
                    <th>عملیات</th>
                </tr>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->mobile }}</td>
                    <td>{{ $user->national_code }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td width=250>
                      <div style="float: right; width: 88px; margin-right: 10px;">  <a href="/users/{{ $user->id }}" class="btn btn-info">ویرایش</a></div>
                      <div style="float: right;  width: 70px;"> <form action="/users/{{ $user->id }}" method="post">
                            @method('DELETE') {{ csrf_field() }}
                            <input type="hidden" value="{{ $user->id }}">
                            <button class="btn btn-danger">حذف</button>
                        </form></div>
                        <div style="float: right; width: 70px;"><a href="/permisions/{{ $user->id }}" class="btn btn-warning">نقش</a></div>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>



@endsection