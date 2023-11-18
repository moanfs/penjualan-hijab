<x-app-layout>
    <div class="bg-white w-[30%] mt-5 p-2 rounded-md mx-auto">
        <div class="flex justify-between  mt-3">
            <h1>Nama Produk</h1>
            <p>{{$daftar->nama}}</p>
        </div>
        <div class="flex justify-between mt-3">
            <h1>Total Transaksi</h1>
            <p>{{$daftar->totalselurh}}</p>
        </div>
        <div class="flex justify-between mt-3">
            <h1>Nama Pengirim</h1>
            <p>{{$daftar->nama_jasa}}</p>
        </div>
        <div class="flex justify-between mt-3">
            <h1>Resi</h1>
            <p>{{$daftar->resi}}</p>
        </div>
        <div class="flex justify-center">
            @if($daftar->status == 1)
            <form action="{{route('penilaian')}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$daftar->id}}">
                <button type="submit" class="bg-blue-500 rounded-md text-white w-full text-center p-1 m-2">Penilain</button>
            </form>
            @elseif ($daftar->status == 0)
            <form action="{{route('selesai')}}" method="post" onsubmit="return confirm('Apakah Anda Yakin Pesanan Diterima?');">
                @csrf
                <input type="hidden" name="id" value="{{$daftar->id}}">
                <button type="submit" class="bg-blue-500 rounded-md text-white w-full text-center p-1 m-2">Pesanan Diterima</button>
            </form>
            @else
            <h1>Pesanan selesai</h1>
            @endif
        </div>
    </div>
</x-app-layout>