<x-app-layout>
    <div class="">
        <div class="md:max-w-xl w-full p-8 mt-5 bg-white mx-auto">
            <div class="text-center text-lg my-4">
                <h1>Pesanan</h1>
            </div>
            <dl class="max-w-md mx-auto text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                <form action="{{route('checkout')}}" method="POST">
                    @csrf
                    <input type="text" name="produk" id="" value="{{$produk->id}}" hidden>
                    <input type="text" name="amount" id="" value="{{$jumlah}}" hidden>
                    <div class="flex flex-row  justify-between ">
                        <label class="text-md font-medium">Nama Produk</label>
                        <input class="text-md font-medium border-none text-end" disabled value="{{$produk->nama}}">
                    </div>
                    <div class="flex flex-row justify-between pb-3">
                        <dd class="text-md font-medium">Harga Produk</dd>
                        <input class="text-md font-medium border-none text-end" disabled value="{{$harga}}">
                    </div>
                    <div class="flex flex-row justify-between pb-3">
                        <dd class="text-md font-medium">Total Produk</dd>
                        <input class="text-md font-medium border-none text-end" disabled value="{{$jumlah}}">
                    </div>
                    <div class="flex flex-row justify-between pb-3">
                        <dd class="text-md font-medium">Total Harga</dd>
                        <input class="text-md font-medium border-none text-end" disabled value="{{$total}}">
                    </div>
                    <div class=" flex-row justify-between pb-3 border rounded-md my-2 p-1">
                        <dd class="text-md font-medium">Alamat</dd>
                        <dd class="text-sm font-normal">Bandung, Jawa Barat, 20335</dd>
                    </div>
                    <div class=" flex-row justify-between pb-3 border rounded-md my-2 p-1">
                        <dd class="text-md font-medium">Pengiriman</dd>
                        <dd class="text-sm font-normal">Si Cepat</dd>
                    </div>
                    <div class="flex flex-row justify-between pb-3">
                        <dd class="text-md font-medium">Biaya Pengiriman</dd>
                        <dd class="text-md font-medium">Rp. 15.000</dd>
                    </div>
                    <div class="flex flex-row justify-between pb-3">
                        <dd class="text-md font-medium">Total Pembayaran</dd>
                        <dd class="text-md font-medium">Rp. 165.000</dd>
                    </div>
                    <div class="flex  pb-3">
                        <button id="pay-button" type="submit" class=" justify-center p-1 flex w-full bg-blue-500 text-white rounded-md">Pesan</button>
                    </div>
                </form>

            </dl>

        </div>
    </div>

</x-app-layout>