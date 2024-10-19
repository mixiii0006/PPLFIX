<x-app-layout>
    <!-- Modal toggle -->
@include('data-diri.index')
<div class="flex justify-center m-5">


    <div class="bg-white dark:bg-gray-800 dark:text-gray-300 overflow-hidden shadow-sm sm:rounded-lg">
        <!-- Modal body -->
        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
        <form action="{{ route('data-diri.update', $datas->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class=" text-center mb-8 lg:mb-8">
                <h2 class="mb-2 mt-4 text-3xl tracking-tight font-bold text-blue-500 dark:text-blue-500">Edit Data</h2>
            </div>
            <div class="grid gap-4 mb-7 sm:grid-cols-1">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('name', $datas->name) }}" required="">
                </div>
                <div>
                    <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                    <input type="email" name="email" id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('email', $datas->email) }}" required="">

                </div>

                <div>
                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                    <select id="category" name="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option selected="role">{{ old('role', $datas->role) }}</option>
                        <option value="admin">Admin</option>
                        <option value="operator">Operator</option>
                        <option value="user">User</option>
                    </select>
                </div>
                {{-- <div class="sm:col-span-2">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <textarea id="description" rows="5" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Write a description...">Standard glass, 3.8GHz 8-core 10th-generation Intel Core i7 processor, Turbo Boost up to 5.0GHz, 16GB 2666MHz DDR4 memory, Radeon Pro 5500 XT with 8GB of GDDR6 memory, 256GB SSD storage, Gigabit Ethernet, Magic Mouse 2, Magic Keyboard - US</textarea>
                </div> --}}
            </div>
            <div class="flex items-center space-x-4">
                <button id='{{$datas->id}}-update' type="submit" class="text-blue-500 bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-8 py-2.5 text-center border border-blue-500 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    Update
                </button>
                
            </div>
        </form>
    </div>

</div>

<script>
  document.addEventListener("DOMContentLoaded", function(event) {
  document.getElementById('updateProductButton').click();
  });
</script>
</x-app-layout>

