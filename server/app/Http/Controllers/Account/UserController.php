<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\UserEditRequest;
use App\Http\Requests\Tours\BookingCancelRequest;
use App\Repository\Account\UsersRepository;
use App\Repository\Tour\BookingsRepository;
use App\Repository\Tour\ToursRepository;
use App\Services\ToursService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;

class UserController extends Controller
{
    /**
     * @var UsersRepository
     */
    private UsersRepository $usersRepository;

    /**
     * @var BookingsRepository
     */
    private BookingsRepository $bookingsRepository;

    /**
     * @var ToursRepository
     */
    private ToursRepository $toursRepository;

    /**
     * @var ToursService
     */
    private ToursService $toursService;


    /**
     * @param UsersRepository $usersRepository
     * @param BookingsRepository $bookingsRepository
     * @param ToursRepository $toursRepository
     * @param ToursService $toursService
     */
    public function __construct(UsersRepository    $usersRepository,
                                BookingsRepository $bookingsRepository,
                                ToursRepository    $toursRepository,
                                ToursService       $toursService
    )
    {
        $this->usersRepository = $usersRepository;
        $this->bookingsRepository = $bookingsRepository;
        $this->toursRepository = $toursRepository;
        $this->toursService = $toursService;
    }

    public function profile()
    {
        $user = $this->usersRepository->findById(auth()->id());
        $bookings = $this->getBookings();

        return view('account/profile', ['data' => $user, 'bookings' => $bookings]);
    }

    /**
     * Receiving user bookings
     *
     * @return Collection
     */
    public function getBookings(): Collection
    {
        $bookingsId = $this->bookingsRepository->getId(auth()->id());
        $bookings = collect();

        foreach ($bookingsId as $bookingId) {
            $booking = $this->bookingsRepository->findById($bookingId->id);
            $bookings->push($booking);
        }
        return $bookings;
    }

    /**
     * Cancellation user bookings
     *
     * @param BookingCancelRequest $request
     *
     * @return RedirectResponse
     */
    public function cancelBookings(BookingCancelRequest $request): RedirectResponse
    {
        $places = $this->bookingsRepository->getPlaces($request->getId());
        $calcPlaces = $this->toursService->getCancelPlaces($request->getTourId(), $places->avg('places'));
        $this->toursRepository->places($request->getTourId(), $calcPlaces);
        $this->bookingsRepository->delete($request->getId());

        return redirect()
            ->route('profile')
            ->with('success', 'Бронь отменена');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param UserEditRequest $request
     *
     * @return RedirectResponse
     */
    public function editProfile(UserEditRequest $request): RedirectResponse
    {
        $idUser = auth()->id();
        $existingImage = $this->usersRepository->getImageById($idUser);
        $image = $existingImage->image;
        $imagePath = $request->hasFile('img') ? $request->file('img')->store('profile', 'public') : $image;

        $this->usersRepository->edit(
            $idUser,
            $imagePath,
            $request->getName(),
            $request->getSurame(),
            $request->getCity(),
            $request->getEmail(),
        );

        return redirect()
            ->route('profile')
            ->with('success', 'Редактирование прошло успешно');
    }
}
