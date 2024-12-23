<div>
    <div class="relative flex p-0 overflow-hidden bg-center bg-cover min-h-75-screen">
      <div class="container z-10">
        <div class="flex flex-wrap mt-0 -mx-3">
          <div class="flex flex-col w-full max-w-full px-3 mx-auto md:flex-0 shrink-0 md:w-6/12 lg:w-5/12 xl:w-4/12">
            <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border">
              <div class="p-6 pb-0 mb-0 bg-transparent border-b-0 rounded-t-2xl">
                <h3 class="relative z-10 font-bold text-transparent bg-gradient-to-tl from-gray-600 to-gray-400 bg-clip-text">Edit cohort</h3>
              </div>
              <div class="flex-auto p-6">
                <form role="form" wire:submit="update" wire:loading.attr="disabled">
                  <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Title @error('title') <span class="text-xs font-normal text-red-500 italic">- {{ $message }}</span> @enderror </label>
                    <div class="mb-4">
                        <input type="text" wire:model="title" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" aria-label="Title" aria-describedby="title-addon" />
                    </div>

                  <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Enrollment start date @error('enroll_start') <span class="text-xs font-normal text-red-500 italic">- {{ $message }}</span> @enderror </label>
                    <div class="mb-4">
                        <input type="date" wire:model="enroll_start" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="" aria-label="Enrollment start date" aria-describedby="title-addon" />
                    </div>

                  <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Enrollment end date @error('enroll_end') <span class="text-xs font-normal text-red-500 italic">- {{ $message }}</span> @enderror </label>
                    <div class="mb-4">
                        <input type="date" wire:model="enroll_end" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="" aria-label="Enrollment start end" aria-describedby="title-addon" />
                    </div>

                  <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Course start date @error('start_date') <span class="text-xs font-normal text-red-500 italic">- {{ $message }}</span> @enderror </label>
                    <div class="mb-4">
                        <input type="date" wire:model="start_date" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="" aria-label="Course start date" aria-describedby="title-addon" />
                    </div>

                  <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Course end date @error('end_date') <span class="text-xs font-normal text-red-500 italic">- {{ $message }}</span> @enderror </label>
                    <div class="mb-4">
                        <input type="date" wire:model="end_date" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="" aria-label="Course start date" aria-describedby="title-addon" />
                    </div>

                  <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Discount (percentage) @error('end_date') <span class="text-xs font-normal text-red-500 italic">- {{ $message }}</span> @enderror </label>
                    <div class="mb-4">
                        <input type="number" min="{{$discount_min}}" max="{{$discount_max}}" wire:model="discount" class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="" aria-label="Title" aria-describedby="title-addon" />
                    </div>

                  <label class="mb-2 ml-1 font-bold text-xs text-slate-700">Pioneer cohort? @error('pioneer') <span class="text-xs font-normal text-red-500 italic">- {{ $message }}</span> @enderror </label>
                    <div class="mb-4">
                        <input type="checkbox" wire:model="pioneer" {{$pioneer === 'yes' ? 'checked' : ''}} class="focus:shadow-soft-primary-outline text-sm leading-5.6 ease-soft block w-8 h-8 appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 transition-all focus:border-fuchsia-300 focus:outline-none focus:transition-shadow" placeholder="" aria-label="Discount" aria-describedby="title-addon" />
                    </div>
                
                  <div class="text-center">
                    <button type="submit" class="flex justify-center items-center gap-4 w-full px-6 py-3 mt-6 mb-0 font-bold text-center text-white uppercase align-middle transition-all bg-transparent border-0 rounded-lg cursor-pointer shadow-soft-md bg-x-25 bg-150 leading-pro text-xs ease-soft-in tracking-tight-soft bg-gradient-to-tl from-blue-600 to-cyan-400 hover:scale-102 hover:shadow-soft-xs active:opacity-85"><span>Continue</span><span class="text-xs" wire:loading><img width="32px" height="32px" class="object-fit" src="/imgs/spinner.gif"></span></button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <div class="w-full max-w-full px-3 lg:flex-0 shrink-0 md:w-6/12">
            <div class="absolute top-0 hidden w-3/5 h-full -mr-32 overflow-hidden -skew-x-10 -right-40 rounded-bl-xl md:block">
              <div class="absolute inset-x-0 top-0 z-0 h-full -ml-16 bg-cover skew-x-10" style="background-image: url('../assets/img/curved-images/curved6.jpg')"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
