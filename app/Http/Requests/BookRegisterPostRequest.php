<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookRegisterPostRequest extends FormRequest
{

    // ==================== ▼▼▼ テクノメンテ登録のバリデーション ▼▼▼ ====================
    public function rules()
    {
        return [
            'title' => ['required', 'max:128'],
            'content' => ['max:1000'],
            'device' => ['max:1000'],
            'thumbnail' => ['required','mimes:jpeg,png,jpg,gif'],
            'pdf' => ['required'],
        ];
    }

    // ==================== ▼▼▼ エラーメッセージ ▼▼▼ ====================
    public function messages()
    {
        return [
            "title.required" => "タイトルは必須項目です。",
            "thumbnail.required" => "サムネイル画像は必須項目です。",
            "pdf.required" => "PDFは必須項目です。",
            "thumbnail.mimes" => "サムネイルは、拡張子が「PNG/JPG/GIF」の画像を指定してください。",
        ];
    }

}
