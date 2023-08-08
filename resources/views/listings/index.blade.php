@extends('layout')

@section('content')
@include('partials._hero')
@include('partials._search')

<div
class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4"
>

@unless(count($listings) == 0)
@foreach($listings as $listing)
@if(!$listing->is_private || ($listing->is_private && $listing->user_id == auth()->id()))
<x-listing-card :listing="$listing" />
@endif
@endforeach

@else
<p>No Product is avilable</p>

@endunless

</div>

<div class="mt-6 p-4">
    {{$listings->links()}}
</div>



@endsection


