<div>
    <div class="flex flex-wrap -mx-3">
        <div class="flex-none w-full max-w-full px-3">
            <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-soft-xl rounded-2xl bg-clip-border">
                <div class="p-6 pb-0 mb-0 bg-white border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <h6>Roles</h6>
                </div>
                <div class="flex-auto px-0 pt-0 pb-2">
                    <div class="p-0 overflow-x-auto">
                        <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                            <thead class="align-bottom">
                                <tr>
                                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Role</th>
                                <th class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Updated on</th>
                                {{-- <th class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Created by</th> --}}
                                <th class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Edit</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr :key="role_{{$role->id}}">
                                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <div class="flex px-2 py-1">
                                            <div class="flex flex-col justify-center">
                                                <h6 class="mb-0 text-sm leading-normal">{{$role->name}}</h6>
                                                <p class="mb-0 text-xs leading-tight text-slate-400">{{$role->created_at->diffForHumans()}}</p>
                                            </div>
                                            </div>
                                        </td>
                                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <p class="mb-0 text-xxs text-center font-bold leading-tight uppercase">{{$role->updated_at->diffForHumans()}}</p>
                                            </td>
                                        <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent text-center">
                                            <a href="{{route('portal.roles.edit', $role->id)}}" class="mb-0 text-xxs text-center font-bold leading-tight uppercase">Edit</a>
                                        </td>
                                        <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                            <button class="text-xs font-semibold leading-tight text-slate-400" wire:click="delete('{{$role->id}}')" wire:confirm="Are you sure you want to delete this role? Action is not reversible." type="submit">Delete</button>
                                        </td>
                                    </tr>                          
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="p-6 pb-0 mb-0 rounded-t-2xl">
                <div clasa="flex flex-col gap-8">
                    <span>Add new role</span>
                    <div>
                        <form wire:submit="add" class="flex gap-2 justify-start">
                            <div class="flex flex-col">
                                @error('roleName') <span class="text-xs font-normal text-red-500 italic">- {{ $message }}</span> @enderror 
                                <input wire:model="roleName" class="rounded-xl" type="text" placeholder="Add new role">
                            </div>
                            <button class="text-white px-4 py-2 rounded-xl bg-slate-500" type="submit">Add</button>
                        </form>
                    </div>
                </div>
            </div>
      </div>
</div>
