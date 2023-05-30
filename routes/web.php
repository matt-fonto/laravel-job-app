<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Job;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Find all jobs
Route::get('/jobs', function () {
    // we return the view called welcome.blade.php 
    return view('jobs', [
        'title' => 'Latest Jobs',
        'jobs' => Job::all()
    ]);
});

// Find one job
Route::get("jobs/{id}", function ($id) {
    // Find the job with the specified id
    $job = Job::find($id);

    if ($job == null) {
        // Return a 404 response
        abort(404, "Job not found");
    }

    // Return the view
    return view('job', [
        'title' => $job['title'],
        'job' => $job
    ]);
});
