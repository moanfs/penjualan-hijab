<x-admin-layout>
    @section('title') {{'Produk'}} @endsection
    <div class="p-4 sm:ml-64">
        <div class="p-4 dark:border-gray-700 mt-14">

            <!-- Breadcrumb -->
            <nav class="flex px-5 py-3 mb-5 text-gray-700 border justify-between border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="/admin" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Home
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Produk</span>
                        </div>
                    </li>
                </ol>
                <div class="">
                    <a href="{{route('products.create')}}" class="bg-blue-600 text-white p-1 text-[0.75rem] md:text-[1rem] gap-2 rounded-lg hover:bg-blue-800">Tambah Product</a>
                    <a href="{{route('download-produk')}}" class="bg-green-600 text-white p-1 text-[0.75rem] md:text-[1rem] gap-2 rounded-lg hover:bg-green-800">Download Produk</a>
                </div>
            </nav>

            <div class="relative bg-white p-4 overflow-x-auto shadow-md sm:rounded-lg">
                <!-- <div class="flex items-center justify-end pb-4">
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" id="table-search" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for items">
                    </div>
                </div> -->
                @if (session()->has('success'))
                <span class="text-white bg-green-500 flex text-center rounded-sm p-1 ">
                    {{session('success')}}
                </span>
                @endif
                <table id="table_id" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nama Produk
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Brand
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Kategori
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jumlah
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Diskon
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Berat (gram)
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$product->nama}}
                            </th>
                            <td class="px-6 py-4">
                                {{$product->brtel}}
                            </td>
                            <td class="px-6 py-4">
                                {{$product->catel}}
                            </td>
                            <td class="px-6 py-4">
                                {{$product->amount}}
                            </td>
                            <td class="px-6 py-4">
                                @if ($product->dis_status = 1)
                                {{$product->discount}}
                                @else
                                <span>tidak ada</span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                {{$product->weight}}
                            </td>
                            <td class="px-6 py-4">
                                <form onsubmit="return confirm('Apakah Anda Yakin Ingin Hapus?');" action="{{ route('products.destroy', $product->id) }}" method="POST">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{route('products.edit', $product->id)}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="rounded-lg font-medium text-rose-500 hover:underline">HAPUS</button>
                                    </div>
                                </form>

                            </td>
                        </tr>
                        @empty
                        <div class="bg-rose-500 rounded-sm py-1 text-white text-center">
                            Data Produk Tidak Tersedia
                        </div>
                        @endforelse


                    </tbody>
                </table>
            </div>

        </div>
    </div>

</x-admin-layout>