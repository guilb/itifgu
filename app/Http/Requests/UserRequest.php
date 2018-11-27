<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class UserRequest extends FormRequest
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
        $id = $this->user ? ',' . $this->user->id : '';
        return $rules = [
            'firstname' => 'required',
            'name' => 'required',
            'email' => 'required|unique:users,email',
            #'password' => 'required',
            #'customer_number' => 'required',
            'address' => 'required',
            'zipcode' => 'nullable',
            'city' => 'nullable',
            'country' => 'nullable',
            'phone' => 'nullable',
            'parking_id' => 'required|exists:parkings,id',
            'role' => 'required',
        ];
    }
}

