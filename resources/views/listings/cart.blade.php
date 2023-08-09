@extends('layout')

@section('content')

<x-card class="p-10">
    <div
    class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4"
    >

    @unless(count($listings) == 0)
    @foreach($listings as $listing)
    <x-listing-card :listing="$listing" />
    @endforeach

    @else
    <p>No Product is avilable</p>

    @endunless

    </div>
</x-card>

@endsection
