<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpecialofferRequest extends FormRequest
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

        $specialofferrerquest =  'mimes:png,jpg';
        if ($this->isMethod('post')) {
            $specialofferrerquest = 'required |' . $specialofferrerquest;
        }
        return [
            //
            "OfferName" => 'required',
            "OfferDiscount" => ['integer', 'required'],
            "OfferImage" => $specialofferrerquest
        ];
    }
}
