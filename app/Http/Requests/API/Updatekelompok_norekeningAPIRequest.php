<?php

namespace App\Http\Requests\API;

use App\Models\kelompok_norekening;
use InfyOm\Generator\Request\APIRequest;

class Updatekelompok_norekeningAPIRequest extends APIRequest
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
        $rules = kelompok_norekening::$rules;
        
        return $rules;
    }
}
