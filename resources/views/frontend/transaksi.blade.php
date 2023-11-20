<x-app-layout>
    <div class="header flex rounded-md  bg-white m-auto w-[40%]">
        <!-- <div class="flex justify-between"> -->
        <div class="p-5">
            <a href="{{route('daftartransaksi')}}" class="bg-blue-500 text-white p-2 rounded-sm">Daftar Transaksi Lainya</a>
        </div>
        @if ($daftar->konfimasiadmin == 'valid')
        <div class="p-5">
            <a href="{{route('pengiriman.show', $daftar->id)}}" class="bg-cyan-400 text-white p-2 rounded-sm">Cek Pengiriman</a>
        </div>

        @endif
        <!-- </div> -->
    </div>
    <div class="bg-white w-[30%] mt-5 p-2 rounded-md mx-auto">
        @if (session()->has('success'))
        <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <span class="font-medium">Berhasil!</span> {{session('success')}}
        </div>
        @endif
        <div>
            <h1 class="text-center font-semibold text-lg">Transaksi</h1>
        </div>
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

        @if($daftar->status_pay == 'Paid')

        @if ($daftar->konfimasiadmin == 'valid')

        @if ($daftar->diterima == 100)
        <div class="flex justify-between mt-3">
            <h1>Status</h1>
            <p>DIterima</p>
        </div>
        @if ($daftar->status == 3)
        <h1 class="bg-blue-500 text-center text-white">Transaksi selesai</h1>
        @else
        <form action="{{route('penilaian')}}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$daftar->id}}">
            <button type="submit" class="bg-blue-500 rounded-md text-white w-full text-center p-1 m-2">Penilain</button>
        </form>
        @endif

        @else
        <div class="flex justify-between mt-3">
            <h1>Status</h1>
            <p>{{$daftar->konfimasiadmin}}</p>
        </div>
        <div class="flex justify-between mt-3">
            <h1>Bukti Pembayaran</h1>
            <img class="h-auto max-w-[10rem] my-3 shadow-md" src="{{ asset('/storage/bukti/'.$daftar->bukti) }}" alt="logo">
        </div>
        @endif

        @elseif ($daftar->konfimasiadmin == 'ulang')
        <div class="flex justify-between mt-3">
            <h1>Status</h1>
            <p class="bg-blue-500 text-white p-1 rounded-sm">{{$daftar->konfimasiadmin}}</p>
        </div>
        <div class="flex justify-between mt-3">
            <h1>Pesan</h1>
            <p>Mohon Menunggu Konfrimasi ulang</p>
        </div>
        <div class="flex justify-between mt-3">
            <h1>Bukti Pembayaran</h1>
            <img class="h-auto max-w-[10rem] my-3 shadow-md" src="{{ asset('/storage/bukti/'.$daftar->bukti) }}" alt="logo">
        </div>
        @elseif ($daftar->konfimasiadmin == 'invalid')
        <div class="flex justify-between mt-3">
            <h1>Status</h1>
            <p class="bg-rose-500 text-white rounded-md p-1">{{$daftar->konfimasiadmin}}</p>
        </div>
        <div class="flex justify-between mt-3">
            <h1>Pesan</h1>
            <p>Mohon Melakukan Pembayaran Ulang</p>
        </div>
        <div class="flex justify-between mt-3">
            <h1>Bukti Pembayaran <span class="text-rose-500">Ditolak</span></h1>
            <img class="h-auto max-w-[10rem] my-3 shadow-md" src="{{ asset('/storage/bukti/'.$daftar->bukti) }}" alt="logo">
        </div>
        <div class="flex justify-center mt-3">
            <form action="{{route('bayarulang')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$daftar->id}}">
                <label class="block my-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload Bukti Pembayaran Ulang</label>
                <input name="bukti" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file" required>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">Bukti Pembayaran Hanya Bisa PNG, JPEG, JPG</p>
                @error('bukti')
                <span class="text-rose-500">
                    <p>{{ $message }}</p>
                </span>
                @enderror
                <button type="submit" class="bg-blue-500 rounded-md text-white w-full text-center p-1 m-2">Upload Bukti Pembayaran</button>
            </form>
        </div>
        @else
        <div class="flex justify-between mt-3">
            <h1>Status</h1>
            <p>Menuggu konfrimasi</p>
        </div>
        <div class="flex justify-between mt-3">
            <h1>Bukti Pembayaran</h1>
            <img class="h-auto max-w-[10rem] my-3 shadow-md" src="{{ asset('/storage/bukti/'.$daftar->bukti) }}" alt="logo">
        </div>
        @endif

        @elseif ($daftar->status_pay == 'Unpaid')
        <form action="{{route('selesai')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$daftar->id}}">
            <label class="block my-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload Bukti Pembayaran</label>
            <input name="bukti" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file" required>
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">Bukti Pembayaran Hanya Bisa PNG, JPEG, JPG</p>
            @error('bukti')
            <span class="text-rose-500">
                <p>{{ $message }}</p>
            </span>
            @enderror
            <button type="submit" class="bg-blue-500 rounded-md text-white w-full text-center p-1 m-2">Upload Bukti Pembayaran</button>
        </form>
        @else
        <h1>Pesanan selesai</h1>
        @endif

    </div>
</x-app-layout>