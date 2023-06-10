{{-- @extends('layout') -> this means that this view extends the layout.blade.php view --}}
@extends('layout')

@section('content')

<div class="bg-gray-50 border border-gray-200 p-10 rounded">
    <header>
        <h1
            class="text-3xl text-center font-bold my-6 uppercase"
        >
            Manage Gigs
        </h1>
    </header>

    <table class="w-full table-auto rounded-sm">
        <tbody>
            {{-- if there is not job --}}
            @if (count($jobs) === 0)
            {{-- display this --}}
                <tr>
                    <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                        <p class="text-center">You have not posted any jobs yet.</p>
                    </td>
                </tr>
            {{-- if there are jobs --}}
            @else
                {{-- loop through them --}}
                @foreach ($jobs as $job)
                    <tr class="border-gray-300">
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <a href="/jobs/{{ $job->id }}">{{ $job->title }}</a>
                        </td>
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <a href="/jobs/{{ $job->id }}/edit" class="text-blue-400 px-6 py-2 rounded-xl">
                                <i class="fa-solid fa-pen-to-square"></i>
                                Edit
                            </a>
                        </td>
                        <td class="px-4 py-8 border-t border-b border-gray-300 text-lg">
                            <form 
                                method = "POST"
                                action = "/jobs/{{$job->id}}">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="text-red-500">
                                    <i class="fa-solid fa-trash" ></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>

@endsection
