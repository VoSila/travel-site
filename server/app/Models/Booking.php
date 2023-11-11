<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public const ID = 'id';
    public const USER_ID = 'user_id';
    public const TOUR_ID = 'tour_id';
    public const PLACES = 'places';

    protected $fillable = [
        self::USER_ID,
        self::TOUR_ID,
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
     * @return Booking
     */
    public function setId(int $id): Booking
    {
        $this->setAttribute(self::ID, $id);
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
     * @return Booking
     */
    public function setUserId(int $userId): Booking
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
     * @param int $places
     *
     * @return Booking
     */
    public function setPlaces(int $places): Booking
    {
        $this->setAttribute(self::PLACES, $places);
        return $this;
    }

    /**
     * Get tour id
     *
     * @return int
     */
    public function getPlaces(): int
    {
        return $this->getAttribute(self::TOUR_ID);
    }

    /**
     * Set tour id
     *
     * @param int $tourId
     *
     * @return Booking
     */
    public function setTourId(int $tourId): Booking
    {
        $this->setAttribute(self::TOUR_ID, $tourId);
        return $this;
    }
}
