<x-app-layout>
    <div class="bg-white w-[30%] mt-5 p-2 rounded-md mx-auto">
        @if (session()->has('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="font-medium">Berhasil!</span> {{session('success')}}
        </div>
        @endif
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
        <div class="flex justify-between mt-3">
            <h1>Kode Pemabayaran</h1>
            <p>{{$daftar->kode_pay}}</p>
        </div>
        <div class="flex justify-between mt-3">
            <h1>Nama Bank</h1>
            <p>{{$daftar->nama_bank}}</p>
        </div>
        <div class="flex justify-center">
            @if($daftar->status ==2)
            <form action="{{route('penilaian')}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$daftar->id}}">
                <button type="submit" class="bg-blue-500 rounded-md text-white w-full text-center p-1 m-2">Penilain</button>
            </form>
            @elseif ($daftar->status == 1)
            <form action="{{route('selesai')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$daftar->id}}">
                <label class="block my-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload Bukti Pembayaran</label>
                <input name="bukti" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file" required>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">Bukti Pembayaran Hanya Bisa PNG, JPEG, JPG</p>

                <button type="submit" class="bg-blue-500 rounded-md text-white w-full text-center p-1 m-2">Upload Bukti Pembayaran</button>
            </form>
            @else
            <h1>Pesanan selesai</h1>
            @endif
        </div>
    </div>
</x-app-layout>