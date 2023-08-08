@props(['listing'])

<!-- Item 1 -->
<x-card>
    <div class="flex">
        <img
            class="hidden w-48 mr-6 md:block"
            src="{{$listing->image ? asset('storage/' . $listing->image) : asset('/images/mobile.png')}}"
            alt=""
        />
        <div>
            <h3 class="text-2xl">
                <a href="/listings/{{$listing->id}}}">{{$listing->title}}</a>
            </h3>
            <div class="text-xl font-bold mb-4">{{$listing->company}}</div>
            <x-listing-tags :tagsCsv="$listing->tags" />
            <div class="text-lg mt-4">
                <i class="fa fa-inr" style="font-size:20px;color:red"></i> {{$listing->price}}
            </div>
            
        </div>
    </div>
</x-card>
