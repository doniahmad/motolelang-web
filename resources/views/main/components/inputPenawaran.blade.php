<div id="inputPenawaran">
    <div class="body-components">
        <h5>Masukkan Username</h5>
        <div class="d-flex flex-column">
            <p>Jangan menggunakan nama asli untuk menyimpan privasi anda</p>
            <form method="POST" action="{{ route('lelang.offerCreate') }}">
                @csrf
                <div class="form-outline form-outline-border-primer">
                    <input type="number" name="offer" class="form-control" />
                    <input type="text" name="id_auction" class="form-control" hidden
                        value="{{ $data->auction_id }}" />
                    <input type="text" name="id_auctioneer" class="form-control" hidden
                        value="{{ $data->auctioneer->auctioneer_id }}" />
                    <input type="text" name="token_lelang" class="form-control" hidden value="{{ $data->token }}" />
                </div>
                <button class="btn btn-input-penawaran bg-color-primer text-light ms-auto" type="submit">
                    Masuk
                </button>
            </form>
        </div>
    </div>
</div>
