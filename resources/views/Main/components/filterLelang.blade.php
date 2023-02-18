<div id="filterLelang" class="bg-white box-shadow-santuy">
    <div class="px-1 py-3">
        {{-- dropdown urutkan --}}
        <div id="dropdownUrutkan" class="dropdown">
            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Urutkan
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdown">
                <li><a class="dropdown-item" href="#">A-Z</a></li>
                <li><a class="dropdown-item" href="#">Terbaru</a></li>
                <li><a class="dropdown-item" href="#">Hampir Selesai</a></li>
            </ul>
        </div>
        {{-- dropdown checkbox --}}
        <div id="dropdownCheckbox" class="dropdown">
            <button class="btn-filter-toggle btn dropdown-toggle" type="button" id="dropdownMenuButton"
                data-bs-toggle="dropdown" aria-expanded="false">
                Filter
            </button>
            <ul class="dropdown-menu p-3" aria-labelledby="dropdownMenuButton">
                <div class="">
                    <h6>Kategori</h6>
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="Checkme1" />
                                <label class="form-check-label" for="Checkme1">Motor Listrik</label>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="Checkme2" />
                                <label class="form-check-label" for="Checkme2">Motor Sport</label>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="Checkme3" />
                                <label class="form-check-label" for="Checkme3">Skuter</label>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="Checkme4" />
                                <label class="form-check-label" for="Checkme4">Retro</label>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="Checkme5" />
                                <label class="form-check-label" for="Checkme4">Motor Bebek</label>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="Checkme6" />
                                <label class="form-check-label" for="Checkme4">Matic</label>
                            </div>
                        </a>
                    </li>
                </div>
                <div class="">
                    <h6>Harga</h6>
                    <form class="">
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

            </ul>
        </div>

    </div>
</div>
