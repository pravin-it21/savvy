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

                @if(!(auth()->check() && auth()->user()->is_admin))

                <form method="POST" action="/listingsss">
                    @csrf
                <div class="album-price">

                      <div class="mb-6">
                        <button
                            class="bg-laravel text-white rounded mt-2 px-3 hover:bg-black"
                        >
                            Buy
                        </button>
                    </div>
                       </a>
                     </div>
                </form>

                @endif
            <div class="text-lg mt-4">
                <i class="fa fa-inr" style="font-size:20px;color:red"></i> {{$listing->price}}
            </div>

        </div>
    </div>
</x-card>
