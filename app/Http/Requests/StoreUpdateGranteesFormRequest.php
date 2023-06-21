<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateGranteesFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->id ?? '';

        $rules = [
            'name' => 'required|string|max:255|min:3',
            'email' => [
                 'required',
                 'email',
                 "unique:grantees,email,{$id},id",
            ],
            'whatsapp' => [
                 'required',
                 'max:15',
            ],
            'age' => [
                'required',
                'min:2',
                'max:2',
            ],
            'ward' => [
                'required',
            ],
            'date' => [
                'required',
            ],
            'blood' => [
                'required',
           ],
           'priority' => [
               'required',
          ],
          'amount' => [
              'required',
         ],
         'location' => [
             'required',
        ]

        ];


        return $rules;
    }


}