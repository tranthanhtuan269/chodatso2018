<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateYeucaunhaRequest extends Request {

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
		return [
                    'tinh' => 'required',
                    'tam_tien' => 'required|numeric|min:100',
                ];
	}

	public function messages()
  	{
	    return [
	        'tam_tien.required'  => 'Quý khách không nên bỏ trống thông số tầm tiền.',
	        'tam_tien.numeric'  => 'Quý khách cần điền tầm tiền bằng số.',
                'tam_tien.min'  => 'Tầm tiền Quý khách muốn mua quá bé.',
	    ];
  	}
}