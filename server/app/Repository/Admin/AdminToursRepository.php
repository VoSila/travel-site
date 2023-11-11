<?php

namespace App\Repository\Admin;

use App\Models\Tour as TourModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class AdminToursRepository
{

    /**
     * Find the all tours
     *
     * @return LengthAwarePaginator
     */
    public function FindTours(): LengthAwarePaginator
    {
        return TourModel::query()
            ->latest()
            ->paginate(5);
    }

    /**
     * Find image tour model by id
     *
     * @param int $id
     *
     * @return TourModel|Model|null
     */
    public function getImageById(int $id): TourModel|Model|null
    {
        return TourModel::query()
            ->select('image')
            ->where('id', $id)
            ->first();
    }

    /**
     * Find tour model by id
     *
     * @param int $id
     *
     * @return TourModel|Model|null
     */
    public function findById(int $id): TourModel|Model|null
    {
        return TourModel::query()
            ->where(TourModel::ID, '=', $id)
            ->first();
    }

    /**
     * Create new tour model
     *
     * @param string|null $image
     * @param string $coordinates
     * @param string $title
     * @param string $preview
     * @param string $description
     * @param string $date
     * @param string $time
     * @param int $price
     *
     * @return TourModel
     */
    public function create(string|null $image, string $coordinates, string $title, string $preview, string $description, string $date, string $time, int $price): TourModel
    {
        $tour = new TourModel();
        $tour->setBest(0)
            ->setImage($image)
            ->setCoordinates($coordinates)
            ->setTitle($title)
            ->setPreview($preview)
            ->setDescription($description)
            ->setDate($date)
            ->setPrice($price)
            ->setTime($time);

        return $this->save($tour);
    }

    /**
     * Edit tour model
     *
     * @param int $id
     * @param string|null $image
     * @param string $coordinates
     * @param string $title
     * @param string $preview
     * @param string $description
     * @param string $date
     * @param string $time
     * @param int $price
     *
     * @return TourModel|null
     */
    public function edit(int $id, string|null $image, string|null $coordinates, string $title, string $preview, string $description, string $date, string $time, int $price): TourModel|null
    {
        /** @var TourModel $tour */
        if ($tour = TourModel::query()->find($id)) {
            $tour->setBest(0)
                ->setImage($image)
                ->setCoordinates($coordinates)
                ->setTitle($title)
                ->setPreview($preview)
                ->setDescription($description)
                ->setDate($date)
                ->setPrice($price)
                ->setTime($time);

            $this->save($tour);
        }
        return $tour;
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
     * Delete tour model
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

    /**
     * change column "best"
     *
     * @param int $id
     *
     * @return Void
     */
    public function changeTheBest(int $id): void
    {
        if ($tour = $this->findById($id)) {

            if (!$tour->getBest()) {
                $tour->setBest(true);

            } else {
                $tour->setBest(false);
            }
            $tour->save();
        }
    }
}
