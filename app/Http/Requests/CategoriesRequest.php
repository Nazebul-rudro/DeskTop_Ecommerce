<?php

namespace App\Http\Requests;

use App\Models\categories;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoriesRequest extends FormRequest
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
        $categoriesvalidationRole = 'mimes:png,jpg';
        if ($this->isMethod('post')) {
            // dd('Post Method');
            $categoriesvalidationRole = 'required |' . $categoriesvalidationRole;
        }
        // if($this->isMethod('patch')){
        //    $categories =  categories::all();
        //     file('CategoryName') = Rule::unique('categories')->ignore($this->categories);
        // }
        return [
            //

            "CategoryName" => ['required', 'min:3', 'max:25', Rule::unique('categories', 'CategoryName')],
            "CategoryDatials" => ['required'],
            "CategoryImage" =>  $categoriesvalidationRole,

        ];
    }
}
