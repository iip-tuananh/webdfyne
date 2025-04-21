<?php

namespace App\Http\Requests\ProductVariant;

use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class ProductVariantUpdateRequest extends BaseRequest
{
    /**
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
        $rules = [
            'sizeQuantities' => 'array|required',
            'product_id' => 'required|exists:products,id',
            'selectedColor' => 'array|required',
        ];

        return $rules;
    }

}
