<h1>{{$heading}}</h1>

@if(coun(listings)==0)
<p>No list is found</p>

@endif;

@foreach($listings as $listing)

<x-listing-card :listing="$listing"  />
<h2>{{$listing['title']}}</h2>
<p>{{$listing['description']}}</p>
@endforeach


