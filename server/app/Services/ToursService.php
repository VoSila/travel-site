<?php

namespace App\Services;

use App\Repository\Tour\ToursRepository;

class ToursService
{

    /**
     * @var ToursRepository
     */
    private ToursRepository $toursRepository;

    /**
     * @param ToursRepository $toursRepository
     */
    public function __construct(ToursRepository $toursRepository)
    {
        $this->toursRepository = $toursRepository;
    }

    /**
     * Calculation of the number of seats (booking)
     *
     * @param $id
     * @param $places
     * @return float|bool|int
     */
    public function getPlaces($id, $places): float|bool|int
    {
        $placesCollection = $this->toursRepository->placesValue($id);
        $placesValue = $placesCollection->avg('places');
        $calculations = $placesValue - $places;

        if ($calculations < 0) {
            return 'no-places';
        } else {
            return $calculations;
        }
    }

    /**
     * Calculation of the number of seats (cancel booking)
     *
     * @param $id
     * @param $places
     * @return float|bool|int
     */
    public function getCancelPlaces($id, $places): float|bool|int
    {
        $placesCollection = $this->toursRepository->placesValue($id);
        $placesValue = $placesCollection->avg('places');

        return $placesValue + $places;
    }

    /**
     *  Changes the month of a date to a text version (Russian)
     *
     * @param $tours
     *
     * @return void
     */
    public function changeDate($tours): void
    {
        $dates = $tours->pluck('date');

        $monthNames = [
            '01' => 'января',
            '02' => 'февраля',
            '03' => 'марта',
            '04' => 'апреля',
            '05' => 'мая',
            '06' => 'июня',
            '07' => 'июля',
            '08' => 'августа',
            '09' => 'сентября',
            '10' => 'октября',
            '11' => 'ноября',
            '12' => 'декабря',
        ];

        foreach ($dates as $key => $date) {
            $d1 = strtotime($date);
            $formattedDate = date("d-m", $d1);
            $month = date("m", $d1);

            $formattedMonth = $monthNames[$month] ?? $month;
            $formattedDate = str_replace($month, $formattedMonth, $formattedDate);
            $formattedDate2 = str_replace('-', ' ', $formattedDate);

            $dates[$key] = $formattedDate2;
        }

        $tours->map(function ($tour, $key) use ($dates) {
            $tour->date = $dates[$key];
            return $tour;
        });
    }
}
