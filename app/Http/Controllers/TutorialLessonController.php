<?php

namespace App\Http\Controllers;

use App\Models\TutorialLesson;
use App\Models\Tutorial;
use App\Http\Requests\StoreTutorialLessonRequest;
use App\Http\Requests\UpdateTutorialLessonRequest;
use Illuminate\Support\Facades\Auth;

class TutorialLessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTutorialLessonRequest $request)
    {
        $oldLessons = TutorialLesson::where('tutorial_id', $request->tutorial)
            ->get();
        
        if ($oldLessons->count() > 0) {
            foreach ($oldLessons as $oldLesson) {
                $oldLesson->delete();
            }
        }

        foreach ($request->input() as $key => $value) {
            if ($key === '_token' || empty($value)) continue;

            TutorialLesson::create([
                'user_id' => Auth::user()->id,
                'tutorial_id' => $request->tutorial,
                'lesson_uniqid' => $value
            ]);
        }

        session()->flash('portal_status', 'Tutorial updated successfully.');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(TutorialLesson $tutorialLesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TutorialLesson $tutorialLesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTutorialLessonRequest $request, TutorialLesson $tutorialLesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TutorialLesson $tutorialLesson)
    {
        //
    }
}
