@include('components.header')
@include('components.navbar')

<form action="{{ route('create') }}" method="POST">
    @csrf
<div class="flex flex-col items-center justify-center p-8" style="height: calc(100vh - 4rem);">
    <div class="flex px-16 py-8 flex-col shadow-xl rounded-2xl outline outline-offset-2 outline-4   bg-gray-200 outline-offset-4 outline-4">
        <h1 class="3xl font-bold mb-4 text-center font-sans" >Create a New Task</h1>
      <input type="text" name="title" id="title" class="w-full p-2 border rounded-lg mb-4 placeholder:font-medium" placeholder="Task title">
      <textarea type="text" name="description" id="name" class="w-full p-2 border rounded-lg mb-4 placeholder:font-medium" placeholder="Task Descrition"></textarea>
      <input type="date" name="deadline" id="name" class="w-full p-2 border rounded-lg mb-4 placeholder:font-medium" placeholder="Name">
      <div class="flex items-center">
        <label class="inline-flex items-center">
            <input type="radio" class="form-radio text-indigo-600" name="status" value="completed">
            <span class="ml-2">Completed</span>
        </label>
        <label class="inline-flex items-center ml-6">
            <input type="radio" class="form-radio text-red-600" name="status" value="pending">
            <span class="ml-2">Pending</span>
        </label>
    </div>
    <button  type="submit" class="px-4 py-2 bg-black rounded-full font-bold hover:outline-dashed hover:bg-white hover:text-black transition-all text-white mt-4"> Add New Task</button>
        </div>
    </div>

</div>
</form>