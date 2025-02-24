<?php
 
namespace App\Http\Requests;
 
use Illuminate\Foundation\Http\FormRequest;
 
class RegisterRequest extends FormRequest  {
 
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|required_with:cnfirm_password|same:cnfirm_password',
        ];
    }
 
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }
 
}