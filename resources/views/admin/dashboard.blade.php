<x-admin-layout>
    @section('title') {{'Dashboard'}} @endsection
    <div class="p-4 sm:ml-64">
        <div class="p-4  dark:border-gray-700 mt-14">
            <div class="grid grid-cols-4 gap-4 mb-4">
                <div class="flex-row p-2 items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">
                        <span class="text-center">Jumlah Produk</span>
                    <h1 class="text-4xl text-center">{{$jumlahproduk}}</h1>
                    </p>
                </div>
                <div class="flex-row p-2 items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">
                        <span class="text-center">Jumlah kategori</span>
                    <h1 class="text-4xl text-center">{{$jumlahkategori}}</h1>
                    </p>
                </div>
                <div class="flex-row p-2 items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">
                        <span class="text-center">Jumlah Merek</span>
                    <h1 class="text-4xl text-center">{{$jumlahbrand}}</h1>
                    </p>
                </div>
                <div class="flex-row p-2 justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                    <p class="text-2xl items-center text-gray-400 dark:text-gray-500">
                        <span class="text-center">Jumlah Pengguna</span>
                    <h1 class="text-4xl text-center">{{$jumlahusers}}</h1>
                    </p>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-4 mb-4">




            </div>



        </div>
        <div class="grid grid-cols-2 gap-4 mb-4">
            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                    </svg>
                </p>
            </div>
            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                    </svg>
                </p>
            </div>
            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                    </svg>
                </p>
            </div>
            <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                <p class="text-2xl text-gray-400 dark:text-gray-500">
                    <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                    </svg>
                </p>
            </div>
        </div>

    </div>
    </div>
    <script type="text/javascript">

    </script>

</x-admin-layout>