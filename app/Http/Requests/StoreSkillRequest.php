<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSkillRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            "nama_skill" => ["required"],
            "level" => ["required"],
            "type" => ["required"]
        ];
    }

    // public function messages(): array
    // {
    //     return [
    //         "nama_skill.required" => "Nama skill tidak boleh kosong!",
    //         "level.required" => "Level tidak boleh kosong!",
    //         "type.required" => "Type tidak boleh kosong!"
    //     ];
    // }
}
