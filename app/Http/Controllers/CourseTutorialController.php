<?php

namespace App\Http\Controllers;

use App\Models\CourseTutorial;
use App\Http\Requests\StoreCourseTutorialRequest;
use App\Http\Requests\UpdateCourseTutorialRequest;
use Illuminate\Support\Facades\Auth;

class CourseTutorialController extends Controller
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
    public function store(StoreCourseTutorialRequest $request)
    {
        $oldTutorials = CourseTutorial::where('course_id', $request->course)
            ->get();
        
        if ($oldTutorials->count() > 0) {
            foreach ($oldTutorials as $oldTutorial) {
                $oldTutorial->delete();
            }
        }

        foreach ($request->input() as $key => $value) {
            if ($key === '_token' || empty($value)) continue;

            CourseTutorial::create([
                'user_id' => Auth::user()->id,
                'course_id' => $request->course,
                'tutorial_uniqid' => $value
            ]);
        }

        session()->flash('portal_status', 'Course updated successfully.');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(CourseTutorial $courseTutorial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CourseTutorial $courseTutorial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseTutorialRequest $request, CourseTutorial $courseTutorial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CourseTutorial $courseTutorial)
    {
        //
    }
}
