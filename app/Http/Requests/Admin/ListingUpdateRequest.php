<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ListingUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'image' => ['image', 'max:5000'],
            'thumbnail_image' => [ 'image', 'max:5000'],
            'title' => ['required', 'string', 'max:255','unique:listings,title,'.$this->listing],
            'category' => ['required','integer'],
            'location' => ['required','integer'],
            'address' => ['required','string','max:255'],
            'phone' => ['required','string','max:255'],
            'email' => ['required','string','max:255'],
            'website' => ['nullable'],
            'facebook_link' => ['nullable'],
            'x_link' => ['nullable'],
            'linkedin_link' => ['nullable'],
            'whatsapp_link' => ['nullable'],
            'file' => ['nullable','mimes:png,jpg,csv,pdf','max:10000'],
            'amenities.*' => ['integer','max:255'],
            'description' => ['required'],
            'google_map_emded_code' => ['nullable'],
            'seo_title' => ['nullable','string','max:255'],
            'seo_description' => ['nullable','string','max:255'],
            'status' => ['required','boolean'],
            'is_verified' => ['required','boolean'],
            'is_featured' => ['required','boolean']
        ];
    }
}
