<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class DivisiRequest extends FormRequest
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
        $id = $this->route('divisi') ?? '';
        return [
            'nama_divisi' => 'required|string|max:100|unique:divisis,nama_divisi,' . $id,
            'ketua' => 'required|string|max:100',
            'keterangan' => 'required|string',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'nama_divisi' => trim($this->nama_divisi),
            'ketua' => trim($this->ketua),
            'keterangan' => trim($this->keterangan),
        ]);
    }
}
