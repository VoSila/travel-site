<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EditReviewRequest;
use App\Repository\Admin\AdminReviewsRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class AdminReviewController extends Controller
{

    /**
     * @var AdminReviewsRepository
     */
    private AdminReviewsRepository $adminReviewsRepository;

    /**
     * @param AdminReviewsRepository $adminReviewsRepository
     */
    public function __construct(AdminReviewsRepository $adminReviewsRepository)
    {
        $this->adminReviewsRepository = $adminReviewsRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return array|false|Application|Factory|View|mixed
     */
    public function reviewsIndex(): mixed
    {
        $reviews = $this->adminReviewsRepository->FindTours();

        return view('admin.reviews.reviews', ['data' => $reviews]);
    }

    /**
     * Add true to best column
     *
     * @param EditReviewRequest $request
     *
     * @return RedirectResponse
     */
    public function reviewsStatus(EditReviewRequest $request): RedirectResponse
    {
        $this->adminReviewsRepository->changeTheStatus($request->getId());

        return redirect()
            ->route('admin.reviews')
            ->with('success', 'Статус отзыва изменен');
    }
}
