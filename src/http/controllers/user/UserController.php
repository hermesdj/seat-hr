<?php

namespace Cryocaustik\SeatHr\http\controllers\user;

use Cryocaustik\SeatHr\models\SeatHrProfile;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Seat\Web\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index($character = null): RedirectResponse
    {
        if (!$character) {
            $profile = SeatHrProfile::firstOrCreate(['user_id' => Auth::user()->id]);
            $character = $profile->user->main_character_id;
        }

        return redirect()->route('seat-hr.profile.sheet', ['character' => $character]);
    }

    public function intel(): View|Factory|Application
    {
        return view('seat-hr::user.intel');
    }

    public function sheet(): View|Factory|Application
    {
        return view('seat-hr::user.sheet');
    }
}
