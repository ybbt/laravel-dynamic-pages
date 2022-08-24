<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;

class EditePageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        Log::build([
            'driver' => 'single',
            'path' => storage_path('logs/custom.log'),
        ])->info($this->page->id);
        return [
            'title' => ['string', 'required'],
            'slug' => ['string', 'required', 'unique:pages,slug,'.$this->page->id],
            'content' => ['string', 'required'],
        ];
    }
}
