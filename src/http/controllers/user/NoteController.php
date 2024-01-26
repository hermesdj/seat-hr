<?php

namespace Cryocaustik\SeatHr\http\controllers\user;

use Cryocaustik\SeatHr\models\SeatHrNote;
use Cryocaustik\SeatHr\models\SeatHrProfile;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Seat\Eveapi\Models\Character\CharacterInfo;
use Seat\Web\Http\Controllers\Controller;

class NoteController extends Controller
{
    public function index(): View|Factory|Application
    {
        return view('seat-hr::user.note.index');
    }

    public function create(Request $request, CharacterInfo $character): View|Factory|Application|RedirectResponse
    {
        if($request->isMethod('post'))
        {
            $data = $request->only([
                'severity',
                'note',
            ]);

            $rules = [
                'severity' => ['required', 'in:info,warning,danger'],
                'note' => ['required'],
            ];
            $validator = Validator::make($data, $rules);
            if ($validator->fails()) {
                return back()->withErrors($validator->errors());
            }

            $profile = SeatHrProfile::firstOrCreate([ 'user_id' => $character->user->id ]);
            $data['profile_id'] = $profile->id;
            $data['created_by'] = auth()->user()->id;

            SeatHrNote::create($data);

            return redirect()->route('seat-hr.profile.note', ['character' => $character])
                ->with('success', 'User note created successfully.');
        }

        return view('seat-hr::user.note.create');
    }

    public function edit(Request $request, CharacterInfo $character, SeatHrNote $note)
    {
        if($request->isMethod('post'))
        {
            $data = $request->only([
                'severity',
                'note',
            ]);
            $rules = [
                'severity' => ['required', 'in:info,warning,danger'],
                'note' => ['required'],
            ];
            $validator = Validator::make($data, $rules);
            if ($validator->fails()) {
                return back()->withErrors($validator->errors());
            }

            $note->update($data);
            return view('seat-hr::user.note.index')->with('success', 'User note has been updated successfully.');

        }
        return view('seat-hr::user.note.edit', ['note' => $note]);
    }

    public function delete(CharacterInfo $character, SeatHrNote $note): RedirectResponse
    {
        $note->delete();

        return redirect()->back()->with('success', 'User note has been removed successfully.');
    }
}
