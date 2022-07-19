@extends('admin.layout.master')
@section('title','quản lí người dùng ')
@section('content-title', 'quản lí người dùng')
@section('content')
<div class='my-3'>
    <a href="{{route('users.create')}}">
        <button class='btn btn-success'>Tạo mới</button>
    </a>
</div>
    <table class="table">
        <thead>
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Name
                </th>
                <th>
                    Email
                </th>
                <th>
                    Username
                </th>
                {{-- <th>
                    Birthday
                </th> --}}
                <th>
                    Phone
                </th>
                <th>
                    Role
                </th>
                <th>
                    Status
                </th>
                <th>
                    Room_name
                </th>
                <th>Avatar</th>
                <th>Hành động</th>
            </tr>
        </thead>
        @foreach ($users as $item)
        <tbody>
            <tr>
                <td>
                    {{$item->id}}
                </td>
                <td>
                    {{$item->name}}
                </td>
                <td>
                    {{$item->email}}
                </td>
                <td>
                    {{$item->username}}
                </td>
                <td>
                    {{$item->phone}}
                </td>
                <td>
                    {{$item->role}}
                </td>
                <td>
                    {{$item->status==1?'hiện':'ẩn'}}
                </td>
                <td>
                    {{$item->room->name}}

                </td>
                <td><img src="{{asset('images/users/'.$item->avatar)}}" alt="" width="100"></td>
                <td>
                    <a class="btn btn-primary" href="{{ route('users.edit', $item->id) }}">Sửa</a>
                    <form
                        action="{{route('users.destroy', $item->id)}}"
                        method="post"
                    >
                        @csrf
                        @method('DELETE')
                        <button class='btn btn-danger'>Xoá</button>
                    </form>
                </td>
            </tr>

        </tbody>
        @endforeach
    </table>
@endsection
