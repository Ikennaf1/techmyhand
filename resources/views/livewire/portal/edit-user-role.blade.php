<div>
    <div class="flex items-center justify-center h-[60vh]">
        <div class="flex gap-8 justify-start">
            <div class="flex flex-col gap-4">
                <span class="font-bold">Edit user role</span>
                <form wire:submit="update" class="flex flex-row gap-2">
                    <table class="items-center w-full mb-0 align-top border-gray-200 text-slate-500">
                        <thead class="align-bottom">
                            <tr>
                                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Name</th>
                                <th class="px-6 py-3 pl-2 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Role</th>
                                <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-gray-200 shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">Select role</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">{{$user->name}}</td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">{{$userRole}}</td>
                                <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">
                                    <select class="rounded-xl px-4 py-2 w-48" wire:model.change="selectedUserRoleID">
                                        <option value="0">No role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{$role->id}}"
                                                @if ($role->name === $userRole)
                                                    selected
                                                @endif
                                                >{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td>
                                    <button type="submit" class="text-white px-4 py-2 rounded-xl bg-slate-500 flex justify-between">
                                        <span>Update</span><span class="text-xs h-full" wire:loading><img width="32px" height="32px" class="object-fit" src="/imgs/spinner.gif"></span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
            
        </div>
    </div>
</div>
