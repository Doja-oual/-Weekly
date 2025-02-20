<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategorieRequest extends FormRequest {
    public function authorize() {
        return true; // Adjust if authorization is needed
    }

    public function rules() {
        return [
            'nom' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $this->route('id'),
        ];
    }
}