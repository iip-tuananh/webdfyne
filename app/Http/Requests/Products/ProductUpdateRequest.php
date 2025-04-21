<?php

namespace App\Http\Requests\Products;

use App\Http\Requests\BaseRequest;
use Illuminate\Validation\Rule;

class ProductUpdateRequest extends BaseRequest
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
        $rules =[
            'name' => 'required|unique:products,name,'.$this->route('id').",id",
            'cate_id' => 'required|exists:categories,id',
            'body' => 'nullable',
            'price' => 'required|integer',
            'base_price' => 'required|integer',
            'features' => 'required',
            'model_sizes' => 'required',
            'delivery_note' => 'nullable',
            'size_ids' => 'required|array',
        ];

        return $rules;
    }

}
