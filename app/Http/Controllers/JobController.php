<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $jobs = Job::latest()->paginate(6);

        if (!request()->is('admin/*')) {
            return view('list', compact('jobs'))
                ->with('i', (request()->input('page', 1) - 1) * 6);
        }

        return view('jobs.index', compact('jobs'))
            ->with('i', (request()->input('page', 1) - 1) * 6);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $validatedStoreUser = $request->validate([
            'title' => 'required|string|max:255',
            'company' => 'required|string',
            'description' => 'required',
            'salary_range' => 'required|regex:/^[0-9]{3,5}[\s]?[-][\s]?[0-9]{3,5}$/u',
            'location' => 'required|string',
            'tags' => 'required|string',
            'expires_at' => 'required|date'
        ]);

        if (!$validatedStoreUser) {
            return redirect(route('jobs.create'))
                    ->withErrors($validatedStoreUser)->withInput();
        }

        $tagsArray = explode(',', $validatedStoreUser['tags']);

        $validatedStoreUser['tags'] = $tagsArray;
        
        Job::create($validatedStoreUser);

        session()->flash('msg', 'Job created successfully');

        return redirect(route('jobs.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function show($id)
    {
        $job = Job::find($id);
        return view('user.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $job = Job::find($id);

        return view('jobs.edit', compact('job'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $validatedUpdateUser = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'company' => 'required|string',
            'expires_at' => 'required|date'
        ]);

        $job = Job::find($id);

        $job->update($validatedUpdateUser);

        session()->flash('msg', 'Job updated successfully');

        return redirect(route('jobs.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $job = Job::find($id);

        $job->delete();

        session()->flash('errorMsg', 'Job deleted successfully');

        return redirect(route('jobs.index'));
    }
}
