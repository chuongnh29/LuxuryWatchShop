<?php

namespace App\Http\Requests;

use App\Rules\CheckGiaGocGiaSale;
use App\Rules\CheckPositiveNum;
use App\Rules\CheckTenSP;
use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
        return [
            'tenSP' => [
                'required',
                'max:255',
                new CheckTenSP($this->tenSP, $this->id)
            ],
            'giaGoc' => [
                'required',
                'integer',
                new CheckPositiveNum($this->giaGoc,'Giá gốc')
            ],
            'giaSale' => [
                'required',
                'integer',
                new CheckPositiveNum($this->giaSale, 'Giá sale'),
                new CheckGiaGocGiaSale($this->giaGoc, $this->giaSale)
            ],
//            'anh' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'tenSP.required' => 'Nhập tên sản phẩm',
            'giaGoc.required'  => 'Nhập giá gốc',
            'giaSale.required'  => 'Nhập giá sale',
            'giaGoc.integer'  => 'Giá gốc phải là số lớn hơn 0',
            'giaSale.integer'  => 'Giá sale phải là số lớn hơn 0 và nhỏ hơn hoặc bằng giá gốc',
            'anh.image'  => 'File phải là file ảnh',
            'anh.required' => 'Phải chọn ảnh'
        ];
    }
}
