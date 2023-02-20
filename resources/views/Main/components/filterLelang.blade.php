<div id="filterLelang" class="bg-white box-shadow-santuy">
    <div class="px-1 py-3">
        {{-- urutkan --}}
        <div id="btnUrutkan" class="">
            <div class="d-flex align-items-center">
                <button class="btn d-flex" style="width:100%">
                    <h5>Urutkan</h5> <span class="ms-auto"><i class="fa fa-caret-down"></i></span>
                </button>
            </div>
            <div class="dropdown text-center">
                <button class="btn dropdown-toggle" type="button" id="urutkan" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Urutkan dari...
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#">a-z</a></li>
                    <li><a class="dropdown-item" href="#">terbaru</a></li>
                </ul>
            </div>
        </div>
        {{-- Filter --}}
        <div id="btnFilter" class="mt-3">
            <div class="d-flex align-items-center">
                <button class="btn d-flex">
                    <h5>Filter</h5> <span class="ms-auto"><i class="fa fa-caret-down"></i></span>
                </button>
            </div>
            <div id="filterkonten" class="">
                <div class="mt-1">
                    <ul id="multiselect" class="list-group px-3">
                        <h6 class="">Kategori</h6>
                        <li class="dropdown-item">
                            <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                            Motor Listrik
                        </li>
                        <li class="dropdown-item">
                            <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                            Motor Sport
                        </li>
                        <li class="dropdown-item">
                            <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                            Skuter
                        </li>
                        <li class="dropdown-item">
                            <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                            Retro
                        </li>
                        <li class="dropdown-item">
                            <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                            Motor Bebek
                        </li>
                        <li class="dropdown-item">
                            <input class="form-check-input me-1" type="checkbox" value="" aria-label="...">
                            Motor Matic
                        </li>
                    </ul>
                </div>
                <div id="filterHarga" class="mt-1">
                    <h6 class="px-3">Harga</h6>
                    <form class="mx-3">
                        <div class="mb-3">
                            <input type="number" class="form-control" id="minHarga" aria-describedby="minHarga"
                                placeholder="Harga Minimal">
                        </div>
                        <div class="mb-3">
                            <input type="number" class="form-control" id="maxHarga" aria-describedby="maxHarga"
                                placeholder="Harga Maksimal">
                        </div>
                        <a href="" class="btn terapkan text-light text-center">
                            Terapkan
                        </a>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
