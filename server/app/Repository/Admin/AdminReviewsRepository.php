<?php

namespace App\Repository\Admin;

use App\Models\Review as ReviewModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Model;

class AdminReviewsRepository
{

    /**
     * Find the all reviews
     *
     * @return LengthAwarePaginator
     */
    public function FindTours(): LengthAwarePaginator
    {
        return ReviewModel::query()
            ->select('reviews.id as review_id', 'reviews.status', 'reviews.rating', 'reviews.text', 'users.name', 'tours.title')
            ->join('users', 'reviews.user_id', '=', 'users.id')
            ->join('tours', 'reviews.tour_id', '=', 'tours.id')
            ->latest('reviews.created_at')
            ->paginate(10);
    }

    /**
     * Find review model by id
     *
     * @param int $id
     *
     * @return ReviewModel|Model|null
     */
    public function findById(int $id): ReviewModel|Model|null
    {
        return ReviewModel::query()
            ->where(ReviewModel::ID, '=', $id)
            ->first();
    }

    /**
     * Save review model
     *
     * @param ReviewModel $review
     *
     * @return void
     */
    private function save(ReviewModel $review): void
    {
        $review->save();
    }

    /**
     * Delete review model
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
     * change review "status"
     *
     * @param int $id
     *
     * @return Void
     */
    public function changeTheStatus(int $id): void
    {
        if ($review = $this->findById($id)) {

            if (!$review->getStatus()) {
                $review->setStatus(true);

            } else {
                $review->setStatus(false);
            }
            $this->save($review);
        }
    }
}
