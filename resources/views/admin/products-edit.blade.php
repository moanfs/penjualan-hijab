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
                            <a href="{{route('products.index')}}" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Products</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-3 h-3 mx-1 text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Form Product</span>
                        </div>
                    </li>
                </ol>
            </nav>
            <div class="bg-white rounded p-4">
                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="namaproduk" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Produk <span class="text-rose-500">*</span></label>
                        <input type="text" name="nama" id="namaproduk" value="{{old('nama', $product->nama)}}" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Hijab Mutiara">
                        @error('nama')
                        <span class="text-rose-500">
                            <p>{{ $message }}</p>
                        </span>
                        @enderror
                    </div>
                    <div>
                        <label for="desc" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi Produk <span class="text-rose-500">*</span></label>
                        <input type="text" name="desc" id="desc" value="{{old('desc', $product->desc)}}" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Hijab...">
                        @error('desc')
                        <span class="text-rose-500">
                            <p>{{ $message }}</p>
                        </span>
                        @enderror
                    </div>

                    <div>
                        <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga <span class="text-rose-500">*</span></label>
                        <div class="flex">
                            <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                Rp.
                            </span>
                            <input type="text" name="price" id="harga" value="{{old('price',  $product->price)}}" aria-describedby="helper-text-explanation" class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 text-sm  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="100.000">
                        </div>
                        @error('price')
                        <span class="text-rose-500">
                            <p>{{ $message }}</p>
                        </span>
                        @enderror
                    </div>

                    <div class="flex mt-3 items-center">
                        <input id="trigger" type="checkbox" onchange="myFunction()" value="1" name="dis_status" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="trigger" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Potongan harga?</label>
                    </div>

                    <div id="hidden_fields">
                        <label for="dicount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Potongan Harga</label>
                        <div class="flex">
                            <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-e-0 border-gray-300 rounded-s-md dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                                Rp.
                            </span>
                            <input type="text" name="discount" id="discount" aria-describedby="helper-text-explanation" class="rounded-none rounded-e-lg bg-gray-50 border border-gray-300 text-gray-900 text-sm  focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="100.000">
                        </div>
                        @error('discount')
                        <span class="text-rose-500">
                            <p>{{ $message }}</p>
                        </span>
                        @enderror
                    </div>

                    <div>
                        <label for="amount" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Produk <span class="text-rose-500">*</span></label>
                        <input type="text" name="amount" id="amount" value="{{old('amount', $product->amount)}}" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="200">
                        @error('amount')
                        <span class="text-rose-500">
                            <p>{{ $message }}</p>
                        </span>
                        @enderror
                    </div>

                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih kategori Produk <span class="text-rose-500">*</span></label>
                        <select id="category" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option disabled selected>Pilih Kategori Produk</option>
                            @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="text-rose-500">
                            <p>{{ $message }}</p>
                        </span>
                        @enderror
                    </div>

                    <div>
                        <label for="brand" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Brand Produk <span class="text-rose-500">*</span></label>
                        <select id="brand" name="brand_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option disabled selected>Pilih Brand Produk</option>
                            @foreach ($brands as $brand)
                            <option value="{{$brand->id}}">{{$brand->title}}</option>
                            @endforeach
                        </select>
                        @error('brand_id')
                        <span class="text-rose-500">
                            <p>{{ $message }}</p>
                        </span>
                        @enderror
                    </div>

                    <div class=" items-center my-2 justify-center w-full">

                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Upload file</label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file" name="images[]" multiple>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">Gambar Hanya Bisa PNG, JPG, JPEG Dan Ukuran Maksimal 2Mb</p>
                        @error('images')
                        <span class="text-rose-500">
                            <p>{{ $message }}</p>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="text-white bg-blue-700 w-full my-5 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit</button>
                </form>
            </div>
        </div>
    </div>

</x-admin-layout>