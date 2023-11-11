<?php

namespace App\Http\Controllers\Tour;


use App\Http\Controllers\Controller;
use App\Http\Requests\Tours\BookingRequest;
use App\Http\Requests\Tours\SortRequest;
use App\Http\Requests\Tours\TourRequest;
use App\Repository\Tour\BookingsRepository;
use App\Repository\Tour\ToursRepository;
use App\Services\ReviewsService;
use App\Services\ToursService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;


class TourController extends Controller
{
    /**
     * @var ToursRepository
     */
    private ToursRepository $toursRepository;

    /**
     * @var BookingsRepository
     */
    private BookingsRepository $bookingsRepository;

    /**
     * @var ReviewsService
     */
    private ReviewsService $reviewsService;

    /**
     * @var ToursService
     */
    private ToursService $toursService;

    /**
     * @param ToursRepository $toursRepository
     * @param ReviewsService $reviewsService
     * @param ToursService $toursService
     */
    public function __construct(ToursRepository    $toursRepository,
                                ReviewsService     $reviewsService,
                                ToursService       $toursService,
                                BookingsRepository $bookingsRepository
    )
    {
        $this->toursRepository = $toursRepository;
        $this->reviewsService = $reviewsService;
        $this->toursService = $toursService;
        $this->bookingsRepository = $bookingsRepository;
    }

    /**
     * @return  View|Factory
     */
    public function allData(): View|Factory
    {
        $tours = $this->toursRepository->allData();
        $this->toursService->changeDate($tours);

        $classPrice = '';
        $classDate = '';

        return view('index', ['data' => $tours, 'classDate' => $classDate, 'classPrice' => $classPrice]);
    }

    /**
     * @param TourRequest $request
     *
     * @return View
     */
    public function tours(TourRequest $request): View
    {
        $tour = $this->toursRepository->findById($request->getId());
        $reviews = $this->toursRepository->findReviewById($request->getId());

        $overallRating = $this->reviewsService->getRatingOfReviews($reviews);

        return view('tours/tours', ['data' => $tour, 'reviews' => $reviews, 'overallRating' => $overallRating]);
    }

    /**
     * @param SortRequest $request
     *
     * @return View
     */
    public function sort(SortRequest $request): View
    {
        $classPrice = '';
        $classDate = '';

        if ($request->getOrderBy() == 'price-low') {
            $tours = $this->toursRepository->sortLowPrice();
            $classPrice = 'active';
        } elseif ($request->getOrderBy() == 'date-new') {
            $tours = $this->toursRepository->sortNewDate();
            $classDate = 'active';
        }

        $this->reviewsService->changeDate($tours);

        return view('index', ['data' => $tours, 'classDate' => $classDate, 'classPrice' => $classPrice]);
    }

    /**
     * @param BookingRequest $request
     *
     * @return JsonResponse
     */
    public function booking(BookingRequest $request): JsonResponse
    {
        $places = $this->toursService->getPlaces(
            $request->getId(),
            $request->getPlaces()
        );

        if ($places == 'no-places' || $request->getPlaces() == 0) {
            return response()->json([
                'status' => 'error',
                'message' => 'Упс.. столько мест нету'
            ], 400);
        }

        $this->toursRepository->places(
            $request->getId(),
            $places
        );

        $this->bookingsRepository->create(
            auth()->id(),
            $request->getId(),
            $request->getPlaces()
        );

        return response()->json([
            'status' => 'success',
            'message' => 'Места забронированы'
        ], 200);
    }
}
