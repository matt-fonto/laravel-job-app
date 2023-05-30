{{-- @extends('layout') -> this means that this view extends the layout.blade.php view --}}
@extends('layout')

@section('content')
<p>
    <a href="/jobs">
        Return to jobs
    </a>
</p>

<h2>{{$job['title']}}</h2>
<p>{{$job['description']}}</p>
<p>{{$job['email']}}</p>
<p>{{$job['website']}}</p>

@endsection