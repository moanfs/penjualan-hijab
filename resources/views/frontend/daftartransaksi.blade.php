<x-app-layout>
    <div class="w-[60%] mx-auto bg-white mt-5">
        <div class="text-center">
            Daftar Transaksi
        </div>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Nama Produk
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama Pengirim
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Status Pembayaran
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse ($daftar as $post)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$post->nama}}
                    </th>

                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$post->totalselurh}}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$post->nama_jasa}}
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @if ($post->status_pay == 'Paid')
                        <h1>Sudah Dibayar</h1>
                        @else
                        <h1>Belum Dibayar</h1>
                        @endif
                    </th>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                        <a href="{{route('transaksi.show', $post->id)}}">Cek</a>


                    </th>
                </tr>
                @empty
                <div class="bg-rose-500 rounded-sm py-1 text-white text-center">
                    <p>Data Transaksi Tidak Tersedia</p>
                </div>
                @endforelse
            </tbody>
        </table>
    </div>
</x-app-layout>