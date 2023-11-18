<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
    <script type="text/javascript" src="https://app.stg.midtrans.com/snap/snap.js" data-client-key="{{config('midtrans.clinet_key')}}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
</head>

<body>

    <!-- @TODO: You can add the desired ID as a reference for the embedId parameter. -->
    <div id="snap-container" class="md:w-2/5 w-full bg-white mx-auto border rounded-sm items-center mt-11 p-5">

        @if ($hasil)
        @forelse ($hasil as $biaya)
        <!-- @method('PUT') -->
        <div class="relative z-0 w-full grid mb-6 group">
            <form action="{{route('checkout')}}" method="post">
                @csrf
                <input type="text" name="produkid" value="{{$produkid}}" hidden>
                <input type="text" name="idorder" value="{{$idorder}}" hidden>
                <div class="border rounded-md p-2">
                    <div>
                        <label for="namajasa">Nama Jasa : </label>
                        <input name="namajasa" value="{{$nama_jasa}}" readonly class="border-none">
                    </div>
                    <div>
                        <label for="hargaongkir">biaya kirim : </label>
                        <input name="biayaongkir" value="{{$biaya['biaya']}}" readonly class="border-none">
                    </div>
                    <div>
                        <label for="estimasi">Estimasi : </label>
                        <input name="estimasi" value="{{$biaya['etd']}}" readonly class="border-none">
                    </div>
                    <button type="submit" class="bg-blue-500 w-full p-1 text-white rounded-sm">Pilih</button>
                </div>
            </form>
        </div>
        @empty
        <h1>biaya kirim tidak ada</h1>
        @endforelse
        @endif
    </div>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

</body>

</html>