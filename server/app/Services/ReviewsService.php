<?php

namespace App\Services;

class ReviewsService
{

    /**
     * Get an overall rating of reviews
     *
     * @param $reviews
     *
     * @return float
     */
    public function getRatingOfReviews($reviews): float
    {
        return round($reviews->avg('rating'), 1);
    }

}
