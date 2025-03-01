<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class ProductRequest extends FormRequest
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
        $id = $this->product ? ',' . $this->product->id : '';
        return $rules = [
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'delay' => 'nullable|string|max:255',
            'price' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
        ];
    }
}

