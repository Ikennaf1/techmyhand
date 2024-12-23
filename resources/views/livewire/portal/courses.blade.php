<div>
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent flex items-start gap-4">
                    <h6>My Courses</h6>
                    <span class="text-xs py-2 px-4 bg-gray-100 hover:bg-gray-200 text-black rounded-xl"><a href="{{route('portal.courses.new')}}">+ Add new</a></span>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Title</th>
                                <th class="px-6 py-3 pl-2 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Last Updated</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Edit course</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Delete course</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Create cohort</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($myCourses as $course)
                                    <tr wire:key="{{$course->id}}">
                                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2 py-1">
                                                <div class="flex flex-col justify-center">
                                                    <h6 class="mb-0 text-sm leading-normal">{{$course->title}}</h6>
                                                    <p class="mb-0 text-xs leading-tight text-slate-400">
                                                        Created {{$course->created_at->diffForHumans()}} <span class="course-{{$course->status}}">({{$course->status}})</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-xxs font-bold leading-tight uppercase">{{$course->updated_at->diffForHumans()}}</p>
                                        </td>
                                        <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <span class="text-xs font-semibold leading-tight text-slate-400"><a href="{{route('portal.courses.edit', $course->id)}}">Edit</a></span>
                                        </td>
                                        <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <a role="button" wire:click="deleteCourse({{$course->id}})" wire:confirm="Are you sure you want to delete this course? This action is not reversible" class="text-xs font-semibold leading-tight text-red-400"> Delete </a>
                                        </td>
                                        <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            @if ($course->is_approved)
                                                <a href="{{route('portal.cohorts.new', $course->id)}}" class="text-xs font-semibold leading-tight text-slate-400"> Create cohort </a>
                                            @endif
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
