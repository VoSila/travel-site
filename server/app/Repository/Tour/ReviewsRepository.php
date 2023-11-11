<?php

namespace App\Repository\Tour;

use App\Models\Review;

//use Illuminate\Database\Eloquent\Builder;
//use Illuminate\Database\Eloquent\Model;


class ReviewsRepository
{
//    /**
//     *  * Find review model by id
//     *
//     * @param int $id
//     *
//     * @return Model|Builder|null
//     */
//    public function findById(int $id): Model|Builder|null
//    {
//        return ReviewModel::query()
//            ->where(ReviewModel::ID, '=', $id)
//            ->first();
//    }

    /**
     * Create new review model
     *
     * @param int $rating
     * @param int $userId
     * @param int $tourId
     * @param string $text
     *
     * @return Review
     */
    public function create(int $rating, int $userId, int $tourId, string $text): Review
    {

        $review = new Review();
        $review->setStatus(0)
            ->setUserId($userId)
            ->setTourId($tourId)
            ->setRating($rating)
            ->setText($text);

        return $this->save($review);
    }

    /**
     * Save user model
     *
     * @param Review $review
     *
     * @return Review
     */
    private function save(Review $review): Review
    {
        $review->save();
        return $review;
    }


}
