<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all(); // k nên sử dụng nếu dữ liệu lớn phải tối ưu bằng cách khác
        // $users = User::select()->get(); select những thứ mà ta cần và lấy ra toàn bộ
        return \view('admin.user.index', \compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = Room::select('id', 'name')->get();
        return \view('admin.user.create', \compact('rooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 1. Khởi tạo đối tượng user mới
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'avatar' => 'file',
            'birthday' => 'required|date',
            'username' => 'required|min:8'
        ]);
        $user = new User();
        // 2. Cập nhật giá trị cho các thuộc tính của $user
        // $user->name = $request->name;
        // $user->phone = $request->phone;
        $user->fill($request->all()); // đặt name ở form cùng giá trị với thuộc tính
        // 3. Xử lý file avatar gửi lên
        // if ($request->hasFile('avatar')) {
        //     Nếu trường avatar có file thì sẽ trả về true
        //     3.1 Xử lý tên file
        //     $avatar = $request->avatar;
        //     $avatarName = $avatar->hashName();
        //     $avatarName = $request->username . '_' . $avatarName;
        //     dd($avatar->storeAs('images/users', $avatarName));
        //     3.2 Lưu file và gán đường dẫn cho $user->avatar
        //     $user->avatar = $avatar->storeAs('images/users', $avatarName);
        //     storage/app/images/users
        //     Cấu hình config/filesystems.php để public/images ~ storage/app/images
        //     Chạy câu lệnh: php artisan storage:link
        // } else {
        //     $user->avatar = '';
        // }
        if($request->hasFile('avatar')){
            $file = $request->avatar;
            $ext = $file->getClientOriginalExtension();
            $filename = \time().'.'.$ext;
            $file->storeAs('images/users', $filename);
            $user->avatar = $filename;
        }
        else{
            $user->avatar = '';
        }
        // 4. Lưu
        $user->save();

        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $rooms = Room::select('id', 'name')->get();
        return \view('admin.user.edit', [
            'user' => $user,
            'room' => $rooms
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $user)
    {
        $user = User::find($user);
        $user->fill($request->all());
        // \dd($user);
        if($request->hasFile('avatar')){
            $path = 'images/users/'. $user->avatar;
            if(File::exists($path)){
                File::delete($path);
            }
            $file = $request->avatar;
            $ext = $file->getClientOriginalExtension();
            $filename = \time().'.'.$ext;
            $file->storeAs('images/users', $filename);
            $user->avatar = $filename;
        }
        // else{
        //     $user->avatar = '';
        // }
        // \dd($user);
        $user->update();
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return \redirect()->back();
    }
}
