<x-app-layout>
    <div class="header flex rounded-md  bg-white m-auto w-[40%]">
        <!-- <div class="flex justify-between"> -->
        <div class="p-5">
            <a href="{{route('daftartransaksi')}}" class="bg-blue-500 text-white p-2 rounded-sm">Daftar Transaksi Lainya</a>
        </div>
        <!-- </div> -->
    </div>
    <div class="bg-white w-1/2 p-10 h-auto mx-auto my-10">
        <div class="text-center">
            Pengiriman Barang
        </div>
        <div class="flex justify-between">
            <h1>Resi :</h1>
            <p>{{$pengiriman->resi}}</p>
        </div>
        <div class="flex justify-between">
            <h1>Estimasi :</h1>
            <p>{{$pengiriman->etd}} Hari</p>
        </div>
        <div class="flex justify-between">
            <h1>Tanggal Pemesanan :</h1>
            <p>{{$pengiriman->updated_at}}</p>
        </div>
    </div>
    <div class="bg-white w-1/2 p-10 h-auto mx-auto my-10">

        <div class="rounded-sm text-center mt-5">
            <div class="flex justify-between mb-1">
                <span class="text-base font-medium text-blue-700 dark:text-white">Dikemas</span>
                <span class="text-base font-medium text-blue-700 dark:text-white">Dikirim</span>
                <span class="text-sm font-medium text-blue-700 dark:text-white">Diterima</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                <div class="bg-blue-600 h-2.5 rounded-full" style="width:{{$pengiriman->diterima}}%"></div>
            </div>
            <div>
                @if ($pengiriman->diterima == 100)
                <h1 class="mt-4 text-lg">Selesai</h1>
                @elseif ($pengiriman->diterima == 1)
                <h1 class="mt-4 text-lg">Dikemas</h1>
                @else
                <form action="{{route('pengiriman.update', $pengiriman->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="bg-blue-500 p-2 text-white rounded-md mt-3">Barang Diterima</button>
                </form>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>