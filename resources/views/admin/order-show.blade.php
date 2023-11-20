<x-admin-layout>
    @section('title') {{'Lihat Merek'}} @endsection
    <div class="p-4 sm:ml-64">
        <div class="p-4 dark:border-gray-700 mt-14">

            <!-- Breadcrumb -->
            <nav class="flex px-5 py-3 mb-5 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="/admin" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <a href="{{route('order.index')}}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Pesanan</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Lihat Pesanan</span>
                        </div>
                    </li>
                </ol>

            </nav>
            <div class="bg-white rounded mx-auto p-4">
                <div class="flex gap-3">
                    <p>Nama Pemesan : </p>
                    <h1>{{$produk->name}}</h1>
                </div>
                <div class="flex gap-3">
                    <p>Email Pemesan : </p>
                    <h1>{{$produk->email}}</h1>
                </div>
                <div class="flex gap-3">
                    <p>Nama Produk : </p>
                    <h1>{{$produk->nama}}</h1>
                </div>
                <div class="flex gap-3">
                    <p>Total Pembayaran : </p>
                    <h1>{{$produk->totalpembayaran}}</h1>
                </div>

                <div class="flex gap-3">
                    <p>Status Transaksi : </p>
                    @if ($produk->statusorder == 3)
                    <h1>Transaksi Selesai</h1>
                    @elseif ($produk->statusorder == 2)

                    @if ($produk->konfimasiadmin == 'valid')
                    <h1>Pembayaran Dikonfirmasi</h1>
                    @elseif ($produk->konfimasiadmin == 'invalid')
                    <h1>Pembayaran Ditolak</h1>
                    @else
                    <h1>Menunggu Konfirmasi Admin</h1>
                    @endif
                    @else
                    <h1>Belum Dibayar</h1>
                    @endif
                </div>
            </div>
            <div class="bg-white mt-4 rounded mx-auto p-4">
                <div class="flex gap-3">
                    <h1 class="font-bold">Bukti Pembayaran</h1>
                </div>
                <div class="flex gap-3">
                    <h1>Nama Bank</h1>
                    <h1>{{$produk->nama_bank}}</h1>
                </div>
                <div class="flex gap-3">
                    <h1>Kode Pembayaran</h1>
                    <h1>{{$produk->kode_pay}}</h1>
                </div>

                @if ($produk->konfimasiadmin == 'valid')
                <div class="">
                    <h1>Bukti Pembayaran : </h1>
                    <img src="{{ asset('/storage/bukti/'.$produk->bukti) }}" class="h-auto w-96 rounded-sm" alt="">
                </div>
                @elseif ($produk->konfimasiadmin == 'invalid')
                <h1>Bukti Pembayaran : </h1>
                <img src="{{ asset('/storage/bukti/'.$produk->bukti) }}" class="h-auto w-96 rounded-sm" alt="">
                <div class="flex mt-4 gap-3">
                    <form action="{{ route('order.update', $produk->idorder) }}" onsubmit="return confirm('Apakah Anda Yakin Pembayaran Valid?');" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="konfimasi" value="valid">
                        <input type="hidden" name="pesan" value="Pembayaran Diterima">
                        <button class="bg-blue-500 rounded-sm text-white p-1">Konfimasi Pembayaran</button>
                    </form>
                    <form action="{{ route('order.update', $produk->idorder) }}" onsubmit="return confirm('Apakah Anda Yakin Pembayaran Invalid?');" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="konfimasi" value="invalid">
                        <input type="hidden" name="pesan" value="Pembayaran Ditolak">
                        <button class="bg-rose-500 rounded-sm text-white p-1">Tolak Pembayaran</button>
                    </form>
                </div>
                @else
                @if ($produk->status_pay == 'Paid')
                <h1>Bukti Pembayaran : </h1>
                <img src="{{ asset('/storage/bukti/'.$produk->bukti) }}" class="h-auto w-96 rounded-sm" alt="">
                <div class="flex mt-4 gap-3">
                    <form action="{{ route('order.update', $produk->idorder) }}" onsubmit="return confirm('Apakah Anda Yakin Pembayaran Valid?');" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="konfimasi" value="valid">
                        <input type="hidden" name="pesan" value="Pembayaran Diterima">
                        <button class="bg-blue-500 rounded-sm text-white p-1">Konfimasi Pembayaran</button>
                    </form>
                    <form action="{{ route('order.update', $produk->idorder) }}" onsubmit="return confirm('Apakah Anda Yakin Pembayaran Invalid?');" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="konfimasi" value="invalid">
                        <input type="hidden" name="pesan" value="Pembayaran Ditolak">
                        <button class="bg-rose-500 rounded-sm text-white p-1">Tolak Pembayaran</button>
                    </form>
                </div>
                @else
                <h1>Belum Bayar</h1>
                @endif
                @endif

            </div>
        </div>
    </div>
</x-admin-layout>