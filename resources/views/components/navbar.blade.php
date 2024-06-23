@include('components.header')


<div class="flex items-center justify-between h-16">
    <h1 class="text-6xl md:text-3xl font-bold p-4 ">Task</h1>

    @if (Route::has('login'))
    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
        @auth
        <div class="flex flex-row items-center">
            <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-black focus:bg-gray-200  focus:outline-dashed   focus:outline-2 outline-offset-4  focus:rounded-sm focus:outline-black">Home</a>
            <a href="{{ url('/logout') }}" class="font-semibold text-gray-600 hover:text-black focus:bg-gray-200 focus:outline-dashed   focus:outline-2 outline-offset-4  focus:rounded-sm focus:outline-black m-4">logout</a>
            <a href="{{ url('/home') }}" class="px-4 py-2 bg-white text-black font-medium  outline-dashed origin-top-left  ring-4 ring-gray-300 scale-75   transition-all  rounded-xl m-4">{{ Auth::user()->name }} </a>
        </div>
        @else
            <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900  focus:bg-gray-200 focus:outline-dashed  focus:outline-2  outline-offset-4 focus:rounded-sm focus:outline-black">Log in</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 focus:bg-gray-200  focus:outline-dashed   focus:outline-2 outline-offset-4  focus:rounded-sm focus:outline-black">Register</a>
            @endif
        @endauth
    </div>
@endif
</div>
