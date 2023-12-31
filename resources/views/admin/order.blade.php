<x-admin-layout>
    @section('title') {{'Pesanan'}} @endsection
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
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Order</span>
                        </div>
                    </li>
                </ol>
                <div class="bg-blue-600 text-white p-1 rounded-lg hover:bg-blue-800">
                    <a href="{{route('download-pesanan')}}">Download</a>
                </div>
            </nav>

            <div class="relative bg-white p-4 overflow-x-auto shadow-md sm:rounded-lg">

                @if (session()->has('success'))
                <span class="text-white bg-green-500 flex text-center rounded-sm p-1 ">
                    {{session('success')}}
                </span>
                @endif
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Nama Pembeli
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Nama Produk
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Harga
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Jumalh Pesanan
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$order->name}}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$order->nama}}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$order->price}}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$order->dibeli}}
                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                @if ($order->status_pay == 'Paid')

                                @if ($order->konfimasiadmin == 'valid')
                                <h1>Pembayaran dikonfrimasi</h1>
                                @elseif ($order->konfimasiadmin == 'invalid')
                                <h1>Pembayaran ditolak</h1>
                                @elseif ($order->konfimasiadmin == 'ulang')
                                <h1>menunggu konfrimasi ulang</h1>
                                @else
                                <h1>Menunggu Konfirmai Admin</h1>
                                @endif

                                @else
                                <h1>Belum Bayar</h1>
                                @endif


                            </th>
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <a href="{{route('order.show', $order->idorder)}}" class="font-medium text-white bg-green-500 p-2 rounded-lg hover:bg-green-800">Show</a>
                            </th>
                        </tr>
                        @empty
                        <div class="bg-rose-500 rounded-sm py-1 text-white text-center">
                            <p>Data Penjualan Tidak Tersedia</p>
                        </div>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</x-admin-layout>