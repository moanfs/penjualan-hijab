<x-app-layout>
    <style>
        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rate:not(:checked)>input {
            position: absolute;
            display: none;
        }

        .rate:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rated:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ccc;
        }

        .rate:not(:checked)>label:before {
            content: '★ ';
        }

        .rate>input:checked~label {
            color: #ffc700;
        }

        .rate:not(:checked)>label:hover,
        .rate:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rate>input:checked+label:hover,
        .rate>input:checked+label:hover~label,
        .rate>input:checked~label:hover,
        .rate>input:checked~label:hover~label,
        .rate>label:hover~input:checked~label {
            color: #c59b08;
        }

        .star-rating-complete {
            color: #c59b08;
        }

        .rating-container .form-control:hover,
        .rating-container .form-control:focus {
            background: #fff;
            border: 1px solid #ced4da;
        }

        .rating-container textarea:focus,
        .rating-container input:focus {
            color: #000;
        }

        .rated {
            float: left;
            height: 46px;
            padding: 0 10px;
        }

        .rated:not(:checked)>input {
            position: absolute;
            display: none;
        }

        .rated:not(:checked)>label {
            float: right;
            width: 1em;
            overflow: hidden;
            white-space: nowrap;
            cursor: pointer;
            font-size: 30px;
            color: #ffc700;
        }

        .rated:not(:checked)>label:before {
            content: '★ ';
        }

        .rated>input:checked~label {
            color: #ffc700;
        }

        .rated:not(:checked)>label:hover,
        .rated:not(:checked)>label:hover~label {
            color: #deb217;
        }

        .rated>input:checked+label:hover,
        .rated>input:checked+label:hover~label,
        .rated>input:checked~label:hover,
        .rated>input:checked~label:hover~label,
        .rated>label:hover~input:checked~label {
            color: #c59b08;
        }
    </style>
    <div class="bg-white w-[30%] mt-5 p-2 rounded-md mx-auto">
        <div class="flex justify-center">
            <h1>Penilaian Produk</h1>
        </div>
        <div class="flex justify-between  mt-3">
            <h1>Nama Produk</h1>
            <p>{{$order->nama}}</p>
        </div>
        <div class="flex justify-between mt-3">
            <h1>Total Transaksi</h1>
            <p>{{$order->totalselurh}}</p>
        </div>
        <div class="flex justify-between mt-3">
            <h1>Nama Pengirim</h1>
            <p>{{$order->nama_jasa}}</p>
        </div>
        <div class="flex justify-between mt-3">
            <h1>Resi</h1>
            <p>{{$order->resi}}</p>
        </div>
    </div>
    <div class="bg-white w-[30%] mt-5 p-2 rounded-md mx-auto">
        @if ($order->status == 2)
        <form action="{{route('penilaian-kirim')}}" method="post">
            @csrf
            <input type="hidden" name="id" id="" value="{{$order->produkid}}">
            <input type="hidden" name="idorder" id="" value="{{$order->id}}">
            <div class="flex-row justify-center">
                <div class="flex justify-center">
                    <div class="rate flex-row ">
                        <input type="radio" id="star5" class="rate" name="rating" value="5" />
                        <label for="star5" title="text">5 stars</label>
                        <input type="radio" checked id="star4" class="rate" name="rating" value="4" />
                        <label for="star4" title="text">4 stars</label>
                        <input type="radio" id="star3" class="rate" name="rating" value="3" />
                        <label for="star3" title="text">3 stars</label>
                        <input type="radio" id="star2" class="rate" name="rating" value="2">
                        <label for="star2" title="text">2 stars</label>
                        <input type="radio" id="star1" class="rate" name="rating" value="1" />
                        <label for="star1" title="text">1 star</label>
                    </div>
                </div>
                <div class="flex-row">
                    <label for="">Deskripsi :</label>
                    <textarea name="desc" id="" cols="50" rows="10" required></textarea>
                </div>
            </div>
            <div class="flex justify-center">

                <div class="flex-row">
                    <button class="bg-blue-500 text-white p-1 rounded-md">Submit</button>
                </div>
            </div>
        </form>
        @endif
    </div>
</x-app-layout>