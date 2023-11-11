<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
{
    public const NAME = 'name';
    public const SURNAME = 'surname';
    public const CITY = 'city';
    public const EMAIL = 'email';

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
            self::NAME => 'required',
            self::EMAIL => 'required',
        ];
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->get(self::NAME);
    }

    /**
     * Get surname
     *
     * @return string|null
     */
    public function getSurame(): string|null
    {
        return $this->get(self::SURNAME);
    }

    /**
     * Get city
     *
     * @return string|null
     */
    public function getCity(): string|null
    {
        return $this->get(self::CITY);
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail(): string
    {
        return $this->get(self::EMAIL);
    }
}
