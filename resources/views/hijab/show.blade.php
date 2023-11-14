<x-app-layout>
    <div class="w-[80%] mx-auto bg-white">
        <div class="grid-cols-2 grid gap-10 py-5">
            <div>



                <div id="default-carousel" class="relative w-full" data-carousel="slide">
                    <!-- Carousel wrapper -->
                    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
                        <!-- Item 1 -->
                        @forelse ($images as $image)
                        <div class="hidden duration-700 ease-in-out" data-carousel-item>
                            <img src="{{ asset('/storage/products/'. $image->image ) }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                        </div>
                        @empty
                        <div>
                            <img src="{{ ('img/default-image.jpg') }}">
                        </div>
                        @endforelse

                    </div>
                    <!-- Slider indicators -->
                    <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                        @forelse ( $images as $image )
                        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                        @empty
                        @endforelse
                    </div>
                    <!-- Slider controls -->
                    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4" />
                            </svg>
                            <span class="sr-only">Previous</span>
                        </span>
                    </button>
                    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="sr-only">Next</span>
                        </span>
                    </button>
                </div>



            </div>
            <div>
                <h1 class="font-semibold text-lg">{{$hijab->nama}}</h1>
                <h1>RP. {{$hijab->price}}</h1>
                <h1>{{$hijab->discount}}</h1>
                <p>{{$hijab->desc}}</p>

                <div class="flex gap-2">
                    <form action="{{route('carts.store')}}" method="POST">
                        @csrf
                        <div>
                            <input type="text" value="{{$hijab->id}}" hidden name="product_id">
                            <input type="number" id="helper-text" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="quntity" value="1">
                            <p id="helper-text-explanation" class="text-sm text-gray-500 dark:text-gray-400">min pembelian 1</p>
                            @error('quntity')
                            <span class="text-rose-500">
                                <p>{{ $message }}</p>
                            </span>
                            @enderror
                        </div>
                        <button type="submit" class="bg-yellow-500 p-2 hover:bg-yellow-700 text-white rounded-md">Tambah Ke Cart</button>
                    </form>
                    <a href="{{route('orders.show', $hijab->slug)}}" class="bg-blue-500 p-2 rounded-md text-white">Beli Langsung</a>

                </div>
                <div>
                    <!-- <form action="" method="get">
                        <button type="submit" class="bg-blue-500 p-2 hover:bg-blue-700 text-white rounded-md">Beli Langsung</button>
                    </form> -->
                </div>
            </div>
        </div>

    </div>

</x-app-layout>