<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
        return [
            "cover" => ["image", "mimes:jpg,png,webp"],
            "image" => ["image", "mimes:jpg,png,webp"],
            "jenis_project" => ["required"],
            "judul" => ["required", "min:5"],
            "dibuat_dengan" => ["required"],
            "status" => ["required"]
        ];
    }
    public function messages()
    {
        return [
            "cover.image" => "File harus berupa gambar!",
            "image.image" => "File harus berupa gambar!",
            "jenis_project.required" => "Jenis project tidak boleh kosong!",
            "dibuat_dengan.required" => "Dibuat dengan tidak boleh kosong!",
            "status" => "Status tidak boleh kosong!"
        ];
    }
}
