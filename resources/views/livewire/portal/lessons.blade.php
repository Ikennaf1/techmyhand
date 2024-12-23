<div>
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex items-start gap-4">
                    <h6>My Lessons</h6>
                    <span class="text-xs py-2 px-4 bg-gray-100 hover:bg-gray-200 text-black rounded-xl"><a href="{{route('portal.lessons.new')}}">+ Add new</a></span>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Title</th>
                                <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Last Updated</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Edit lesson</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Delete lesson</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($myLessons as $lesson)
                                    <tr wire:key="{{$lesson->id}}">
                                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2 py-1">
                                                <div class="flex flex-col justify-center">
                                                    <h6 class="mb-0 text-sm leading-normal">{{$lesson->title}}</h6>
                                                    <p class="mb-0 text-xs leading-tight text-slate-400">Created {{$lesson->created_at->diffForHumans()}}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-xxs font-bold leading-tight uppercase">{{$lesson->updated_at->diffForHumans()}}</p>
                                        </td>
                                        <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <span class="text-xs font-semibold leading-tight text-slate-400"><a href="{{route('portal.lessons.edit', $lesson->id)}}">Edit</a></span>
                                        </td>
                                        <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <a role="button" wire:click="deleteLesson({{$lesson->id}})" wire:confirm="Are you sure you want to delete this lesson? This action is not reversible" class="text-xs font-semibold leading-tight text-slate-400"> Delete </a>
                                        </td>
                                    </tr>                          
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
      </div>
</div>
