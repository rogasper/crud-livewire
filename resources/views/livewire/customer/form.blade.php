<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="p-10 sm:px-20 bg-white border-b border-gray-200">
        <div class="w-full" >
            @csrf
            <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="first-name">
                First Name
                </label>
                <input class="appearance-none block w-full  text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="first_name" name="first_name" type="text" placeholder="your firstname" wire:model='first_name' name="first_name">
                @error('first_name')
                <p class="text-red-500 text-xs italic">{{$message}}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/3 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="middle-name">
                Middle Name
                </label>
                <input class="appearance-none block w-full  text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="middle-name" type="text" placeholder="your middlename" wire:model='middle_name' name="middle_name">
                @error('middle_name')
                <p class="text-red-500 text-xs italic">{{$message}}</p>
                @enderror
            </div>
            <div class="w-full md:w-1/3 px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="last-name">
                Last Name
                </label>
                <input class="appearance-none block w-full  text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="last-name" type="text" placeholder="your lastname" wire:model='last_name' name="last_name">
                @error('last_name')
                <p class="text-red-500 text-xs italic">{{$message}}</p>
                @enderror
            </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email" >
                Email
                </label>
                <input class="appearance-none block w-full  text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" type="text" placeholder="youremail@email.com" wire:model='email' name="email">
                @error('email')
                <p class="text-red-500 text-xs italic">{{$message}}</p>
                @enderror
            </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="address">
                        Address
                    </label>
                    <input class="appearance-none block w-full  text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="your address" type="text" id="address" wire:model='address' name="address">
                    @error('address')
                        <p class="text-red-500 text-xs italic">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="phone_number">
                        Phone Number
                    </label>
                    <div class="inline-flex w-full">
                    <span class="py-3 px-4 mb-3 bg-blue-500 rounded rounded-tr-none rounded-br-none text-white">+62</span>
                    <input class="appearance-none block w-full  text-gray-700 border border-gray-200 rounded-tl-none rounded-bl-none py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" placeholder="your phone number" id="phone_number" type="text" wire:model='phone_number' name="phone">
                </div>
                @error('phone_number')
                    <p class="text-red-500 text-xs italic">{{$message}}</p>
                @enderror
                </div>
            </div>
            <div class="flex flex-wrap -mx-3">
                <div class="w-full px-3">
                    <button type="submit" wire:click='submit'  class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full">Submit</button>
                </div>
            </div>
      </div>
    </div>
    <div>
    </div>
</div>
