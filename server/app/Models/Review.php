<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public const ID = 'id';
    public const STATUS = 'status';
    public const RATING = 'rating';
    public const USER_ID = 'user_id';
    public const TOUR_ID = 'tour_id';
    public const TEXT = 'text';

    protected $fillable = [
        self::STATUS,
        self::RATING,
        self::USER_ID,
        self::TOUR_ID,
        self::TEXT
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
     * @return Review
     */
    public function setId(int $id): Review
    {
        $this->setAttribute(self::ID, $id);
        return $this;
    }

    /**
     * Get status
     *
     * @return int
     */
    public function getStatus(): int
    {
        return $this->getAttribute(self::STATUS);
    }

    /**
     * Set status
     *
     * @param int $status
     *
     * @return Review
     */
    public function setStatus(int $status): Review
    {
        $this->setAttribute(self::STATUS, $status);
        return $this;
    }

    /**
     * Get rating
     *
     * @return int
     */
    public function getRating(): int
    {
        return $this->getAttribute(self::RATING);
    }

    /**
     * Set rating
     *
     * @param int $rating
     *
     * @return Review
     */
    public function setRating(int $rating): Review
    {
        $this->setAttribute(self::RATING, $rating);
        return $this;
    }

    /**
     * Get user id
     *
     * @return int
     */
    public function getUserId(): int
    {
        return $this->getAttribute(self::USER_ID);
    }

    /**
     * Set user id
     *
     * @param int $userId
     *
     * @return Review
     */
    public function setUserId(int $userId): Review
    {
        $this->setAttribute(self::USER_ID, $userId);
        return $this;
    }

    /**
     * Get tour id
     *
     * @return int
     */
    public function getTourId(): int
    {
        return $this->getAttribute(self::TOUR_ID);
    }

    /**
     * Set tour id
     *
     * @param int $tourId
     *
     * @return Review
     */
    public function setTourId(int $tourId): Review
    {
        $this->setAttribute(self::TOUR_ID, $tourId);
        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText(): string
    {
        return $this->getAttribute(self::TEXT);
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return Review
     */
    public function setText(string $text): Review
    {
        $this->setAttribute(self::TEXT, $text);
        return $this;
    }
}
