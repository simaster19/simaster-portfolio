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
      "foto" => ["image","mimes:jpg,png,webp"],
      "nama" => ["required"],
      "email" => ["required"],
      "username" => ["required"],
      "tanggal_lahir" => ["required"],
      "no_hp" => ["required"],
      "alamat" => ["required"]
    ];
  }
}