<x-admin-layout>
    <div class="p-4 sm:ml-64">
        <div class="p-4 dark:border-gray-700 mt-14">
            <!-- Breadcrumb -->
            <nav class="flex px-5 py-3 mb-5 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="/admin" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <a href="{{route('category.index')}}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Category</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Form Edit Kategori</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class="bg-white rounded p-4">
                @if (session()->has('success'))
                <span class="text-white bg-green-500 flex text-center rounded-sm p-1 ">
                    {{session('success')}}
                </span>
                @endif
                <form action="{{ route('category.update', $category->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Kategori <span class="text-rose-500">*</span></label>
                        <input type="text" name="title" id="nama" value="{{ old('title', $category->title) }}" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('title')
                        <span class="text-rose-500">
                            <p>{{ $message }}</p>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="logo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi Kategori <span class="text-rose-500">*</span></label>
                        <input type="text" id="logo" name="desc" value="{{ old('desc', $category->desc) }}" aria-describedby="helper-text-explanation" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                        @error('desc')
                        <span class="text-rose-500">
                            <p>{{ $message }}</p>
                        </span>
                        @enderror
                    </div>
                    <div class="flex justify-end">
                        <button type="reset" class="text-white bg-yellow-300 my-5 hover:bg-yellow-400  font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">RESET</button>
                        <button type="submit" class="text-white bg-blue-700 my-5 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2">UPDATE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-admin-layout>