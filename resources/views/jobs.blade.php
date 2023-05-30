@extends('layout')

@section('content')
<h1>{{$title}}</h1>

@if(count($jobs) == 0)
    <p>No jobs found</p>
@endif

@foreach ($jobs as $job)
    <h2>
        <a href="/jobs/{{$job['id']}}">
            {{$job['title']}} 
        </a>
    </h2>
    <p>{{$job['description']}}</p>
@endforeach

@endsection