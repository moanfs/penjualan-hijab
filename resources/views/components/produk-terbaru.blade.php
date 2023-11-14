<a href="{{route('hijab.show', $baru->slug)}}">
    <div class="mx-2 max-w-xs overflow-hidden bg-white rounded-lg md:w-[16rem] h-full border-2 w-[8rem] shadow-md  dark:bg-gray-800">
        <div>
            <img src="{{ ('img/default-image.jpg') }}" class="object-cover rounded-t-lg w-full md:h-60 h-36">
        </div>
        <div class="px-4 py-2 capitalize ">
            <p class="text-rose-600 line-through font-medium">{{$baru->discount}}</p>
            <p class="text-gray-600  font-medium">{{$baru->price}}</p>
            <h class="text-xl font-medium text-gray-900 line-clamp-1">{{$baru->nama}}</h>
        </div>
    </div>
</a>