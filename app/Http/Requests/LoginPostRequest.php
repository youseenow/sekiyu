<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginPostRequest extends FormRequest
{

    // ==================== ▼▼▼ ログインフォームのバリデーション ▼▼▼ ====================
    public function rules()
    {
        return [
            'login_id' => ['required', 'max:16'],
            'password' => ['required', 'max:72'],
        ];
    }


    // ==================== ▼▼▼ エラーメッセージ ▼▼▼ ====================
    public function messages()
    {
        return [
            "login_id.required" => "IDは必須項目です。",
            "password.required" => "パスワードは必須項目です。",
        ];
    }
}
