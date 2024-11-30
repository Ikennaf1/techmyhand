<div>
    <div class="flex items-center justify-center h-[60vh]">
        <div class="flex gap-8 justify-start">
            <div class="flex flex-col gap-4">
                <span class="font-bold">Edit role</span>
                <form wire:submit="editjh" class="flex flex-row gap-2">
                    <div class="fle flex-col">
                        @error('name') <span class="text-xs font-normal text-red-500 italic">- {{ $message }}</span> @enderror 
                        <input class="rounded-xl" type="text" wire:model="name">
                    </div>
                    <button class="text-white px-4 py-2 rounded-xl bg-slate-500" type="submit">Done</button>
                </form>
            </div>
            
        </div>
    </div>
</div>
