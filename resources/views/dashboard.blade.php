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
                <p>You can sign up <a href="https://airtable.com/signup">here.</a></p>
                <h2>Step 2: Copy the Review Collector base</h2>
                <p>After you have signed into Airtable, just click <a href="https://airtable.com/shrlR9Vjtg16esQPO">this link</a> and then follow Airtable's instructions.</p>
                <h2>Step 3: Enter your Airtable API Key and Base ID</h2>
                <p>You can find the API Key <a href="https://airtable.com/account">here.</a></p>
                <img src="/api_key.png" alt="Screenshot of where to find the Airtable API key">
                <p>Finding the Base ID is a little bit trickier.  The easiest way to get it is to go to <a href="https://airtable.com/api">airtable.com/api</a>, select your base and then copy it on the next page.  (See screenshot below)</p>
                <img src="/base_id.png" alt="Screenshot of where to find the Airtable Base ID">
                <livewire:keys />
                <h2>Step 4: Share the review form with your customers.</h2>
                <p>After you've setup your API keys, you really don't need to open this app again.  Everything else happens inside of Airtable.</p>
                <p>As long as you don't change any of the default fields (you can add as many fields as you like) the app should continue to work as expected.</p>
            </div>
        </div>
    </div>
</div>
</x-app-layout>