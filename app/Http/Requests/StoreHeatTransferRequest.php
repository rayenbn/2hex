<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHeatTransferRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'design_name' => 'required|string|max:255',
            'transparency' => 'required|boolean',
            'colors' => 'nullable|string|max:255',
            'colors_count' => 'integer',
            'cmyk' => 'boolean',
            'heat_transfer' => 'nullable|string',
            'small_preview' => 'required|string|max:255',
            'large_preview' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'size' => 'required|string|max:255',
            'price' => 'required|numeric',
            'total' => 'required|numeric',
            'reorder_at' => 'nullable|date',
            'reorder' => 'required|boolean',
            'size_margin' => 'numeric'
        ];
    }
}
