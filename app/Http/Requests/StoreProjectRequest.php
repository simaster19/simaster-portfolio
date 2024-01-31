<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProjectRequest extends FormRequest
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
    public function rules(): array
    {
        return
            [
                // "cover" => ["required", "mimes:jpg,png,webp"],
                // "image" => ["required", "mimes:jpg,png,webp"],
                "jenis_project" => ["required"],
                "judul" => ["required", "min:5"],
                "nama_client" => ["required"],
                "dibuat_dengan" => ["required"],
                "status" => ["required"]

            ];
    }
}
