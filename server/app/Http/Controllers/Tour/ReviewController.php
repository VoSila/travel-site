<?php

namespace App\Http\Controllers\Tour;

use App\Http\Controllers\Controller;
use App\Http\Requests\Reviews\CreateRequest;
use App\Repository\Tour\ReviewsRepository;
use Illuminate\Http\RedirectResponse;

class ReviewController extends Controller
{
    /**
     * @var ReviewsRepository
     */
    private ReviewsRepository $reviewsRepository;

    /**
     * @param ReviewsRepository $reviewsRepository
     */
    public function __construct(ReviewsRepository $reviewsRepository)
    {
        $this->reviewsRepository = $reviewsRepository;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param CreateRequest $request
     *
     * @return RedirectResponse
     */
    public function create(CreateRequest $request): RedirectResponse
    {
        $this->reviewsRepository->create(
            $request->getRating(),
            $request->getUserId(),
            $request->getTourId(),
            $request->getText()
        );

        return redirect()
            ->route('tours')
            ->with('success', 'good');
    }
}
