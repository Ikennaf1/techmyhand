<div class="flex flex-wrap gap-8 items-start">
<!-- component -->
    <form wire:submit="update" class="editor bg-white rounded-xl w-full lg:w-8/12 flex flex-col gap-2 text-gray-800 border border-gray-300 p-4 shadow-lg max-w-2xl">
        <label class="flex flex-col gap-2 w-full">
            <div class="text-xs font-bold">Title @error('title') <span class="text-xs font-normal text-red-500 italic">- {{ $message }}</span> @enderror </div>
            <div class="w-full">
                <input wire:model="title" class="title rounded-xl bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full" spellcheck="false" placeholder="Title" type="text">
            </div>
        </label>

        <label class="flex flex-col gap-2 w-full">
            <div class="text-xs font-bold">Content</div>
            <div class="w-full">
                <textarea wire:model="content" class="description rounded-xl bg-gray-100 sec p-3 h-60 border border-gray-300 outline-none w-full" spellcheck="false" placeholder="Describe everything about this lesson here"></textarea>
            </div>
        </label>

        <label class="flex flex-col gap-2 w-full">
            <div class="text-xs font-bold">YouTube video ID</div>
            <div class="w-full">
                <input wire:model="youtube_video_id" class="title rounded-xl bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full" spellcheck="false" type="text">
            </div>
        </label>
        
        <!-- buttons -->
        <div class="buttons flex">
            <button type="submit" class="btn rounded-xl p-1 px-4 text-xs font-bold cursor-pointer text-gray-200 ml-2 bg-black">Update<span class="text-xs" wire:loading>&nbsp;Updating...</span></button>
        </div>
    </form>

    {{-- Row 2 --}}
    <div class="flex flex-col gap-8 w-full lg:w-4/12">
        <form wire:submit class="text-gray-800 rounded-xl border border-gray-300 p-4 shadow-lg w-full bg-white">
            <label class="flex flex-col gap-2 w-full">
                <div class="text-xs font-bold">Short description @error('short_description') <span class="text-xs font-normal text-red-500 italic">- {{ $message }}</span> @enderror </div>
                <div class="w-full">
                    <textarea wire:model.blur="short_description" wire:dirty.class="border-yellow-500" class="description bg-gray-100 sec p-3 h-24 border rounded-xl border-gray-300 outline-none w-full" spellcheck="false" placeholder="Describe shortly everything about this lesson here"></textarea>
                </div>
            </label>
        </form>
        
        <form wire:submit class="text-gray-800 rounded-xl border border-gray-300 p-4 shadow-lg w-full bg-white">
            <label class="flex flex-col gap-2 w-full">
                <div class="text-xs font-bold">Summary</div>
                <div class="w-full">
                    <textarea wire:model.blur="summary" wire:dirty.class="border-yellow-500" class="description rounded-xl bg-gray-100 sec p-3 h-40 border border-gray-300 outline-none w-full" spellcheck="false" placeholder="Describe everything about this lesson here"></textarea>
                </div>
            </label>
        </form>

        <form wire:submit class="text-gray-800 rounded-xl border border-gray-300 p-4 shadow-lg w-full bg-white">
            <label class="flex flex-col gap-2 w-full">
                <div class="text-xs font-bold">YouTube addendum video ID</div>
                <div class="w-full">
                    <input wire:model.blur="addendum_video_id" wire:dirty.class="border-yellow-500" class="title rounded-xl bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full" spellcheck="false" type="text">
                </div>
            </label>
        </form>
    </div>
</div>