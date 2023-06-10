{{-- @extends('layout') -> this means that this view extends the layout.blade.php view --}}
@extends('layout')

@section('content')
@include('partials._search')

<a href="/jobs" class="inline-block text-black ml-4 mb-4"
><i class="fa-solid fa-arrow-left"></i> Back
</a>
<div class="mx-4">
    <x-card class="bg-black">
        <div
            class="flex flex-col items-center justify-center text-center"
        >
            <img
                class="w-48 mr-6 mb-6"
                src="{{$job->logo ? asset('storage/' . $job->logo) : asset('/images/no-image.png')}}"
                alt=""
            />

            <h3 class="text-2xl mb-2">{{$job->title}}</h3>
            <div class="text-xl font-bold mb-4">{{$job->company}}</div>
            
            {{-- Tags --}}
            <x-job-tags :tags-csv="$job->tags" />

            <div class="text-lg my-4">
                <i class="fa-solid fa-location-dot"></i> {{$job->location}}
            </div>
            <div class="border border-gray-200 w-full mb-6"></div>
            <div>
                <h3 class="text-3xl font-bold mb-4">
                    Job Description
                </h3>
                <div class="text-lg space-y-6">
                    <p>
                        {{$job->description}}
                    </p>

                    <div class="flex-col w-full mx-auto">
                        <a href="mailto:{{$job->email}}" class="w-[300px] block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80 mb-4 mx-auto text-center">
                            <i class="fa-solid fa-envelope"></i> Contact Employer
                        </a>
                    
                        <a href="{{$job->website}}" target="_blank" class="w-[300px] block bg-black text-white py-2 rounded-xl hover:opacity-80 mx-auto text-center">
                            <i class="fa-solid fa-globe"></i> Visit Website
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </x-card>

    <x-card class="mt-4 p-2 flex space-x-6">
        <a href="/jobs/{{$job->id}}/edit">
            <i class="fa-solid fa-pencil"></i> Edit
        </a>

        <form 
            method = "POST"
            action = "/jobs/{{$job->id}}">
            @csrf
            @method('DELETE')

            <button type="submit" class="text-red-500">
                <i class="fa-solid fa-trash" ></i> Delete
            </button>
    </x-card>

</div>

@endsection
