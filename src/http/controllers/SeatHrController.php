<?php

namespace Cryocaustik\SeatHr\http\controllers;

use Cryocaustik\SeatHr\http\datatables\CorporationDataTable;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Seat\Web\Http\Controllers\Controller;


class SeatHrController extends Controller
{
    public function about(): View|Application|Factory
    {
        return view('seat-hr::about');
    }

    public function config(CorporationDataTable $dataTable)
    {
        return $dataTable->render('seat-hr::configuration.config');
    }
}
