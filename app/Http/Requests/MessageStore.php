<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessageStore extends FormRequest
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
        return array_merge(
            ['description' => ['required', 'string']],
            $this->belongsTo()
        );
    }

    /**
     * Determine if the message belongs to a user or a customer.
     *
     * @return array
     */
    protected function belongsTo()
    {
        if ($this->user_id) {
            return ['user_id' => ['required', 'integer']];
        }

        return ['customer_id' => ['required', 'integer']];
    }
}
