<?php

namespace App\Http\Requests\API;

use App\Http\Requests\APIsRequest;
use App\Models\Post;
use Illuminate\Validation\Rule;

class UpdatePostAPIRequest extends APIsRequest
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
        $data = [$this->route('user_id'), $this->route('website_id')];
        $uniqueRule =  Rule::unique('user_subscribe_website')->where(function ($query) use ($data){
            $query->where('website_id', $data['website_id']);
            $query->where('user_id', $data['user_id']);
        });
        $rules = [
            'website_id' => [$uniqueRule],
        ];

        return $rules;
    }
}
