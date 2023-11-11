<?php

namespace App\Http\Requests\Reviews;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    public const STATUS = 'status';
    public const RATING = 'rating';
    public const USER_ID = 'user_id';
    public const TOUR_ID = 'tour_id';
    public const TEXT = 'text';

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            self::RATING => 'required',
            self::TEXT => 'required',
        ];
    }

    /**
     * Get status
     *
     * @return int
     */
    public function getStatus(): int
    {
        return 0;
    }

    /**
     * Get rating
     *
     * @return int
     */
    public function getRating(): int
    {
        return $this->get(self::RATING);
    }

    /**
     * Get user id
     *
     * @return int
     */
    public function getUserId(): int
    {
        return auth()->id();
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

    /**
     * Get text
     *
     * @return string
     */
    public function getText(): string
    {
        return $this->get(self::TEXT);
    }
}
