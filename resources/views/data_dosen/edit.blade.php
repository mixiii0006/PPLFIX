<x-app-layout>
    {{-- @props(['id','route']) --}}


    <div id= "{{$datas->id}}-updateModal" class="bg-white dark:bg-gray-800 dark:text-gray-300 overflow-hidden shadow-sm sm:rounded-lg">
            <!-- Modal body -->
            <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
            <form action="{{ route('data_dosen.update', $datas->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class=" text-center mb-8 lg:mb-8">
                    <h2 class="mb-2 mt-4 text-3xl tracking-tight font-bold text-blue-500 dark:text-blue-500">Edit Data</h2>
                </div>
                <div class="grid gap-4 mb-7 sm:grid-cols-1">
                    <div>
                        <label for="NIP" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NIP</label>
                        <input type="text" name="NIP" id="NIP" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('NIP', $datas->NIP) }}" required="">
                    </div>
                    <div>
                        <label for="Nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                        <input type="text" name="Nama" id="Nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('Nama', $datas->Nama) }}" required="">

                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <button id='{{$datas->id}}-update' type="submit" class="text-blue-500 bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-8 py-2.5 text-center border border-blue-500 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        Update
                    </button>
                    {{-- <form action="{{ route('data-diri.destroy', $datas->id) }}" method="POST">
                        @csrf
                        @method('DELETE') --}}
                        {{-- <button id='{{$datas->id}}-deleteButton'  data-modal-target="{{$datas->id}}-deleteModal" data-modal-toggle="{{$datas->id}}-deleteModal"  type="button" class="text-red-600 rounded-lg inline-rounded-lg flex items-center hover:text-white border border-red-600 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium text-sm px-5 py-2.5 text-center dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900">
                            <svg class="mr-1 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                            Delete
                        </button>
                        <x-hapus :id="$datas->id" :route="route('data-diri.destroy', $datas->id)"/> --}}
                    {{-- </form> --}}
                </div>
            </form>
        </div>

    </div>


<script>
  document.addEventListener("DOMContentLoaded", function(event) {
  document.getElementById('{{$datas->id}}-editButton').click();
  });
</script>


</x-app-layout>

