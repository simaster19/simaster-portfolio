<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            "foto" => ["image", "mimes:jpg,png,webp"],
            "nama" => ["required"],
            "email" => ["required"],
            "username" => ["required"],
            "tanggal_lahir" => ["required"],
            "no_hp" => ["required", "numeric"],
            "alamat" => ["required"]
        ];
    }

    public function messages()
    {
        return [
            "foto.image" => "File harus berupa gambar!",
            "nama.required" => "Nama tidak boleh kosong!",
            "email.required" => "Email tidak boleh kosong!",
            "username.required" => "Username tidak boleh kosong!",
            "username.unique" => "Username sudah digunakan!",
            "no_hp.required" => "No hp tidak boleh kosong!",
            "no_hp.numeric" => "Anda tidak memasukkan angka!",
            "alamat.required" => "Alamat tidak boleh kosong!"
        ];
    }
}
