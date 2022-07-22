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
            <input type="date" name='birthday' class='form-control' value="{{ date('Y-m-d', strtotime($user->birthday))}}"

            >
        </div>
        <div class='form-group'>
            <label for="">SDT</label>
            <input type="text" name='phone' class='form-control'value="{{$user->phone}}">
        </div>
        <div class='form-group'>
            <label for="">Ảnh đại diện</label>
            <input type="file" name='avatar' class='form-control' value="{{$user->avatar}}">

        </div>
        <div class="form-group">
            <label for="">Ảnh trước đấy nè:</label>
            <img src="{{asset('images/users/'. $user->avatar)}}" width="150px" height="100px" alt="">
        </div>
        <div class='form-group'>
            <label for="">Phòng ban</label>
            <select name="room_id" class='form-control'>
                @foreach ($room as $item)
                    <option value="{{$item->id}}" {{isset($user)&& $user->room_id === $item->id ? 'selected':''}}>{{$item->name}}</option>
                @endforeach
            </select>
        </div>
        <div class='form-group'>
            <label for="">Quyền</label>
            <input type="radio" @if ($item->role == 1)
                {{'checked'}}
            @endif name='role' value="1">GĐ
            <input type="radio" @if ($item->role == 0)
                {{'checked'}}
            @endif name='role' value="0">NV
        </div>
        <div class='form-group'>
            <label for="">Trạng thái</label>
            <input type="radio" @if ($item->status == 1)
                {{'checked'}}
            @endif name='status' value="1">Kích hoạt
            <input type="radio" @if ($item->status == 0)
                {{'checked'}}
            @endif name='status' value="0">K kích hoạt
        </div>

        <div>
            <button class='btn btn-primary'>Lưu</button>

        </div>



    </form>
@endsection
