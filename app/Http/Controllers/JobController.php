<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    //methods:
    private function findJob($id)
    {
        // Find the job with the specified id
        $job = Job::findOrFail($id);

        if ($job == null) {
            // Return a 404 response
            abort(404, "Job not found");
        }

        return $job;
    }

    // - index: list all jobs
    public function index()
    {
        // dd(request('tag'));
        // dd = dump and die, it is a helper function to dump a variable's contents to the browser and prevent the script from continuing

        return view('jobs.index', [
            'jobs' => Job::latest()->filter(request(['tag', 'search']))->paginate(10)
        ]);
    }

    // - show: show a single job
    public function show($id)
    {
        // Find the job with the specified id
        $job = $this->findJob($id);

        if ($job == null) {
            // Return a 404 response
            abort(404, "Job not found");
        }

        // Return the view
        return view('jobs.show', [
            'title' => $job['title'],
            'job' => $job
        ]);
    }

    // - create: show a form to create a new job
    public function create()
    {
        return view('jobs.create');
    }

    // - store: save the new job to the database
    public function store(Request $request)
    {
        // Validate the form fields
        $formFields = $request->validate([
            'company' => 'required',
            'title' => 'required',
            'location' => 'required',
            'email' => ['required', 'email'],
            'website' => ['required', 'url'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->logo->store('logos', 'public');
        }

        // get the authenticated user's id and add it to the form fields
        $formFields['user_id'] = auth()->user()->id;

        // Save the job to the database
        Job::create($formFields);

        return redirect('/')->with('message', 'Job created!');
    }

    // - show a form to edit an existing job
    public function edit($id)
    {
        // Find the job with the specified id
        $job = Job::findOrFail($id);

        // Check if the authenticated user is the owner of the job
        if (auth()->user()->id != $job->user_id) {
            abort(403, 'Unauthorized action.');
        }

        // Return the view
        return view('jobs.edit', compact('job'));
    }

    // update an existing job
    public function update(Request $request, $id)
    {
        // Find the job with the specified id
        $job = $this->findJob($id);

        // Check if the authenticated user is the owner of the job
        if (auth()->user()->id != $job->user_id) {
            abort(403, 'Unauthorized action.');
        }

        // Validate the form fields
        $formFields = $request->validate([
            'company' => 'required',
            'title' => 'required',
            'location' => 'required',
            'email' => ['required', 'email'],
            'website' => ['required', 'url'],
            'tags' => 'required',
            'description' => 'required'
        ]);

        if ($request->hasFile('logo')) {
            $formFields['logo'] = $request->logo->store('logos', 'public');
        }

        // Save the job to the database
        $job->update($formFields);

        return back()->with('message', 'Job updated!');
    }

    // delete an existing job
    public function destroy($id)
    {
        // Find the job with the specified id
        $job = $this->findJob($id);

        // Check if the authenticated user is the owner of the job
        if (auth()->user()->id != $job->user_id) {
            abort(403, 'Unauthorized action.');
        }

        // Delete the job from the database
        $job->delete();

        return redirect('/')->with('message', 'Job deleted!');
    }

    // manage job applications
    public function manage()
    {
        // Return the view
        return view('jobs.manage', [
            // where jobs belongs to the authenticated user
            'jobs' => auth()->user()->jobs
        ]);
    }
}

// 4:09:45