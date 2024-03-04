<div>
    <div class="p-4 sm:ml-64">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
            <h3 class="text-2xl">Upload</h3>
    <form wire:submit="save">
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
            <input type="text" id="title" wire:model.blur="title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            @error('title') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            @if ($content)

                <img src="{{ $content->temporaryUrl() }}" class="w-24 h-24 rounded-full">
            @endif
        

        
                                
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
            <input wire:model.blur="content" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file">
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG(MAX WIDTH. 500px).</p>

            @error('content') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <button type="submit" >Submit</button>
    </form>
        </div>
    </div>
</div>
