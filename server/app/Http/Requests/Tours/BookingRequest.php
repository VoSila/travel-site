<?php

namespace App\Http\Requests\Tours;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
    public const ID = 'id';
    public const PLACES = 'places';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            self::ID => 'required',
            self::PLACES => 'required',
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
     * Get places
     *
     * @return int
     */
    public function getPlaces(): int
    {
        return $this->get(self::PLACES);
    }
}
