<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    public const ID = 'id';
    public const IMAGE = 'img';
    public const COORDINATES = 'coordinates';
    public const BEST = 'best';
    public const TITLE = 'title';
    public const PREVIEW = 'preview';
    public const DESCRIPTION = 'description';
    public const TIME = 'time';
    public const DATE = 'date';
    public const PRICE = 'price';
    public const PLACES = 'places';

    protected $fillable = [
        self::IMAGE,
        self::COORDINATES,
        self::TIME,
        self::TITLE,
        self::PREVIEW,
        self::DESCRIPTION,
        self::DATE,
        self::PRICE,
        self::PLACES
    ];

    /**
     * Get id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->getAttribute(self::ID);
    }

    /**
     * Set id
     *
     * @param int $id
     *
     * @return Tour
     */
    public function setId(int $id): Tour
    {
        $this->setAttribute(self::ID, $id);
        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage(): string
    {
        return $this->getAttribute(self::IMAGE);
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return Tour
     */
    public function setImage(string $image): Tour
    {
        $this->setAttribute(self::IMAGE, $image);
        return $this;
    }

    /**
     * Get coordinates
     *
     * @return string
     */
    public function getCoordinates(): string
    {
        return $this->getAttribute(self::COORDINATES);
    }

    /**
     * Set coordinates
     *
     * @param string $coordinates
     *
     * @return Tour
     */
    public function setCoordinates(string $coordinates): Tour
    {
        $this->setAttribute(self::COORDINATES, $coordinates);
        return $this;
    }

    /**
     * Get time
     *
     * @return string
     */
    public function getTime(): string
    {
        return $this->getAttribute(self::TIME);
    }

    /**
     * Set time
     *
     * @param string $time
     *
     * @return Tour
     */
    public function setTime(string $time): Tour
    {
        $this->setAttribute(self::TIME, $time);
        return $this;
    }

    /**
     * Get best
     *
     * @return int
     */
    public function getBest(): int
    {
        return $this->getAttribute(self::BEST);
    }

    /**
     * Set best
     *
     * @param int $best
     *
     * @return Tour
     */
    public function setBest(int $best): Tour
    {
        $this->setAttribute(self::BEST, $best);
        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->getAttribute(self::TITLE);
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Tour
     */
    public function setTitle(string $title): Tour
    {
        $this->setAttribute(self::TITLE, $title);

        return $this;
    }

    /**
     * Get preview
     *
     * @return string
     */
    public function getPreview(): string
    {
        return $this->getAttribute(self::PREVIEW);
    }

    /**
     * Set preview
     *
     * @param string $preview
     *
     * @return Tour
     */
    public function setPreview(string $preview): Tour
    {
        $this->setAttribute(self::PREVIEW, $preview);

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->getAttribute(self::DESCRIPTION);
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Tour
     */
    public function setDescription(string $description): Tour
    {
        $this->setAttribute(self::DESCRIPTION, $description);

        return $this;
    }

    /**
     * Get date
     *
     * @return string
     */
    public function getDate(): string
    {
        return $this->getAttribute(self::DATE);
    }

    /**
     * Set date
     *
     * @param string $date
     *
     * @return Tour
     */
    public function setDate(string $date): Tour
    {
        $this->setAttribute(self::DATE, $date);
        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice(): string
    {
        return $this->getAttribute(self::PRICE);
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return Tour
     */
    public function setPrice(string $price): Tour
    {
        $this->setAttribute(self::PRICE, $price);
        return $this;
    }

    /**
     * Get places
     *
     * @return int
     */
    public function getPlaces(): int
    {
        return $this->getAttribute(self::PLACES);
    }

    /**
     * Set places
     *
     * @param int $places
     *
     * @return Tour
     */
    public function setPlaces(int $places): Tour
    {
        $this->setAttribute(self::PLACES, $places);
        return $this;
    }
}
