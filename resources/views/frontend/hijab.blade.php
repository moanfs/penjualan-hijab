<x-app-layout>
    <div class="">
        <div class="w-[80%] mx-auto bg-white">
            <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4">
                @forelse ($hijab as $post)
                <a href="{{route('hijab.show', $post->slug)}}">
                    <div class="mx-auto mt-5 bg-white rounded-lg md:w-[12rem] xl:w-[18rem] h-full border-2 w-[9rem] shadow-md  dark:bg-gray-800">
                        @foreach ($images as $image)
                        @if ($post->id == $image->forid)
                        <img class="object-cover rounded-t-lg w-full md:h-60 h-36" src="{{ asset('/storage/products/'. $image->image ) }}" alt="{{$post->nama}}">
                        @break;
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
                <div>
                    Pencarian Tidak Ditemukan
                </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>