<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class KegiatanRequest extends FormRequest
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
        return [
            'nama_kegiatan' => 'required|string|max:100',
            'tanggal' => 'required|date_format:Y-m-d',
            'lokasi' => 'required|string|max:100',
            'deskripsi' => 'required|string',
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'nama_kegiatan' => trim($this->nama_kegiatan),
            'lokasi' => trim($this->lokasi),
            'deskripsi' => trim($this->deskripsi),
        ]);
    }
}
