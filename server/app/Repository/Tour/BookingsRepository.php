<?php

namespace App\Repository\Tour;

use App\Models\Booking as BookingModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BookingsRepository
{

    /**
     * Get booking id
     *
     * @param $userId
     *
     * @return Collection
     */
    public function getId($userId): Collection
    {
        return BookingModel::query()
            ->select('id')
            ->where(BookingModel::USER_ID, '=', $userId)
            ->get();
    }

    /**
     * Get number of places
     *
     * @param $id
     *
     * @return Collection
     */
    public function getPlaces($id): Collection
    {
        return BookingModel::query()
            ->select('places')
            ->where(BookingModel::ID, '=', $id)
            ->get();
    }

    /**
     *  * Find user model by id
     *
     * @param int $id
     *
     * @return Model
     */
    public function findById(int $id): Model
    {
        return BookingModel::query()
            ->select('bookings.places', 'bookings.id', 'bookings.tour_id', 'tours.title', 'tours.date')
            ->join('users', 'bookings.user_id', '=', 'users.id')
            ->join('tours', 'bookings.tour_id', '=', 'tours.id')
            ->where('bookings.id', '=', $id)
            ->first();
    }

    /**
     * Create new booking model
     *
     * @param int $userId
     * @param int $tourId
     * @param int $places
     *
     * @return BookingModel
     */
    public function create(int $userId, int $tourId, int $places): BookingModel
    {
        $booking = new BookingModel();
        $booking->setUserId($userId)
            ->setTourId($tourId)
            ->setPlaces($places);

        return $this->save($booking);
    }

    /**
     * Save user model
     *
     * @param BookingModel $booking
     *
     * @return BookingModel
     */
    private function save(BookingModel $booking): BookingModel
    {
        $booking->save();
        return $booking;
    }

    /**
     * Delete booking model
     *
     * @param int $id
     *
     * @return Void
     */
    public function delete(int $id): void
    {
        if ($tour = $this->findById($id)) {
            $tour->delete();
        }
    }
}
