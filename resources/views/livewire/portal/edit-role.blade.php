<div>
    <div class="flex items-center justify-center h-[60vh]">
        <div class="flex gap-8 justify-start">
            <div class="flex flex-col gap-4">
                <span class="font-bold">Edit role</span>
                <form wire:submit="update" class="flex flex-row gap-2">
                    <div class="flex flex-col">
                        @error('name') <span class="text-xs font-normal text-red-500 italic">- {{ $message }}</span> @enderror 
                        <input wire:model="name" class="rounded-xl" type="text">
                    </div>
                    <button type="submit" class="text-white px-4 py-2 rounded-xl bg-slate-500 flex justify-between">
                        <span>Update</span><span class="text-xs h-full" wire:loading><img width="32px" height="32px" class="object-fit" src="/imgs/spinner.gif"></span>
                    </button>
                </form>
            </div>
            
        </div>
    </div>
</div>
