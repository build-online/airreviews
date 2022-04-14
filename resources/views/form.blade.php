<x-guest-layout>
<div class="py-12">
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
    </style>
    <div class="bg-white overflow-hidden px-6">
        <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center">
                @if($logo)
                <img src="{{ $setup->Logo[0]->url }}" alt="" class="h-48 w-48 object-contain mb-12">
                @else
                <h1 class="text-2xl font-bold brand mb-12">{{ $setup->Business_Name }}</h1>
                @endif
            </div>
            @if($before || $after )
            <div class="flex justify-center flex-row mb-6">
                @if($before )
                    <img src="{{ $client->Before_photo[0]->url }}" alt="" class="@if($after) w-48 h-48 mr-6 @else w-full h-64 @endif object-cover">
                 
                @endif
                @if($after)

                    <img src="{{ $client->After_photo[0]->url }}" alt="" class="@if($before) w-48 h-48 @else w-full h-64  @endif object-cover ">
                @endif
            @endif
            </div>
            <div class="p-6 bg-white border-b border-gray-200 prose " >
                <h2>{{$client->Client_Name}} {{$setup->Heading}}</h2>
                <h3>{{$setup->PreSummary}}</h3>
                <p class="text-gray-500">{{$client->Job_description}}</p>
                <h3>{{$setup->PreReview}}</h3>
                <form action="/reviews/{{$user}}/{{$record}}" method="POST">
                    @csrf
                    <div class="flex flex-col items-center text-center">
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
        <label class="block">
            <span class="text-gray-700">Your Review</span>
            <textarea class="form-textarea mt-1 block w-full" required rows="3" placeholder="{{$setup->Business_Name}} did..." name="review" id="review"></textarea>
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
        <button type="submit" class="mt-8 w-full inline-flex justify-center items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-brand hover:bg-gray-800">Submit Review</button>
    </form>
</div>
</div>
</div>
</div>
{{-- {{ dd($client) }} --}}
</x-guest-layout>