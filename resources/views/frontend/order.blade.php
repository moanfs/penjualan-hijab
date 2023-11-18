<x-app-layout>
    <div class="">
        <div class="md:max-w-xl w-full p-8 mt-5 bg-white mx-auto">
            <div class="text-center text-lg my-4">
                <h1>Pesanan</h1>
            </div>
            <dl class="max-w-md mx-auto text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">

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

                <form action="{{route('checkout')}}" method="post">
                    @csrf
                    <input type="text" name="produk" id="" value="{{$produk->id}}" hidden>
                    <input type="text" name="amount" id="" value="{{$jumlah}}" hidden>
                    <div class="flex flex-row justify-between pb-3">
                        <label for="destination">Kota Tujuan</label>
                        <select name="destination" id="destination" class="border-none" required>
                            <option value="">Pilik Kota Tujuan</option>
                            @foreach ($cities as $city)
                            <option value="{{$city['city_id']}}">{{$city['city_name']}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-row justify-between pb-3">
                        <label for="address">Alamat Lengkap</label>
                        <textarea name="address" id="address" cols="30" rows="5"></textarea>
                    </div>
                    <div>
                        <input type="number" id="weight" name="weight" readonly hidden value="{{$produk->weight}}" required>
                    </div>
                    <div class="flex flex-row justify-between pb-3">
                        <label for="courier">Kurir</label>
                        <!-- <input type="text" name="courier" id="" value="jne"> -->
                        <select name="courier" id="courier" required>
                            <option value="">Pilik Kurir</option>
                            <option value="jne">JNE</option>
                            <option value="pos">POS</option>
                            <option value="tiki">Tiki</option>
                        </select>
                    </div>
                    <input id="" name="cekOngkir" hidden>
                    <button id="pay-button" type="submit" class=" justify-center p-1 flex w-full bg-blue-500 text-white rounded-md">Pesan</button>
                </form>
                <div class="flex  pb-3">
                </div>

            </dl>

        </div>
    </div>
</x-app-layout>