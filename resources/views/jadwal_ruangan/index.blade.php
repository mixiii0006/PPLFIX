<x-app-layout>
    {{-- show all error validation --}}
    @if ($errors->any())
        <div class="text-red-500">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <section class="bg-white py-3 antialiased dark:bg-gray-900 md:pb-4">
        <div class="py-5 px-4 mx-auto max-w-screen-xl lg:py-5 lg:px-6">
          <!-- Heading & Filters -->
          <div class="mb-4 items-end justify-between space-y-4 sm:flex sm:space-y-0 md:mb-8 ">
            <div>
              <nav class="flex mb-4" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <div>
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-blue-500 dark:text-blue-500">Selamat Datang {{ Auth::user()->name }}!</h2>
                    <p class="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">MedSched! Sistem Informasi Manajemen Penjadwalan Ruang FKIK Universitas Bengkulu. Efisiensi Waktu, Maksimalkan Ruang!.</p>
                </div>
                </ol>
              </nav>

              <div class="inline-flex flex-col w-full rounded-md shadow-sm md:w-auto md:flex-row" role="group">
                <div class="inline-flex flex-col w-full rounded-md shadow-sm md:w-auto md:flex-row" role="group">
                    <a href="{{ route('jadwal_ruangan.show', 'Senin') }}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-t-lg md:rounded-tr-none md:rounded-l-lg hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-2 focus:ring-primary-700 focus:text-primary-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-primary-500 dark:focus:text-white">
                      Senin
                    </a>
                    <a href="{{ route('jadwal_ruangan.show', 'Selasa') }}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-gray-200 border-x md:border-x-0 md:border-t md:border-b hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-2 focus:ring-primary-700 focus:text-primary-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-primary-500 dark:focus:text-white">
                      Selasa
                    </a>
                    <a href="{{ route('jadwal_ruangan.show', 'Rabu') }}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-gray-200 border-x md:border-x-0 md:border-l md:border-b hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-2 focus:ring-primary-700 focus:text-primary-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-primary-500 dark:focus:text-white">
                      Rabu
                    </a>
                    <a href="{{ route('jadwal_ruangan.show', 'Kamis') }}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-gray-200 border-x md:border-x-0 md:border-l md:border-b hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-2 focus:ring-primary-700 focus:text-primary-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-primary-500 dark:focus:text-white">
                      Kamis
                    </a>
                    <a href="{{ route('jadwal_ruangan.show', 'Jumat') }}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-b-lg md:rounded-bl-none md:rounded-r-lg hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-2 focus:ring-primary-700 focus:text-primary-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-primary-500 dark:focus:text-white">
                      Jumat
                    </a>
                  </div>

              </div>
            </div>

            <div class="flex items-center space-x-4">
              <button id="defaultModalButton"   data-modal-target="defaultModal"data-modal-toggle="defaultModal" type="button" class="flex w-full items-center justify-center rounded-lg border  border-blue-500 bg-white px-3 py-2 text-sm font-medium text-blue-500 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-blue focus:ring-4 focus:ring-blue-100 dark:border-blue-500 dark:bg-gray-800 dark:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-blue dark:focus:ring-blue-00 sm:w-auto">
                <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                    <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                </svg>
                Tambah
                <svg class="-me-0.5 ms-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
                </svg>
              </button>

              {{-- <button data-modal-toggle="filterModal" data-modal-target="filterModal" type="button" class="flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 sm:w-auto">
                <svg class="-ms-0.5 me-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M18.796 4H5.204a1 1 0 0 0-.753 1.659l5.302 6.058a1 1 0 0 1 .247.659v4.874a.5.5 0 0 0 .2.4l3 2.25a.5.5 0 0 0 .8-.4v-7.124a1 1 0 0 1 .247-.659l5.302-6.059c.566-.646.106-1.658-.753-1.658Z" />
                </svg>
                Filters
                <svg class="-me-0.5 ms-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
                </svg>
              </button>
              <button id="sortDropdownButton1" data-dropdown-toggle="dropdownSort1" type="button" class="flex w-full items-center justify-center rounded-lg border border-gray-200 bg-white px-3 py-2 text-sm font-medium text-gray-900 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:focus:ring-gray-700 sm:w-auto">
                <svg class="-ms-0.5 me-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4v16M7 4l3 3M7 4 4 7m9-3h6l-6 6h6m-6.5 10 3.5-7 3.5 7M14 18h4" />
                </svg>
                Sort
                <svg class="-me-0.5 ms-2 h-4 w-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
                </svg>
              </button>
              <div id="dropdownSort1" class="z-50 hidden w-40 divide-y divide-gray-100 rounded-lg bg-white shadow dark:bg-gray-700" data-popper-placement="bottom">
                <ul class="p-2 text-left text-sm font-medium text-gray-500 dark:text-gray-400" aria-labelledby="sortDropdownButton">
                  <li>
                    <a href="#" class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"> The most popular </a>
                  </li>
                  <li>
                    <a href="#" class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"> Newest </a>
                  </li>
                  <li>
                    <a href="#" class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"> Increasing price </a>
                  </li>
                  <li>
                    <a href="#" class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"> Decreasing price </a>
                  </li>
                  <li>
                    <a href="#" class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"> No. reviews </a>
                  </li>
                  <li>
                    <a href="#" class="group inline-flex w-full items-center rounded-md px-3 py-2 text-sm text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"> Discount % </a>
                  </li>
                </ul>
              </div> --}}

            </div>
          </div>

          <div class="mb-4 grid grid-cols-1 gap-4 sm:grid-cols-2 md:mb-8 lg:grid-cols-3 xl:grid-cols-4">
            @foreach ($datas as $data)
            <div class="">
              <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-lg shadow-gray-500/50 dark:border-gray-700 dark:bg-gray-800">
                <div class="text-center mb-4">
                    <a href="#" class="text-lg font-bold text-blue-500 leading-tight">Jadwal</a>
                </div>
                <table>
                    <tr>
                        <td class="pr-4"><a href="#" class="text-sm font-semibold leading-tight text-gray-900 hover:underline dark:text-white">Ruangan</a></td>
                        <td class="pr-2 text-sm font-semibold leading-tight text-gray-900 hover:underline dark:text-white">:</td>
                        <td class="text-sm font-normal leading-tight text-gray-900 hover:underline dark:text-white">{{ $data->ruangan->nama_ruangan }}</td>
                    </tr>
                    <tr>
                        <td class="pr-4"><a href="#" class="text-sm font-semibold leading-tight text-gray-900 hover:underline dark:text-white">Matakuliah</a></td>
                        <td class="pr-2">:</td>
                        <td class="text-sm font-normal leading-tight text-gray-900 hover:underline dark:text-white">{{ $data->pemetaan->mata_kuliah->nama_matakuliah }}</td>
                    </tr>
                    <tr>
                        <td class="pr-4"><a href="#" class="text-sm font-semibold leading-tight text-gray-900 hover:underline dark:text-white">Dosen</a></td>
                        <td class="pr-2">:</td>
                        <td class="text-sm font-normal leading-tight text-gray-900 hover:underline dark:text-white">{{ $data->pemetaan->dosen->Nama }}</td>
                    </tr>
                    <tr>
                        <td class="pr-4"><a href="#" class="text-sm font-semibold leading-tight text-gray-900 hover:underline dark:text-white">Jam Masuk</a></td>
                        <td class="pr-2">:</td>
                        <td class="text-sm font-normal leading-tight text-gray-900 hover:underline dark:text-white">{{ $data->jam_masuk }}</td>
                    </tr>
                    <tr>
                        <td class="pr-4"><a href="#" class="text-sm font-semibold leading-tight text-gray-900 hover:underline dark:text-white">Jam Keluar</a></td>
                        <td class="pr-2">:</td>
                        <td class="text-sm font-normal leading-tight text-gray-900 hover:underline dark:text-white">{{ $data->jam_keluar }}</td>
                    </tr>
                    <tr>
                        <td class="pr-4"><a href="#" class="text-sm font-semibold leading-tight text-gray-900 hover:underline dark:text-white">Hari</a></td>
                        <td class="pr-2">:</td>
                        <td class="text-sm font-normal leading-tight text-gray-900 hover:underline dark:text-white">{{ $data->hari }}</td>
                    </tr>
                </table>

                <div class="mt-4 flex items-center justify-between gap-4">
                   <div class="flex items-center justify-end gap-1">
                    <button id='{{$data->id}}-editButton' data-modal-target="{{$data->id}}-updateProductModal" data-modal-toggle="{{$data->id}}-updateProductModal"  type="button" data-tooltip-target="tooltip-quick-look" class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                      <span class="sr-only"> Edit </span>
                      <svg class="w-5 h-5 text-gray-800 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                      </svg>
                    </button>
                    <div id="tooltip-quick-look" role="tooltip" class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700" data-popper-placement="top">
                      Edit
                      <div class="tooltip-arrow" data-popper-arrow=""></div>
                    </div>

                    <button id='{{$data->id}}-deleteButton'  data-modal-target="{{$data->id}}-deleteModal" data-modal-toggle="{{$data->id}}-deleteModal" type="button" data-tooltip-target="tooltip-add-to-favorites" class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                      <span class="sr-only"> Hapus </span>
                      <svg class="w-5 h-5 text-red-400 dark:text-red-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                      </svg>
                    </button>
                    <div id="tooltip-add-to-favorites" role="tooltip" class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700" data-popper-placement="top">
                     Hapus
                      <div class="tooltip-arrow" data-popper-arrow=""></div>
                    </div>
                  </div>

                  <button type="button" class="inline-flex items-center  border border-blue-500 rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-blue-500 hover:bg-primary-800 focus:outline-none focus:ring-4  focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    Detail
                  </button>
                </div>

              </div>

            <x-hapus :id="$data->id" :route="route('jadwal_ruangan.destroy', $data->id)"/>

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
                            <form action="{{ route('jadwal_ruangan.update', $data->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="grid gap-4 mb-7 sm:grid-cols-1">
                                    <label for="matakuliah-{{$data->id}}" class="block  text-sm font-medium text-gray-900 dark:text-white">Mata Kuliah</label>
                                <select name="pemetaan_id" id="matakuliah-{{$data->id}}" class="js-example-basic-multiple bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" name="state" >
                                    @foreach ($pemetaan as $item)
                                        <option value="{{ $item->id }}" >{{ $item->mata_kuliah->nama_matakuliah }}</option>
                                    @endforeach
                                </select>
                                @error('pemetaan_id')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror


                                <label for="ruangan-{{$data->id}}" class="block  text-sm font-medium text-gray-900 dark:text-white">Ruang</label>
                                <select name="ruangan_id" id="ruangan-{{$data->id}}" class="js-example-basic-multiple bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" name="state">
                                    @foreach ($ruangan as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_ruangan }}</option>
                                    @endforeach
                                </select>
                                @error('pemetaan_id')
                                    <div class="text-red-500">{{ $message }}</div>
                                @enderror
                                <div>
                                    <label for="jam_masuk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jam Masuk</label>
                                    <input type="time" name="jam_masuk" id="jam_masuk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('jam_masuk', $data->jam_masuk) }}" required="">
                                </div>
                                <div>
                                    <label for="jam_keluar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jam Keluar</label>
                                    <input type="time" name="jam_keluar" id="jam_keluar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="{{ old('jam_keluar', $data->jam_keluar) }}" required="">
                                </div>
                                    <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                                    <select id="category" name="hari" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option selected="hari">{{ old('hari', $data->hari)}}</option>
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                    </select>
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
          </div>
        </div>

          {{-- modal tambah --}}
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
                    <form action="{{ route('jadwal_ruangan.store') }}" method="POST">
                        @csrf
                        <div class="grid gap-4">
                            <div class="grid gap-4 mb-7 sm:grid-cols-1">

                                <label for="nama_matakuliah" class="block  text-sm font-medium text-gray-900 dark:text-white">Mata Kuliah</label>
                                <select name="pemetaan_id" id="nama_matakuliah" class="js-example-basic-multiple bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  multiple="multiple">
                                    @foreach ($pemetaan as $item)
                                        <option value="{{ $item->id }}">{{ $item->mata_kuliah->nama_matakuliah }}</option>
                                    @endforeach
                                </select>
                                    @error('pemetaan_id')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror


                                <label for="nama_ruangan" class="block  text-sm font-medium text-gray-900 dark:text-white">Ruang</label>
                                <select name="ruangan_id" id="nama_ruangan" class="js-example-basic-multiple bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" name="states" multiple="multiple">
                                    @foreach ($ruangan as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_ruangan }}</option>
                                    @endforeach
                                </select>
                                    @error('pemetaan_id')
                                        <div class="text-red-500">{{ $message }}</div>
                                    @enderror
                                <div>
                                    <label for="jam_masuk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jam Masuk</label>
                                    <input type="time" name="jam_masuk" id="jam_masuk" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="" required="">
                                </div>
                                <div>
                                    <label for="jam_keluar" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jam Keluar</label>
                                    <input type="time" name="jam_keluar" id="jam_keluar" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" value="" required="">
                                </div>

                                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                                <select id="category" name="hari" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option selected="hari">Hari</option>
                                    <option value="Senin">Senin</option>
                                    <option value="Selasa">Selasa</option>
                                    <option value="Rabu">Rabu</option>
                                    <option value="Kamis">Kamis</option>
                                    <option value="Jumat">Jumat</option>
                                </select>
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
            // function searchData() {
            // const searchInput = document.getElementById('simple-search').value.toLowerCase();
            // const dataContainer = document.getElementById('data-container');
            // const rows = dataContainer.getElementsByTagName('tr');

            // for (let i = 0; i < rows.length; i++) {
            //     const cells = rows[i].getElementsByTagName('td');
            //     let found = false;

            //     for (let j = 0; j < cells.length; j++) {
            //         if (cells[j]) {
            //             const cellText = cells[j].textContent || cells[j].innerText;
            //             if (cellText.toLowerCase().includes(searchInput)) {
            //                 found = true;
            //                 break;
            //             }
            //         }
            //     }

            //     if (found) {
            //         rows[i].style.display = '';
            //     } else {
            //         rows[i].style.display = 'none';
            //     }
            //     }
            // }

            // document.getElementById('simple-search').addEventListener('input', searchData);

            // searchData();


            // document.addEventListener("DOMContentLoaded", function(event) {
            // document.getElementById('defaultModalButton').click();
            // });

            $(document).ready(function() {
                    $('.js-example-basic-multiple').select2();
                });

        </script>


        </div>
     

      </section>

</x-app-layout>
