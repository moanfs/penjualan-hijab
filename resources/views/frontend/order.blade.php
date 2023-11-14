<x-app-layout>
    <div class="">
        <div class="md:max-w-xl w-full p-8 mt-5 bg-white mx-auto">
            <div class="text-center text-lg my-4">
                <h1>Pesanan</h1>
            </div>
            <dl class="max-w-md mx-auto text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                <div class="flex flex-row justify-between pb-3">
                    <dd class="text-md font-medium">Nama Produk</dd>
                    <dd class="text-md font-medium">Hijab Pasmina Kaos</dd>
                </div>
                <div class="flex flex-row justify-between pb-3">
                    <dd class="text-md font-medium">Harga Produk</dd>
                    <dd class="text-md font-medium">Rp. 50.000</dd>
                </div>
                <div class="flex flex-row justify-between pb-3">
                    <dd class="text-md font-medium">Total Produk</dd>
                    <dd class="text-md font-medium">3</dd>
                </div>
                <div class="flex flex-row justify-between pb-3">
                    <dd class="text-md font-medium">Total Harga</dd>
                    <dd class="text-md font-medium">Rp. 150.000</dd>
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
                    <form action="{{route('pay')}}">

                        <button type="submit" class=" justify-center flex w-full bg-blue-500 text-white rounded-md">Pesan</button>
                    </form>
                </div>

            </dl>

        </div>
    </div>
</x-app-layout>