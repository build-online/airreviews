<x-guest-layout>
<div class="py-12">
    <style scoped>
    :root {
    --color:  {{$setup->Brand_Color}};
    }
    a.bg-brand {
    background-color: var(--color);
    }
    
    </style>
    <div class="bg-white overflow-hidden  text-center p-6">
        <div class="max-w-lg mx-auto sm:px-6 lg:px-8 prose">
            <div class="flex justify-center">
                @if($logo)
                <img src="{{ $setup->Logo[0]->url }}" alt="" class="h-48 w-48 object-contain mb-12">
                @else
                <h1 class="text-2xl font-bold brand mb-12">{{ $setup->Business_Name }}</h1>
                @endif
            </div>
            <h1>Thank You So Much</h1>
            <p>Posting this on Google Reviews will really help us grow our business.</p>
            <h2>Your Review:</h2>
            <div class="bg-gray-200 p-6">
            <p>{{$review}}</p>
            </div>
            <button onclick="copyText()" class="mt-4 bg-gray-400 text-white rounded-full py-1 px-4 inline-flex">
                Copy to Clipboard
            </button>
            <p>Then use this button to go to our Google Reviews.</p>
            <a href="{{$setup->Google_Reveiws_URL}}" class="mt-8 w-full inline-flex justify-center items-center px-6 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-brand hover:bg-gray-800 no-underline">Leave a Review On Google</a>
            <div class="text-center">
            <img src="/google.png" alt="Google Logo" class="inline">
            </div>
        </div>
    </div>
</div>
<script>
    function copyText(){
        navigator.clipboard.writeText( "{{ $review }}" );
    }
</script>
</x-guest-layout>