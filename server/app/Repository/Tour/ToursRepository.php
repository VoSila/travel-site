<?php

namespace App\Repository\Tour;

use App\Models\Tour as TourModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class ToursRepository
{
    /**
     * @return Collection
     */
    public function allData(): Collection
    {
        return TourModel::all();
    }

    /**
     * Save note model
     *
     * @param TourModel $tours
     *
     * @return TourModel
     */
    private function save(TourModel $tours): TourModel
    {
        $tours->save();
        return $tours;
    }

    /**
     * Find review model by id tour
     *
     * @param int $id
     *
     * @return Collection
     */
    public function findReviewById(int $id): Collection
    {
        return TourModel::query()
            ->select('reviews.*', 'users.name')
            ->join('reviews', 'tours.id', '=', 'reviews.tour_id')
            ->join('users', 'reviews.user_id', '=', 'users.id')
            ->where('tours.id', $id)
            ->where('reviews.status', 1)
            ->get();
    }

    /**
     * Find tour model by id
     *
     * @param int $id
     * @return TourModel|Model|null
     */
    public function findById(int $id): TourModel|Model|null
    {
        return TourModel::query()
            ->where(TourModel::ID, '=', $id)
            ->first();
    }

    /**
     * Sorting price
     *
     * @return Collection|array
     */
    public function sortLowPrice(): Collection|array
    {
        return TourModel::query()
            ->orderBy('price', 'ASC')
            ->get();
    }

    /**
     * Sorting date
     *
     * @return Collection|array
     */
    public function sortNewDate(): Collection|array
    {
        return TourModel::query()
            ->orderBy('date', 'ASC')
            ->get();
    }

    /**
     * Change in the number of seats
     *
     * @return void
     */
    public function places(int $id, int $places): void
    {

        /** @var TourModel $tour */
        if ($tour = TourModel::query()->find($id)) {
            $tour->setPlaces($places);

            $this->save($tour);
        }
    }

    /**
     * Getting the number of seats in the tour
     *
     * @param $id
     *
     * @return Collection|array
     */
    public function placesValue($id): Collection|array
    {
        return TourModel::query()
            ->select('places')
            ->where(TourModel::ID, '=', $id)
            ->get();
    }

    /**
     * Creating a tour reservation
     *
     * @param $id
     *
     * @return Collection|array
     */
    public function creatingReservation($id): Collection|array
    {
        return TourModel::query()
            ->select('places')
            ->where(TourModel::ID, '=', $id)
            ->get();
    }
}
