<div class="flex flex-col gap-16">
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
            
            <!-- buttons -->
            <div class="buttons flex justify-between items-center">
                <button type="submit" class="btn rounded-xl p-1 px-4 text-xs font-bold cursor-pointer text-gray-200 h-8 bg-black flex justify-between items-center"><span>Update</span><span class="text-xs h-full" wire:loading><img width="32px" height="32px" class="object-fit" src="/imgs/spinner.gif"></span></button>
            </div>
        </form>
        
        {{-- Row 2 --}}
        <div class="flex flex-col gap-8 w-full lg:w-4/12">
            <form wire:submit class="text-gray-800 rounded-xl border border-gray-300 p-4 shadow-lg w-full bg-white">
                <label class="flex flex-col gap-2 w-full">
                    <div class="text-xs font-bold flex gap-8 items-center"><span>Short description</span><span class="text-xs h-full" wire:loading><img width="32px" height="32px" class="object-fit" src="/imgs/spinner.gif"></span> @error('description') <span class="text-xs font-normal text-red-500 italic">- {{ $message }}</span> @enderror </div>
                    <div class="w-full">
                        <textarea wire:model.blur="description" wire:dirty.class="border-yellow-500" class="description bg-gray-100 sec p-3 h-24 border rounded-xl border-gray-300 outline-none w-full" spellcheck="false" placeholder="Describe shortly everything about this lesson here"></textarea>
                    </div>
                </label>
            </form>

            <form wire:submit class="text-gray-800 rounded-xl border border-gray-300 p-4 shadow-lg w-full bg-white">
                <label class="flex flex-col gap-2 w-full">
                    <div class="text-xs font-bold flex gap-8 items-center"><span>Keywords  <span class="font-normal">(Comma separated)</span></span><span class="text-xs h-full" wire:loading><img width="32px" height="32px" class="object-fit" src="/imgs/spinner.gif"></span></div>
                    <div class="w-full">
                        <input wire:model.blur="keywords" wire:dirty.class="border-yellow-500" class="title rounded-xl bg-gray-100 border border-gray-300 p-2 mb-4 outline-none w-full" spellcheck="false" type="text">
                    </div>
                </label>
            </form>
        </div>
    </div>

    <div class="flex flex-col gap-4">
        <h6>Select lessons to include in tutorial</h6>

        <p>Copy the ID of each lesson that belongs to the tutorial, and paste in the order you want them to be presented.</p>

        <div class="flex gap-8 flex-wrap items-start">
            <div class="w-full lg:w-4/12 flex flex-col gap-8">
                @foreach ($lessons as $lesson)
                <div key="{{$lesson->id}}" class="bg-white shadow-lg p-4 flex items-center justify-between rounded-xl">
                        <div class="flex flex-col gap-2">
                            <div class="text-xs font-bold">{{$lesson->title}}</div>
                            <div class="text-xs">{{$lesson->description}}</div>
                            <div id="uniq_{{$lesson->id}}" class="text-xs text-black">{{$lesson->uniqid}}</div>
                        </div>
                        <div onclick="copyID(`uniq_{{$lesson->id}}`, this)" class="bg-black text-white text-xs inline-block px-2 py-1 rounded-xl cursor-pointer">Copy ID</div>
                    </div>
                @endforeach
            </div>
            <form id="inputs_id" class="w-full lg:w-4/12 flex flex-col gap-8 bg-white shadow-xl rounded-xl p-4">

                <div id="btm_btns_id" class="flex justify-between items-center">
                    <div>
                        <span onclick="appendInput()" class="px-4 py-1 bg-blue-500 text-white text-sm rounded-xl hover:bg-blue-600" role="button">+</span>
                    </div>
                    <div class="flex gap-4">
                        <button class="px-4 py-1 bg-black text-white text-xs font-bold rounded-xl" type="submit">Done</button>
                        <button class="px-4 py-1 bg-red-300 text-black text-xs rounded-xl" role="button">Clear</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

    <script>
        function copyID(id, e)
        {
            let text = document.querySelector(`#${id}`).innerText;
            let label = e.innerText;
            navigator.clipboard.writeText(text);
            e.innerText = 'Copied!';
            setTimeout(() => {
                e.innerText = label;
            }, 3000);
        }

        function pasteID(e)
        {
            e.value = navigator.clipboard.readText();
        }

        function makeInputID()
        {
            let prefix = 'inputs_';
            let randomInt = Math.round(Math.random() * 100000);
            return `${prefix}${randomInt}`;
        }

        function makeDynamicInput()
        {
            let id = makeInputID();
            let node = document.createElement('div');
            node.setAttribute('id', id);
            node.setAttribute('class', 'flex justify-between items-center w-full');

            let input = document.createElement('input');
            input.setAttribute('onfocus', 'pasteID(this)');
            input.setAttribute('type', 'text');
            input.setAttribute('placeholder', 'Paste ID here');
            input.setAttribute('class', 'dynamic-input');

            node.appendChild(input);

            let btnContainer = document.createElement('div');
            btnContainer.setAttribute('class', 'dynamic-input-ctrl');

            let addBtn = document.createElement('div');
            addBtn.setAttribute('onclick', `appendInputBelow('${id}')`);
            addBtn.setAttribute('class', 'w-8 h-8 flex items-center justify-center bg-blue-400 text-white rounded-xl');
            addBtn.setAttribute('title', 'Add lesson below');
            addBtn.setAttribute('role', 'button');
            addBtn.innerText = '+';

            let removeBtn = document.createElement('div');
            removeBtn.setAttribute('onclick', `removeInput("${id}")`);
            removeBtn.setAttribute('class', 'w-8 h-8 flex items-center justify-center bg-slate-500 text-white rounded-xl');
            removeBtn.setAttribute('title', 'Remove this lesson');
            removeBtn.setAttribute('role', 'button');
            removeBtn.innerText = '-';

            btnContainer.appendChild(addBtn);
            btnContainer.appendChild(removeBtn);

            node.appendChild(btnContainer);

            return node;
        }

        function appendInput()
        {
            let btn = document.querySelector('#btm_btns_id');
            let newNode = makeDynamicInput();
            btn.insertAdjacentElement('beforebegin', newNode);
        }

        function appendInputBelow(id)
        {
            let node = document.querySelector(`#${id}`);
            let newNode = makeDynamicInput();
            node.insertAdjacentElement('afterend', newNode);
        }

        function removeInput(id)
        {
            let node = document.querySelector(`#${id}`);
            node.remove();
        }
    </script>
</div>
