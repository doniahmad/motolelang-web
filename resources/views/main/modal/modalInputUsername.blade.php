<form method="POST" action="{{ route('lelang.auctioneer') }}">
    @csrf
    <div id="modalInputUsername" class="modal" tabindex="-1">
        <div class="modal-dialog myModal modal-xl">
            <div class="modal-content p-5">
                <h5>Masukkan Username</h5>
                <div class="form-group">
                    <label for="inputUsername">Jangan menggunakan nama asli untuk menyimpan privasi anda</label>
                    <input type="text" name="nama_samaran" required class="form-control" id="inputUsername"
                        aria-describedby="inputUsername" placeholder="">
                </div>
                <input type="text" name="token_pelelangan" id="token_pelelangan" hidden
                    value="{{ $data->auction->token }}">
                <input type="text" name="id_auction" id="id_auction" hidden value="{{ $data->auction->auction_id }}">
                <input type="text" name="id_user" id="id_user" hidden value="{{ auth()->id() }}">
                <button type="submit" class="btn btn-primary mt-3" data-bs-toggle="" data-bs-target="">
                    Kirim
                </button>
            </div>
        </div>
    </div>
</form>

@include('main.modal.alertPenawaranBerhasil')
