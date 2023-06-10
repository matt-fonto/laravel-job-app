<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;


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

// Common Resource Routes:
// index: shows all the resources
// show: shows a single resource
// create: shows a form to create a new resource
// store: saves the new resource to the database
// edit: shows a form to edit an existing resource
// update: saves the updated resource to the database
// destroy: deletes the resource from the database

// Find all jobs
// Route::method(path, callback)
Route::get('/', [JobController::class, 'index']);

// Show/Get create form 
Route::get("/jobs/create", [JobController::class, 'create'])->middleware('auth');

// Manage Jobs for a user
Route::get("/jobs/manage", [JobController::class, 'manage'])->middleware('auth');

// Store/Create a new job
Route::post("/jobs", [JobController::class, 'store'])->middleware('auth');

// Show edit form
Route::get("/jobs/{id}/edit", [JobController::class, 'edit'])->middleware('auth');

// Update job data
Route::put("/jobs/{id}", [JobController::class, 'update'])->middleware('auth');

// Delete job data
Route::delete("/jobs/{id}", [JobController::class, 'destroy'])->middleware('auth');

// Find one job
Route::get("/jobs/{id}", [JobController::class, 'show']);

// Show Register form
Route::get("/signup", [UserController::class, 'signup'])->middleware('guest');

// Store/Register a new user
Route::post("/users", [UserController::class, 'store']);

// Logout
Route::post("/logout", [UserController::class, 'logout'])->middleware('auth');

// Show Login form
Route::get("/login", [UserController::class, 'login'])->name('login')->middleware('guest');

// Handle Login form data
Route::post("/users/authenticate", [UserController::class, 'authenticate']);
