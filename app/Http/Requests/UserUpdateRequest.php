<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // điều kiện để có thể gửi yêu cầu đi
        // nếu false là không có quyền gửi yêu cầu 403
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'avatar' => 'file',
            'birthday' => 'required|date',
            'username' => 'required|min:8'

        ];
    }
    // custome validation
    public function messages()
    {
        return [
            'name.required' => 'Mầy ngu lắm tên bắt buộc nhập',
        ];
    }
}
