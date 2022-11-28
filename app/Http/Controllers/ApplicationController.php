<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $experiences = [
            'Less than a year',
            '1-2 years',
            '2-4 years',
            '4-7 years',
            '7-10 years',
            '10+ years'
        ];

        return view('apply-form')->with('experiences', $experiences);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedStoreApplication = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'experience' => 'required|string',
            'message' => 'required',
            'cv' => 'required|mimes:pdf|max:2048',
            'remote' => 'required|string',
            'job_id' => 'required|string'
        ]);

        $fileTemp = $request->file('cv');
        if ($fileTemp->isValid()) {
            $fileExtension = $fileTemp->getClientOriginalExtension();
            $fileName = Str::random(4). '.'. $fileExtension;
            $path = $fileTemp->storeAs(
                'public/documents',
                $fileName
            );
        }

        if (!$validatedStoreApplication) {
            return redirect(route('jobs.apply'))
                    ->withErrors($validatedStoreApplication)->withInput();
        }

        $applicationArray = [
            'user_id' => auth()->user()->id,
            'name' => $validatedStoreApplication['name'],
            'email' => $validatedStoreApplication['email'],
            'experience' => $validatedStoreApplication['experience'],
            'message' => $validatedStoreApplication['message'],
            'cv' => $path,
            'remote' => $validatedStoreApplication['remote']
        ];

        $job = Job::where('id', (int) $validatedStoreApplication['job_id'])->first();

        if(!$job->applications) {
            $job->applications = [];
        }

        $filteredApplications = array_filter($job->applications, function ($application) {

            return $application['user_id'] !== auth()->user()->id;
        });

        $job->applications = [...$filteredApplications, $applicationArray];

        $job->save();

        session()->flash('msg', 'Application submitted successfully');

        return redirect(url('/jobs'));
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index($id) {
        $job = Job::findOrFail($id);

        return view('application-show', compact('job'))
            ->with('i', (request()->input('page', 1) - 1) * 6);
    }
}
