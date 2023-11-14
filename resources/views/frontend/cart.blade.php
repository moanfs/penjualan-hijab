<x-app-layout>
    <div class="my-5">
        <div class="md:max-w-xl w-full pt-3 bg-white rounded-md mx-auto">
            <h1 class="text-center font-semibold text-lg">Keranjang</h1>
        </div>
        <div class="md:max-w-xl w-full py-2 bg-white rounded-md mx-auto">

            <ul class="max-w-md divide-y mx-auto divide-gray-200 dark:divide-gray-700">
                @forelse ($carts as $cart)
                <li class="pb-3 sm:pb-4  hover:bg-pink-100 rounded-md p-2">
                    <a href="{{route('orders.show', $cart->slug)}}">
                        <div class="flex items-center space-x-4 rtl:space-x-reverse">
                            <div class="flex-1 min-w-0">
                                <p class="text-lg font-medium text-gray-900 truncate dark:text-white">
                                    {{$cart->nama}}
                                </p>
                                <p class="text-sm  truncate dark:text-gray-400">
                                    Total Harga Rp. {{$cart->price * $cart->quntity}}
                                </p>
                                <p>
                                    Jumlah Produk
                                    <span class="bg-rose-500 px-1 rounded-sm text-white">{{$cart->quntity}}</span>
                                </p>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white">
                                <form onsubmit="return confirm('Apakah Anda Yakin Ingin Hapus?');" action="{{ route('carts.destroy', $cart->cartid) }}" method="POST">
                                    <div class="flex justify-end gap-2">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-rose-500 hover:bg-rose-800 text-white p-1 rounded-md"><ion-icon name="trash-outline"></ion-icon></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </a>
                </li>
                @empty
                <div>
                    Keranjang Anda Kosong!!
                </div>

                @endforelse

            </ul>

        </div>
    </div>
</x-app-layout>