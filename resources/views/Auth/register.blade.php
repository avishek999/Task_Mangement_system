@include('components.header')




<div class="flex flex-col items-center justify-center min-h-screen p-4 ">
    <form action=" {{ route('register') }}" method="POST" class="bg-white p-6 rounded-lg w-full max-w-md">
        @csrf
      <h3 class="font-medium text-2xl mb-2 text-center">Create an account</h3>
      <p class="mb-4 text-center">Enter your email to sign up for this app</p>
      <input type="name" name="name" id="name" class="w-full p-2 border rounded-lg mb-4 placeholder:font-medium" placeholder="Name">
      @error('name')
      <span class="text-red-500 text-sm">{{ $message }}</span>
  @enderror
      <input type="email" name="email" id="email" class="w-full p-2 border rounded-lg mb-4 placeholder:font-medium" placeholder="email@domain.com">
      @error('email')
      <span class="text-red-500 text-sm">{{ $message }}</span>
  @enderror
      <input type="password" name="password" id="password" class="w-full p-2 border rounded-lg mb-4 placeholder:font-medium" placeholder="password">
      @error('password')
      <span class="text-red-500 text-sm">{{ $message }}</span>
  @enderror

      <button type="submit" class="w-full bg-black p-2 text-white rounded-lg mb-4 hover:bg-white hover:border-2 duration-200  border-black hover:text-black
      ">Sign up with email</button>
      <div class="flex items-center my-4">
        <div class="flex-grow h-px bg-gray-300"></div>
        <span class="px-4 text-gray-500">OR </span>
        <div class="flex-grow h-px bg-gray-300"></div>
      </div>
      <a href="{{url('login')}}" type="button" class="group w-full font-medium bg-gray-200 rounded-lg p-2 mb-4 flex items-center  gap-3 hover:bg-gray-300 duration-200"> 
        <img width="30" class="group-hover:animate-bounce" src="https://img.icons8.com/?size=100&id=1CE0gYy8a1e6&format=png&color=000000" alt="">
        <span class="pl-28">Log In</span></a>
      <p class="text-center text-gray-500 text-sm">
        By clicking continue, you agree to our 
        <a href="#" class="text-black font-medium">Terms of Service</a> 
        and 
        <a href="#" class="text-black font-medium">Privacy Policy</a>.
      </p>
    </form>
  </div>
  