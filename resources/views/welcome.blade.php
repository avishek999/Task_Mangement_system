

@include('components.header')
@include('components.navbar')

<div class="flex flex-col items-center justify-center p-8" style="height: calc(100vh - 4rem);">
    <!-- Title Section -->
    <h1 class="text-5xl md:text-6xl font-bold font-serif mb-6 mx-24">Task Management</h1>
    <!-- Description Section -->
    <p class="text-xl text-left text-gray-400 font-sans  max-w-md md:text-center mb-6">
        Task Management System Assignment for SpiderWeb technology, a Task Management system to optimize your 
        <br> workflow and increase productivity.
    </p>
    <!-- Get Started Button -->
  
    <a href="{{ url('register') }}" class=" flex  ease-in duration-1000 delay-200 group md:items-center bg-black text-white font-bold py-2 px-4 rounded-xl hover:rounded-full transition-all duration-300 border-2 hover:bg-white hover:border-black hover:text-gray-700 shadow-xl hover:outline-double hover:outline-4 hover:scale-105 hover:skew-y-3">
    
        <!-- Button Icon -->
        <svg class="w-6 h-6 mr-2 group-hover:animate-spin" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
        </svg>
        Get Started
    </a>
</div>


