<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DeleteTourRequest;
use App\Http\Requests\Admin\EditTourRequest;
use App\Http\Requests\Admin\StoreTourRequest;
use App\Http\Requests\Tours\TourRequest;
use App\Repository\Admin\AdminToursRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminTourController extends Controller
{

    /**
     * @var AdminToursRepository
     */
    private AdminToursRepository $adminToursRepository;

    /**
     * @param AdminToursRepository $adminToursRepository
     */
    public function __construct(AdminToursRepository $adminToursRepository)
    {
        $this->adminToursRepository = $adminToursRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return array|false|Application|Factory|View|mixed
     */
    public function index(): mixed
    {
        $tours = $this->adminToursRepository->FindTours();

        return view('admin.tours.listTours', ['data' => $tours]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.tours.createTour');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTourRequest $request
     * @return RedirectResponse
     */
    public function store(StoreTourRequest $request): RedirectResponse
    {
        $imagePath = $request->file('img') ? $request->file('img')->store('tours', 'public') : null;

        $this->adminToursRepository->create(
            $imagePath,
            $request->getCoordinates(),
            $request->getTitle(),
            $request->getPreview(),
            $request->getDescription(),
            $request->getDate(),
            $request->getTime(),
            $request->getPrice(),
        );

        return redirect()
            ->route('admin.tour.create')
            ->with('success', 'good');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param TourRequest $request
     *
     * @return View
     */
    public function edit(TourRequest $request): View
    {
        $tour = $this->adminToursRepository->findById($request->getId());

        return view('admin.tours.editTour', ['data' => $tour]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param EditTourRequest $request
     *
     * @return RedirectResponse
     */
    public function update(EditTourRequest $request): RedirectResponse
    {
        $existingImage = $this->adminToursRepository->getImageById($request->getId());
        $image = $existingImage->image;
        $imagePath = $request->hasFile('img') ? $request->file('img')->store('tours', 'public') : $image;

        $this->adminToursRepository->edit(
            $request->getId(),
            $imagePath,
            $request->getCoordinates(),
            $request->getTitle(),
            $request->getPreview(),
            $request->getDescription(),
            $request->getDate(),
            $request->getTime(),
            $request->getPrice(),
        );

        return redirect()
            ->route('admin.tour.list')
            ->with('success', 'Редактирование прошло успешно');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DeleteTourRequest $request
     *
     * @return RedirectResponse
     */
    public function destroy(DeleteTourRequest $request): RedirectResponse
    {
        $existingImage = $this->adminToursRepository->getImageById($request->getId());
        $image = $existingImage->image;
        if ($image) {
            unlink($image);
        }
        $this->adminToursRepository->delete($request->getId());

        return redirect()
            ->route('admin.tour.list')
            ->with('success', 'Экскурсия удалена');
    }

    /**
     * Add true to best column
     *
     * @param DeleteTourRequest $request
     *
     * @return RedirectResponse
     */
    public function addToBest(Request $request): RedirectResponse
    {

        $this->adminToursRepository->changeTheBest($request->get("id")); //аналогичный вопрос стоит ли здесь добавлять реквест ?? если их везде добавлять, то их будет очень много

        return redirect()
            ->route('admin.tour.list')
            ->with('success', 'Экскурсия добавлена в категорию "Лучшие"');
    }

    /**
     * Remove true to best column
     *
     * @param DeleteTourRequest $request
     *
     * @return RedirectResponse
     */
    public function removeFromBest(Request $request): RedirectResponse
    {

        $this->adminToursRepository->changeTheBest($request->get("id")); //аналогичный вопрос стоит ли здесь добавлять реквест ?? если их везде добавлять, то их будет очень много

        return redirect()
            ->route('admin.tour.list')
            ->with('success', 'Экскурсия убрана из категории "Лучшие"');
    }
}
