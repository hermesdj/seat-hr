<?php

namespace Cryocaustik\SeatHr\http\controllers\user;

use Cryocaustik\SeatHr\models\SeatHrKickHistory;
use Cryocaustik\SeatHr\models\SeatHrProfile;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Seat\Eveapi\Models\Character\CharacterInfo;
use Seat\Web\Http\Controllers\Controller;

class KickHistoryController extends Controller
{
    public function index(): View|Factory|Application
    {
        return view('seat-hr::user.kickhistory.index');
    }

    public function create(Request $request, CharacterInfo $character): Factory|View|RedirectResponse|Application
    {
        if($request->isMethod('post'))
        {
            $data = $request->only([
                'kicked_by',
                'kicked_at',
                'reason',
            ]);

            $rules = [
                'kicked_by' => ['required'],
                'kicked_at' => ['required', 'date'],
                'reason' => ['required'],
            ];
            $validator = Validator::make($data, $rules);
            if ($validator->fails()) {
                return back()->withErrors($validator->errors());
            }

            $profile = SeatHrProfile::firstOrCreate([ 'user_id' => $character->user->id ]);
            $data['profile_id'] = $profile->id;
            $data['created_by'] = auth()->user()->id;

            SeatHrKickHistory::create($data);

            return redirect()->route('seat-hr.profile.kickhistory', ['character' => $character])
                ->with('success', 'User kick history created successfully.');
        }

        return view('seat-hr::user.kickhistory.create');
    }

    public function edit(Request $request, CharacterInfo $character, SeatHrKickHistory $kickhistory)
    {
        if($request->isMethod('post'))
        {
            $data = $request->only([
                'kicked_by',
                'kicked_at',
                'reason',
            ]);
            $rules = [
                'kicked_by' => ['required'],
                'kicked_at' => ['required', 'date'],
                'reason' => ['required'],
            ];
            $validator = Validator::make($data, $rules);
            if ($validator->fails()) {
                return back()->withErrors($validator->errors());
            }

            $kickhistory->update($data);
            return view('seat-hr::user.kickhistory.index')->with('success', 'Kick history record has been updated');

        }
        return view('seat-hr::user.kickhistory.edit', ['kickhistory' => $kickhistory]);
    }

    public function delete(CharacterInfo $character, SeatHrKickHistory $kickhistory): RedirectResponse
    {
        $kickhistory->delete();

        return redirect()->back()->with('success', 'Record has been removed from the kick history');
    }
}
