<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class AnggotaRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $id = $this->route('anggota') ?? '';
        return [
            'nama' => 'required|string|max:100',
            'nim' => 'required|string|max:15|unique:anggotas,nim,' . $id,
            'jurusan' => 'required|string|max:100',
            'jabatan' => 'required|string|max:100',
            'no_hp' => ['required', 'string', new \App\Rules\IndonesianPhoneNumber],
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        // Bersihkan spasi berlebih dan hilangkan karakter non-digit dari no_hp (kecuali +)
        $this->merge([
            'nama' => trim($this->nama),
            'nim' => trim($this->nim),
            'jurusan' => trim($this->jurusan),
            'jabatan' => trim($this->jabatan),
            'no_hp' => preg_replace('/[^\d+]/', '', $this->no_hp),
        ]);
    }

    /**
     * Handle a passed validation attempt.
     */
    protected function passedValidation(): void
    {
        // Mengubah format nama menjadi Title Case setelah validasi berhasil
        $this->merge([
            'nama' => ucwords(strtolower($this->nama)),
        ]);
    }
}
