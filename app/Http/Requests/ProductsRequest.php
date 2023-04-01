<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $productssvalidationRole = 'mimes:png,jpg';
        if ($this->isMethod('post')) {
            // dd('Post Method');
            $productssvalidationRole = 'required |' . $productssvalidationRole;
        }
        return [
            //

            "ProductName" => ['required', 'min:3', 'max:25', Rule::unique('products', 'ProductName')],

            "ProductCode" => ['required'],
            "categoriesId" => ['required'],
            "ProductPrice" => ['required'],
            "DiscountPrice" => ['required'],
            "AfterDiscount" => ['required'],
            "ProductImage" =>  $productssvalidationRole,
        ];
    }
}
