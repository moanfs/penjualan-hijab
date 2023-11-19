<x-app-layout>
    <div class="bg-white w-1/3 h-32 mx-auto my-10">
        <div class="text-center">
            Kode Pembayaran
        </div>
        <div class="border rounded-sm text-center">
            <p>{{$kodepay}}</p>
            <p>{{$nama_bank}}</p>

            <a href="{{route('daftartransaksi')}}" class="bg-blue-500 text-white w-full p-1 mt-5 rounded-sm">Daftar Transaksi</a>
        </div>
    </div>
</x-app-layout>