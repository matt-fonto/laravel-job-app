@extends('layout')

@section('content')
@include('partials._hero')
@include('partials._search')

<div
class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4"
>
    @if(count($jobs) == 0)
        <p>No jobs found</p>
    @endif

    @foreach ($jobs as $job)
    <!-- Item 1 -->
    {{-- Creating a component --}}
    {{-- Passing the props, similar to react --}}
        <x-job-card :job="$job" />
    @endforeach

</div>

{{-- to show the pagination numbers --}}
<div class="mt-6 p-4">
    {{$jobs->links()}}
</div>

@endsection
