<div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="key">
            API Key
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="key" type="text" placeholder="key" wire:model="key">
    </div>
    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="base_id">
            Base ID
        </label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="base_id" type="text" placeholder="Username" wire:model="base_id">
    </div>
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" wire:click="saveKeys">
    Save
    </button>
    
</div>