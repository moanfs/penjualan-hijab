<x-app-layout>

    <x-brand-hijab />
    <div class="container my-5 w-[80%] mx-auto  py-4 p-4  bg-white rounded-lg">
        <div class="flex mb-4">
            <h1>Produk Terbaru</h1>
        </div>
        <div class="flex  mt-3 overflow-y-auto whitespace-nowrap ">
            @forelse ($terbaru as $baru)
            <x-produk-terbaru :baru="$baru" />
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