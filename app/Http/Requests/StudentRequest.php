<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'full_name' => 'required|string',
            'gender' => 'required|in:P,L',
            'birth_place' => 'required|string',
            'birth_date' => 'required|date',
            'religion' => 'required|string',
            'kindergarten' => 'required|string',
            'kindergarten_address' => 'required|string',
            'home_address' => 'required|string',
            'father_name' => 'required|string',
            'father_occupation' => 'required|string',
            'father_address' => 'required|string',
            'father_birth_place' => 'required|string',
            'father_birth_date' => 'required|date',
            'mother_name' => 'required|string',
            'mother_occupation' => 'required|string',
            'mother_address' => 'required|string',
            'mother_birth_place' => 'required|string',
            'mother_birth_date' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute wajib diisi.',
            'string' => ':attribute harus berupa string.',
            'date' => ':attribute harus berupa tanggal yang valid.',
            'in' => ':attribute harus berupa salah satu dari jenis kelamin berikut: :values.',
        ];
    }

    public function attributes()
    {
        return [
            'full_name' => 'Nama lengkap',
            'gender' => 'Jenis kelamin',
            'birth_place' => 'Tempat lahir',
            'birth_date' => 'Tanggal lahir',
            'religion' => 'Agama',
            'kindergarten' => 'Taman kanak-kanak',
            'kindergarten_address' => 'Alamat taman kanak-kanak',
            'home_address' => 'Alamat rumah',
            'father_name' => 'Nama ayah',
            'father_occupation' => 'Pekerjaan ayah',
            'father_address' => 'Alamat ayah',
            'father_birth_place' => 'Tempat lahir ayah',
            'father_birth_date' => 'Tanggal lahir ayah',
            'mother_name' => 'Nama ibu',
            'mother_occupation' => 'Pekerjaan ibu',
            'mother_address' => 'Alamat ibu',
            'mother_birth_place' => 'Tempat lahir ibu',
            'mother_birth_date' => 'Tanggal lahir ibu',
        ];
    }

}
