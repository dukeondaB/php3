@extends('admin.layout.master')

@section('title', 'Tạo mới người dùng')

@section('content-title', 'Tạo mới người dùng')

@section('content')
    <form
        action="{{route('users.update', $user->id)}}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
        @method('PUT')
        <div class='form-group'>
            <label for="">Tên</label>
            <input type="text" name='name' class='form-control' value="{{$user->name}}">
        </div>
        <div class='form-group'>
            <label for="">Email</label>
            <input type="email" name='email' class='form-control' value="{{$user->email}}">
        </div>
        <div class='form-group'>
            <label for="">Mật khẩu</label>
            <input type="text" name='password' class='form-control' value="{{$user->password}}"
            >
        </div>
        <div class='form-group'>
            <label for="">Mã tài khoản</label>
            <input type="text" name='username' class='form-control' value="{{$user->username}}">
        </div>
        <div class='form-group'>
            <label for="">Ngày sinh</label>
            <input type="date" name='birthday' class='form-control' value="{{$user->birthday}}">
        </div>
        <div class='form-group'>
            <label for="">SDT</label>
            <input type="text" name='phone' class='form-control'value="{{$user->phone}}">
        </div>
        <div class='form-group'>
            <label for="">Ảnh đại diện</label>
            <input type="file" name='avatar' class='form-control'value="{{$user->image}}">
        </div>
        <div class='form-group'>
            <label for="">Phòng ban</label>
            <select name="room_id" class='form-control'>
                @foreach ($room as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class='form-group'>
            <label for="">Quyền</label>
            <input type="radio" name='role' value="1">GĐ
            <input type="radio" name='role' value="0">NV
        </div>
        <div class='form-group'>
            <label for="">Trạng thái</label>
            <input type="radio" name='status' value="1">Kích hoạt
            <input type="radio" name='status' value="0">K kích hoạt
        </div>

        <div>
            <button class='btn btn-primary'>Tạo mới</button>
            <button type='reset' class='btn btn-warning'>Nhập lại</button>
        </div>



    </form>
@endsection
