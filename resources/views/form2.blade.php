<x-guest-layout>
<div>
    <style scoped>
    :root {
    --color:  {{$setup->Brand_Color}};
    }
    button.bg-brand {
    background-color: var(--color);
    }
    .brand {
    color: var(--color);
    }
    
    .rating {
    --dir: right;
    --fill: {{$setup->Brand_Color}};
    --fillbg: rgba(100, 100, 100, 0.15);
    --heart: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 21.328l-1.453-1.313q-2.484-2.25-3.609-3.328t-2.508-2.672-1.898-2.883-0.516-2.648q0-2.297 1.57-3.891t3.914-1.594q2.719 0 4.5 2.109 1.781-2.109 4.5-2.109 2.344 0 3.914 1.594t1.57 3.891q0 1.828-1.219 3.797t-2.648 3.422-4.664 4.359z"/></svg>');
    --star: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M12 17.25l-6.188 3.75 1.641-7.031-5.438-4.734 7.172-0.609 2.813-6.609 2.813 6.609 7.172 0.609-5.438 4.734 1.641 7.031z"/></svg>');
    --stars: 5;
    --starsize: 3rem;
    --symbol: var(--star);
    --value: 1;
    --w: calc(var(--stars) * var(--starsize));
    --x: calc(100% * (var(--value) / var(--stars)));
    block-size: var(--starsize);
    inline-size: var(--w);
    position: relative;
    touch-action: manipulation;
    -webkit-appearance: none;
    }
    [dir="rtl"] .rating {
    --dir: left;
    }
    .rating::-moz-range-track {
    background: linear-gradient(to var(--dir), var(--fill) 0 var(--x), var(--fillbg) 0 var(--x));
    block-size: 100%;
    mask: repeat left center/var(--starsize) var(--symbol);
    }
    .rating::-webkit-slider-runnable-track {
    background: linear-gradient(to var(--dir), var(--fill) 0 var(--x), var(--fillbg) 0 var(--x));
    block-size: 100%;
    mask: repeat left center/var(--starsize) var(--symbol);
    -webkit-mask: repeat left center/var(--starsize) var(--symbol);
    }
    .rating::-moz-range-thumb {
    height: var(--starsize);
    opacity: 0;
    width: var(--starsize);
    }
    .rating::-webkit-slider-thumb {
    height: var(--starsize);
    opacity: 0;
    width: var(--starsize);
    -webkit-appearance: none;
    }
    .rating, .rating-label {
    display: block;
    font-family: ui-sans-serif, system-ui, sans-serif;
    }
    .rating-label {
    margin-block-end: 1rem;
    }
    /* NO JS */
    .rating--nojs::-moz-range-track {
    background: var(--fillbg);
    }
    .rating--nojs::-moz-range-progress {
    background: var(--fill);
    block-size: 100%;
    mask: repeat left center/var(--starsize) var(--star);
    }
    .rating--nojs::-webkit-slider-runnable-track {
    background: var(--fillbg);
    }
    .rating--nojs::-webkit-slider-thumb {
    background-color: var(--fill);
    box-shadow: calc(0rem - var(--w)) 0 0 var(--w) var(--fill);
    opacity: 1;
    width: 1px;
    }
    [dir="rtl"] .rating--nojs::-webkit-slider-thumb {
    box-shadow: var(--w) 0 0 var(--w) var(--fill);
    }
    </style>
    <div class="bg-white overflow-hidden">
        <div class="max-w-lg mx-auto" >
            <!-- The Logo Section-->
            <div class="flex justify-center items-center h-40 w-full">
                @if($logo)
                <img src="{{ $setup->Logo[0]->url }}" alt="" class="h-32 w-full object-contain ">
                @else
                <h1 class="text-2xl font-bold brand ">{{ $setup->Business_Name }}</h1>
                @endif
            </div>
            <!-- The Photos-->
            @if($before || $after )
            <div class="flex  flex-row">
                @if($before )
                <img src="{{ $client->Before_photo[0]->url }}" alt="" class="@if($after) w-1/2 h-48 mr-1 @else w-full h-64 @endif object-cover">
                
                @endif
                @if($after)
                <img src="{{ $client->After_photo[0]->url }}" alt="" class="@if($before) w-1/2 h-48 @else w-full h-64  @endif object-cover ">
                @endif
            </div>
            @endif
            <!-- Main Body of the form -->
            <div class="p-6 bg-white">
                <!--The Description Section-->
                <div class="flex">
                    <div class="w-8 flex justify-center mr-4 pt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6  brand" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h3a1 1 0 100-2H6z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="flex-grow">
                        <h2 class="font-bold mb-4 text-lg">{{$client->Client_Name}} {{$setup->Heading}}</h2>
                        <h3 class="mb-4">{{$setup->PreSummary}}</h3>
                        <p class="mb-4">{{$client->Job_description}}</p>
                        <h3 class="mb-4">{{$setup->PreReview}}</h3>
                    </div>
                </div>
                <form action="/reviews/{{$user}}/{{$record}}" method="POST" >
                    @csrf
                    <!-- Ratings Section -->
                    <div class="flex">
                        <div class="w-8 flex justify-center mr-4 pt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 brand" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="flex-grow">
                            <h2 class="font-bold mb-4 text-lg">Rating</h2>
                            <label class="rating-label"><span>{{ $setup->Rating_1_Name}}</span>
                            <input
                            class="rating rating--nojs"
                            max="5"
                            step="1"
                            type="range"
                            value="0"
                            name="star1"
                            id="star1"
                            >
                        </label>
                        <label class="rating-label"><span>{{ $setup->Rating_2_Name}}</span>
                        <input
                        class="rating rating--nojs"
                        max="5"
                        step="1"
                        type="range"
                        value="0"
                        name="star2"
                        id="star2"
                        >
                    </label>
                    <label class="rating-label"><span>{{ $setup->Rating_3_Name}}</span>
                    <input
                    class="rating rating--nojs"
                    max="5"
                    step="1"
                    type="range"
                    value="0"
                    name="star3"
                    id="star3">
                </label>
            </div>
        </div>
        
        
        
        <label class="block">
            <textarea class="form-textarea mt-1 block w-full" required rows="3" placeholder="Add your review here." name="review" id="review"></textarea>
        </label>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <button type="submit" class="mt-6 mb-6 w-full inline-flex justify-center items-center px-6 py-3 border border-transparent text-base font-medium rounded-full shadow-sm text-white bg-brand hover:bg-gray-800">Submit Review</button>
    </div>
</form>
</div>
</div>
</div>
</div>
{{-- {{ dd($client) }} --}}
</x-guest-layout>