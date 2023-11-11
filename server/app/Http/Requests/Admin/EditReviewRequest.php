<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
class EditReviewRequest extends FormRequest
{
    public const ID = 'review_id';

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
            self::ID => 'required',
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
}
