<?php

namespace App\Http\Requests\Tours;

use Illuminate\Foundation\Http\FormRequest;

class BookingCancelRequest extends FormRequest
{
    public const ID = 'id';
    public const TOUR_ID = 'tour_id';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            self::ID => 'required',
            self::TOUR_ID => 'required',
        ];
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->get(self::ID);
    }

    /**
     * Get tour id
     *
     * @return int
     */
    public function getTourId(): int
    {
        return $this->get(self::TOUR_ID);
    }
}
