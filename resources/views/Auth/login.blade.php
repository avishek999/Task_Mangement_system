
<div class="flex flex-col items-center justify-center min-h-screen p-4 ">
@include('components.header')
   
    <form action=" {{ route('login') }}" method="POST" class="bg-white p-6 rounded-lg w-full max-w-md">
        @csrf
      <h3 class="font-medium text-2xl mb-2 text-center">Login with your account</h3>
      <p class="mb-4 text-center">Enter your email to Login </p>
      <input type="email" name="email" id="email" class="w-full p-2 border rounded-lg mb-4 placeholder:font-medium" placeholder="email@domain.com">
      @error('email')
      <span class="text-red-500 text-sm">{{ $message }}</span>
  @enderror
      <input type="password" name="password" id="password" class="w-full p-2 border rounded-lg mb-4 placeholder:font-medium" placeholder="password">
      @error('password')
      <span class="text-red-500 text-sm">{{ $message }}</span>
  @enderror

      <button type="submit" class="w-full bg-black p-2 text-white rounded-lg mb-4 hover:bg-white hover:border-2 duration-200  border-black hover:text-black
      ">Log In</button>
      <div class="flex items-center my-4">
        <div class="flex-grow h-px bg-gray-300"></div>
        <span class="px-4 text-gray-500">OR </span>
        <div class="flex-grow h-px bg-gray-300"></div>
      </div>
      <a href="{{url('register')}}" type="button" class=" group w-full font-medium bg-gray-200 rounded-lg p-2 mb-4 flex items-center  gap-3 hover:bg-gray-300 duration-200"> 
        <img width="30 " class="group-hover:transition-all group-hover:animate-bounce " src="https://img.icons8.com/?size=100&id=IVlCJgXg1RYx&format=png&color=000000" alt="">
        <span class="pl-28">Sign Up</span></a>
      <p class="text-center text-gray-500 text-sm">
        By clicking continue, you agree to our 
        <a href="#" class="text-black font-medium">Terms of Service</a> 
        and 
        <a href="#" class="text-black font-medium">Privacy Policy</a>.
      </p>
    </form>
  </div>
  