<x-app-layout>
    <div class="">
        <div class="md:max-w-xl w-full p-12 bg-white mx-auto">
            <dl class="max-w-md text-gray-900 divide-y divide-gray-200 dark:text-white dark:divide-gray-700">
                <div class="flex flex-col pb-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Nama Produk</dt>
                    <dd class="text-lg font-semibold">{{$hijab->nama}}</dd>
                </div>
                <div class="flex flex-col py-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Home address</dt>
                    <dd class="text-lg font-semibold">{{$hijab->nama}}</dd>
                </div>
                <div class="flex flex-col pt-3">
                    <dt class="mb-1 text-gray-500 md:text-lg dark:text-gray-400">Phone number</dt>
                    <dd class="text-lg font-semibold">+00 123 456 789 / +12 345 678</dd>
                </div>
            </dl>

        </div>
    </div>
</x-app-layout>