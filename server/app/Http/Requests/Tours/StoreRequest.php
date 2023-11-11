<?php

namespace App\Http\Requests\Tours;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public const ID = 'id';
    public const IMAGE = 'img';
    public const TITLE = 'title';
    public const PREVIEW = 'preview';
    public const DESCRIPTION = 'description';
    public const DATE = 'date';
    public const PRICE = 'price';
    public const TIME = 'time';

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            self::ID => 'required|integer',
            self::TITLE => 'required',
            self::PREVIEW => 'required',
            self::DESCRIPTION => 'required',
            self::DATE => 'required',
            self::PRICE => 'required',
            self::TIME => 'required',
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
     * Get id
     *
     * @return string|null
     */
    public function getImage(): string|null
    {
        return $this->get(self::IMAGE);
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->get(self::TITLE);
    }

    /**
     * Get preview
     *
     * @return string
     */
    public function getPreview(): string
    {
        return $this->get(self::PREVIEW);
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->get(self::DESCRIPTION);
    }

    /**
     * Get date
     *
     * @return string
     */
    public function getDate(): string
    {
        return $this->get(self::DATE);
    }

    /**
     * Get price
     *
     * @return int
     */
    public function getPrice(): int
    {
        return $this->get(self::PRICE);
    }

    /**
     * Get time
     *
     * @return string
     */
    public function getTime(): string
    {
        return $this->get(self::TIME);
    }
}
