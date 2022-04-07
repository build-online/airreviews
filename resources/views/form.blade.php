<x-guest-layout>
<div class="py-12">
    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="max-w-lg mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-center">
                <img src="{{ $setup->Logo[0]->url }}" alt="" class="w-72 mb-12">
            </div>
            <div class="flex justify-center flex-row mb-6">
                <div class="w-48 mr-6 text-center">
                    <img src="{{ $client->Before_photo[0]->url }}" alt="" class="w-48 h-48 object-cover mb-2">
                    <p>Before</p>
                </div>
                <div class="w-48 text-center">
                    <img src="{{ $client->After_photo[0]->url }}" alt="" class="w-48 h-48 object-cover mb-2">
                    <p>After</p>
                </div>
            </div>
            <div class="p-6 bg-white border-b border-gray-200 prose " >
                <h2>It was a pleasure working with you.</h2>
                <h3>Here is a summary of our work:</h3>
                <p class="text-gray-500">{{$client->Job_description}}</p>
                <h3>Please tell us how we did:</h3>
                <form action="/reviews/{{$user}}/{{$base}}">
                <div class="flex flex-col items-center text-center">
                    <label class="rating-label"><span>{{ $setup->Rating_1_Name}}</span>
                        <input
                        class="rating rating--nojs"
                        max="5"
                        step="1"
                        type="range"
                        value="3"
                        name="review1"
                        id="review1"
                        >
                    </label>
                    <label class="rating-label"><span>{{ $setup->Rating_2_Name}}</span>
                        <input
                        class="rating rating--nojs"
                        max="5"
                        step="1"
                        type="range"
                        value="3"
                        name="review2"
                        id="review2"
                        >
                    </label>
                    <label class="rating-label"><span>{{ $setup->Rating_3_Name}}</span>
                        <input
                        class="rating rating--nojs"
                        max="5"
                        step="1"
                        type="range"
                        value="3"
                        name="review3"
                        id="review3">
                    </label>
                    
                </div>
                <label class="block">
                      <span class="text-gray-700">Your Review</span>
                      <textarea class="form-textarea mt-1 block w-full" rows="3" placeholder="{{$setup->Business_Name}} did..." name="review" id="review"></textarea>
                    </label>
                    <button type="submit" class="mt-8 w-full inline-flex justify-center items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Submit Review</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- {{ dd($client) }} --}}
</x-guest-layout>