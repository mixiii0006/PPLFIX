<x-app-layout>

    <section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5 ">

            <!-- Start coding here -->
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="w-full md:w-1/2">
                        <form class="flex items-center">
                            <label for="simple-search" class="sr-only">Search</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <input type="text" id="simple-search" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                            </div>
                        </form>
                    </div>
                    <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <button  type="button" id="defaultModalButton"   data-modal-target="defaultModal"data-modal-toggle="defaultModal"
                        class="flex items-center justify-center text-blue-500 bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800 border border-blue-500">
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        Tambah
                    </button>

                    </div>
                </div>
                <div  class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-4 py-3">NO</th>
                                <th scope="col" class="px-4 py-3">Mata Kuliah</th>
                                <th scope="col" class="px-4 py-3">Dosen</th>
                                <th scope="col" class="px-4 py-3">Tanggal Mulai</th>
                                <th scope="col" class="px-4 py-3">Tanggal Selesai</th>


                                <th scope="col" class="px-4 py-3">
                                    <span class="sr-only">Actions</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="data-container">
                            @foreach ($datas as $data)
                            <tr class="border-b dark:border-gray-700">
                                <td class="px-4 py-3">{{ $data->id}}</td>
                                <td class="px-4 py-3">{{ $data->mata_kuliah->nama_matakuliah ?? 'N/A' }}</td>
                                <td class="px-4 py-3">{{ $data->dosen->Nama ?? 'N/A' }}</td>
                                <td class="px-4 py-3">{{ $data->tanggal_mulai}}</td>
                                <td class="px-4 py-3">{{ $data->tanggal_selesai}}</td>
                                <td class="px-4 py-3 flex items-center justify-end">
                                    <button id="{{$data->id}}-dropdown-button" data-dropdown-toggle="{{$data->id}}-dropdown" class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100" type="button">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                    <div id="{{$data->id}}-dropdown" class="hidden z-10 w-43 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="{{$data->id}}-dropdown-button">
                                            <li>
                                                <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Show</a>
                                            </li>
                                            <li>
                                                <a  id='{{$data->id}}-editButton' data-modal-target="{{$data->id}}-updateProductModal" data-modal-toggle="{{$data->id}}-updateProductModal" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>

                                            </li>
                                        </ul>

                                        <div class="" >
                                                <button id='{{$data->id}}-deleteButton'  data-modal-target="{{$data->id}}-deleteModal" data-modal-toggle="{{$data->id}}-deleteModal"  type="button" class="block py-2 text-end px-16  text-gray-700 hover:bg-red-600 dark:hover:bg-red-600 rounded-sm dark:text-gray-200 dark:hover:text-white">
                                                     Delete
                                                </button>
                                        </div>
                                </td>
                            </tr>
                            <x-hapus :id="$data->id" :route="route('pemetaan_mk.destroy', $data->id)"/>

                                <div id="{{$data->id}}-updateProductModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden   bg-gray-500 bg-opacity-25 fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                                    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                                        <!-- Modal content -->
                                        <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                            <!-- Modal header -->
                                            <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                                                <h3 class="text-lg font-bold  text-center text-blue-500 dark:text-blue-500">
                                                    Edit Data
                                                </h3>
                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="{{$data->id}}-updateProductModal">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <form action="{{ route('pemetaan_mk.update', $data->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <div class="grid gap-4 mb-7 sm:grid-cols-1">
                                                    <div class="search-box">
                                                        <label for="nama_matakuliah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mata Kuliah</label>
                                                        <input type="text" name="nama_matakuliah" id="nama_matakuliah" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('nama_matakuliah', $data->nama_matakuliah) }}" required="">
                                                    </div>

                                                    <div>
                                                        <label for="tingkat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tingkat</label>
                                                        <input type="text" name="tingkat" id="tangkat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('tingkat', $data->tingkat) }}" required="">
                                                    </div>
                                                    <div>
                                                        <label for="tanggal_mulai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Mulai</label>
                                                        <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('tanggal_mulai', $data->tanggal_mulai) }}" required="">
                                                    </div>
                                                    <div>
                                                        <label for="tanggal_selesai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Selesai</label>
                                                        <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('tanggal_selesai', $data->tanggal_selesai) }}" required="">
                                                    </div>
                                                </div>
                                                <div class="flex items-center space-x-4">
                                                    <button id='{{$data->id}}-update' type="submit" class="text-blue-500 bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-8 py-2.5 text-center border border-blue-500 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                                        Update
                                                    </button>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <script>   document.addEventListener("DOMContentLoaded", function(event) {
                                    document.getElementById('{{$data->id}}-editButton ').click();
                                    });
                            </script>

                            @endforeach

                        </tbody>
                    </table>
                </div>
                <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4" aria-label="Table navigation"></nav>

            </div>

            <div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden bg-gray-500 bg-opacity-25  overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                    <!-- Modal content -->
                    <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                        <!-- Modal header -->
                        <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                            <h3 class="text-lg font-bold  text-center text-blue-500 dark:text-blue-500">
                                Tambah Data
                            </h3>
                            <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <!-- Modal body -->
                        <form action="{{ route('pemetaan_mk.store') }}" method="POST">
                            @csrf
                            <div class="grid gap-4">
                                <div class="grid gap-4 mb-7 sm:grid-cols-1">
                                    {{-- <div class="inputBox">
                                        <label for="nama_matakuliah" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mata Kuliah</label>
                                        <input type="text" name="nama_matakuliah" id="nama_matakuliah" placeholder="Cari Mata Kuliah" autocomplete="off" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                                        <input type="hidden" id="courseData" value="{{ implode(',', $datas->pluck('nama_matakuliah')->toArray()) }}">
                                    </div> --}}
                                    
                                    <label for="nama_matakuliah" class="block  text-sm font-medium text-gray-900 dark:text-white">Mata Kuliah</label>
                                    <select name="nama_matakuliah" id="nama_matakuliah" class="js-example-basic-multiple bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" name="states[]" multiple="multiple">
                                        @foreach ($matakuliah as $item)
                                            <option value="{{ $item->nama_matakuliah }}">{{ $item->nama_matakuliah }}</option>
                                        @endforeach
                                    </select>
                                    <label for="Nama" class="block  text-sm font-medium text-gray-900 dark:text-white">Dosen</label>
                                    <select name="Nama" id="Nama" class="js-example-basic-multiple bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" name="states[]" multiple="multiple">
                                        @foreach ($dosen as $item)
                                            <option value="{{ $item->Nama }}">{{ $item->Nama }}</option>
                                        @endforeach
                                    </select>
                                    <div>
                                        <label for="tanggal_mulai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Mulai</label>
                                        <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="" required="">
                                    </div>
                                    <div>
                                        <label for="tanggal_selesai" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Selesai</label>
                                        <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="" required="">
                                    </div>
                                </div>

                            </div>
                            <button type="submit" class="flex text-blue-500 bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-8  py-2.5 text-center border border-blue-500 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                                Tambah
                            </button>
                        </form>
                    </div>
                </div>
            </div>





        <script>
            // Fungsi untuk memfilter data berdasarkan input pencarian
            function searchData() {
            const searchInput = document.getElementById('simple-search').value.toLowerCase();
            const dataContainer = document.getElementById('data-container');
            const rows = dataContainer.getElementsByTagName('tr');

            for (let i = 0; i < rows.length; i++) {
                const cells = rows[i].getElementsByTagName('td');
                let found = false;

                for (let j = 0; j < cells.length; j++) {
                    if (cells[j]) {
                        const cellText = cells[j].textContent || cells[j].innerText;
                        if (cellText.toLowerCase().includes(searchInput)) {
                            found = true;
                            break;
                        }
                    }
                }

                if (found) {
                    rows[i].style.display = '';
                } else {
                    rows[i].style.display = 'none';
                }
                }
            }

            document.getElementById('simple-search').addEventListener('input', searchData);

            searchData();


            document.addEventListener("DOMContentLoaded", function(event) {
            document.getElementById('defaultModalButton').click();
            });


            document.addEventListener('DOMContentLoaded', function() {
                const courseData = document.getElementById('courseData').value;
                let datas = courseData.split(',');

                const resultBox = document.querySelector('.resultBox');
                const inputBox = document.getElementById('nama_matakuliah');

                inputBox.addEventListener('keyup', function() {
                    let result = [];
                    let input = inputBox.value;

                    if (input.length) {
                        result = datas.filter((keyword) => {
                            return keyword.toLowerCase().includes(input.toLowerCase());
                        });

                        display(result);
                    } else {
                        resultBox.innerHTML = "";
                        resultBox.style.display = "none"; // Sembunyikan kotak hasil jika input kosong
                    }

                    if (!result.length) {
                        resultBox.innerHTML = "";
                        resultBox.style.display = "none"; // Sembunyikan kotak hasil jika tidak ada hasil
                    }
                });

                function display(result) {
                    if (result.length) {
                        const content = result.map((list) => {
                            return "<li onclick='selectInput(this)' class='cursor-pointer hover:bg-gray-200'>" + list + "</li>";
                        });
                        resultBox.innerHTML = "<ul class='border border-gray-300 bg-white'>" + content.join('') + "</ul>";
                        resultBox.style.display = "block"; // Tampilkan kotak hasil
                        }
                    }
                });

                function selectInput(list) {
                    const inputBox = document.getElementById('nama_matakuliah');
                    inputBox.value = list.innerHTML; // Set input value ke nama mata kuliah yang dipilih
                    const resultBox = document.querySelector('.resultBox');
                    resultBox.innerHTML = "";
                    resultBox.style.display = "none"; // Sembunyikan kotak hasil setelah pemilihan
                }

                $(document).ready(function() {
                    console.log("Initializing Select2...");
                    $('.js-example-basic-multiple').select2();
                });



        </script>
        </section>

    </x-app-layout>



    <script>
        let datas =[matakuliah database];

        const resultBox = document.querySelector('.resultBox');
        const inputBox = document.querySelector('.inputBox');

        inputBox.onkeyup = function() {
            let result = [];
            let input =inputBox.value;
            if (input.length) {
                result = datas.filter((keyword) => {
                return.toLowerCase().includes(input.toLowerCase())
                });
                console.log(result);
            }

            display(result);

            if(!result.length) {
                resultBox.innerHTML = "";
            }
        }

        function display(result){
            const content = result.map((list) => {
                return "<li onclick= selectInput(this)>" + list + "</li>";
            });
            resultBox.innerHTML = "<ul>" + content.join('') + "</ul>";

        }

        function selectInput(list){
            inputBox.value = list.innerHTML;
            resultBox.innerHTML = "";
        }


        // Get the course names from the hidden input
    const courseData = document.getElementById('courseData').value;
    let datas = courseData.split(','); // Split the string into an array

    const resultBox = document.querySelector('.resultBox');
    const inputBox = document.querySelector('.inputBox');

    inputBox.onkeyup = function() {
    let result = [];
    let input = inputBox.value;

    if (input.length) {
        result = datas.filter((keyword) => {
            return keyword.toLowerCase().includes(input.toLowerCase());
        });

        display(result);
    } else {
        resultBox.innerHTML = "";
        resultBox.style.display = "none"; // Hide result box if input is empty
    }

    if (!result.length) {
        resultBox.innerHTML = "";
        resultBox.style.display = "none"; // Hide result box if no results
    }
    }

    function display(result) {
        if (result.length) {
            const content = result.map((list) => {
                return "<li onclick=selectInput(this)>" + list + "</li>";
            });
            resultBox.innerHTML = "<ul>" + content.join('') + "</ul>";
            resultBox.style.display = "block"; // Show result box
        }
    }

    function selectInput(list) {
        inputBox.value = list.innerHTML;
        resultBox.innerHTML = "";
        resultBox.style.display = "none"; // Hide result box after selection
    }

    </script>
