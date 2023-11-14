<x-app-layout>
    <div class="container my-5 bg-white w-[80%] rounded-lg mx-auto">
        <div class="mx-auto">
            <div class="flex m-2">
                <ul class="flex">
                    @forelse ($brands as $brand)
                    <li>
                        <x-brand-hijab :brand="$brand" />
                    </li>
                    @empty
                    <div>
                        Brand Tidak Tersedia
                    </div>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
    <div class="container my-5 w-[80%] mx-auto  py-4 p-4  bg-white rounded-lg">
        <div class="flex mb-4">
            <h1>Produk Terbaru</h1>
        </div>
        <div class="flex  mt-3 overflow-y-auto whitespace-nowrap ">
            @forelse ($terbaru as $baru)
            <a href="{{route('hijab.show', $baru->slug)}}">
                <div class="mx-2 max-w-xs overflow-hidden bg-white rounded-lg md:w-[16rem] h-full border-2 w-[8rem] shadow-md  dark:bg-gray-800">
                    <div>
                        @foreach ($images as $image)
                        @if ($baru->id == $image->forid)
                        <img class="object-cover rounded-t-lg w-full md:h-60 h-36" src="{{ asset('/storage/products/'. $image->image ) }}" alt="{{$baru->nama}}">
                        @break;
                        @endif
                        @endforeach
                    </div>
                    <div class="px-4 py-2 capitalize ">
                        <p class="text-rose-600 line-through font-medium">{{$baru->discount}}</p>
                        <p class="text-gray-600  font-medium">{{$baru->price}}</p>
                        <h class="text-xl font-medium text-gray-900 line-clamp-1">{{$baru->nama}}</h>
                    </div>
                </div>
            </a>
            @empty
            <div>
                Tidak Ada Produk Yang Ditampilkan
            </div>
            @endforelse
        </div>
        <div class="flex justify-end">
            <a href="/terbaru" class="button hover:text-blue-700">Lainnya..</a>
        </div>
    </div>
    <x-produk-populer />

</x-app-layout>