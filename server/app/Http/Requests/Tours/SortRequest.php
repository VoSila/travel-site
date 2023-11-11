<?php

namespace App\Http\Requests\Tours;

use Illuminate\Foundation\Http\FormRequest;

class SortRequest extends FormRequest
{
    public const ORDER_BY = 'orderBy';
    public const PRICE = 'price';


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            self::ORDER_BY => 'required',
        ];
    }

    /**
     * Get date
     *
     * @return string
     */
    public function getOrderBy(): string
    {
        return $this->get(self::ORDER_BY);
    }
}
