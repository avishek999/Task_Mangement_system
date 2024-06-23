@include('components.header')
@include('components.navbar')

<div class="flex flex-col items-center justify-center p-8" style="height: calc(100vh - 4rem);">
    <div class="flex px-16 py-8 flex-col shadow-xl rounded-2xl outline-dashed bg-gray-200 outline-offset-4 outline-4 ">
        <div class="flex items-center gap-10 justify-between mb-12">
            @auth
                <h1 class="font-medium">{{ Auth::user()->name }}'s Task</h1>
                <a href="{{ route('create') }}" class="text-xl font-bold py-2 px-4 bg-white rounded-full outline-double outline-offset-2 ring ring-gray-300 group hover:bg-black hover:text-white transition-all duration-1000 ease-in hover:outline-black hover:outline-offset-4 hover:ring  hover:scale-105  ">New Task</a>
                
            @endauth
        </div>

        <div class="relative overflow-x-auto rounded-t-xl">
            @if($tasks->isEmpty())
                <p class="text-center py-4">No tasks available.</p>
            @else
                <table class="w-full text-sm text-left rtl:text-right ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">TASK Name</th>
                            <th scope="col" class="px-6 py-3">TASK DESCRIPTION</th>
                            <th scope="col" class="px-6 py-3">DEADLINE</th>
                            <th scope="col" class="px-6 py-3">STATUS</th>
                            <th scope="col" class="px-6 py-3">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tasks as $task)
                            <tr class="border-b">
                                <th scope="row" class="px-6 py-4 font-medium">
                                    <a href="">{{ $task->title }}</a>
                                </th>
                                <td class="px-6 py-4">{{ $task->description }}</td>
                                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($task->deadline)->format('d-m-Y') }}</td>
                                <td class="px-6 py-4">
                                    @if ($task->status == 0)
                                    <span class="bg-orange-100 text-orange-800 text-xs font-semibold mr-2">Pending</span>
                              
                                @else 
                                <span class="bg-green-100 text-green-600 text-xs font-semibold mr-2">Complete</span>
                                @endif
                                                                      
                                </td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('edit', $task->id) }}" class="text-blue-600 hover:underline">Edit</a>
                            |
                                    <form action="{{ route('destroy', $task->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Delete</button>
                                    </form>
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
