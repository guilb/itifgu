<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class OrderRequest extends FormRequest
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
        $id = $this->order ? ',' . $this->order->id : '';
        return $rules = [
            'category_id' => 'required|exists:categories,id',
            'product_id' => 'required|exists:products,id',
            'parking_id' => 'required|exists:parkings,id',
            'user_id' => 'required|exists:users,id',
            'quantity' => 'nullable|integer',
            'unit_price' => 'nullable|numeric',
            'float_price' => 'nullable|numeric',
            'delay' => 'nullable|string|max:255',
            'status' => 'required',
        ];
    }
}

