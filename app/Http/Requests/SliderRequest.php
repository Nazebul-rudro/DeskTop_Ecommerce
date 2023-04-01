<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
        $slidersvalidationRole = 'mimes:png,jpg';
        if ($this->isMethod('post')) {
            // dd('Post Method');
            $slidersvalidationRole = 'required |' . $slidersvalidationRole;
        }
        return [
            //

            "SliderName" => 'required',
            "SliderTitle" => 'required',
            "SliderDatials" =>  ['required', 'min:50', 'max:80'],
            "SliderImage" => $slidersvalidationRole,
        ];
    }
}
