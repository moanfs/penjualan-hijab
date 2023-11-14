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
                        @if ($baru->dis_status == 1)
                        <h1 class="text-rose-500 line-through">RP. {{$baru->price}}</h1>
                        <h1 class="">Rp. {{$baru->price - $baru->discount}}</h1>
                        @else
                        <h1>RP. {{$baru->price}}</h1>
                        @endif
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
    <div class="w-[80%] mx-auto pb-10 bg-white">
        <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-5">
            @forelse ($produk as $post)
            <a href="{{route('hijab.show', $post->slug)}}">
                <div class="mx-auto my-5 bg-white rounded-lg md:w-[12rem] xl:w-[15rem] h-full border-2 w-[9rem] shadow-md  dark:bg-gray-800">
                    @foreach ($images as $image)
                    @if ($post->id == $image->forid)
                    <img class="object-cover rounded-t-lg w-full md:h-60 h-36" src="{{ asset('/storage/products/'. $image->image ) }}" alt="{{$post->nama}}">
                    @break
                    @endif
                    @endforeach
                    <div class="px-4 py-2 capitalize ">
                        @if ($post->dis_status == 1)
                        <h1 class="text-rose-500 line-through">RP. {{$post->price}}</h1>
                        <h1 class="">Rp. {{$post->price - $post->discount}}</h1>
                        @else
                        <h1>RP. {{$post->price}}</h1>
                        @endif
                        <h class="text-xl font-medium text-gray-900 line-clamp-1">{{$post->nama}}</h>
                    </div>
                </div>
            </a>
            @empty
            <div class="items-center">
                Pencarian Tidak Ditemukan
            </div>
            @endforelse
        </div>
    </div>

</x-app-layout>