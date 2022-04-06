<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 prose " >
                    <h1> How to use Air Reviews</h1>
                    <h2>Step 1: Create an Airtable Account</h2>
                    <p>You can sign up here.</p>
                    <h2>Step 2: Copy the airreviews base</h2>
                    <p>After you have signed into Airtable, just click this link and then follow Airtable's instructions.</p>
                    <h2>Step 3: Enter your Airtable API Key and Base ID</h2>
                    <p>You can find the API Key and Base ID like this:</p>
                    <form action=""></form>
                    <h2>Step 4: Share the review form with your customers.</h2>
                    <p>After you've setup your API keys, you really don't need to open this app again.  Everything else happens inside of Airtable.</p>  
                    <p>As long as you don't change any of the default fields (you can add as many fields as you like) the app should continue to work as expected.</p>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
