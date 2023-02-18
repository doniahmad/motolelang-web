<form method="POST" action="{{ route('lelang.offer') }}">
    @csrf
    <div id="modalInputPenawaran" class="modal" tabindex="-1">
        <div class="modal-dialog myModal modal-xl">
            <div class="modal-content p-5">
                <h5>Masukkan Nominal Penawaran</h5>
                <div class="form-group">
                    <label>Penawaran Tidak Boleh Lebih Kecil Atau Sama Dengan Harga Tertinggi Yang
                        Terbaru</label>
                    @if (isset($currentAuctioneer->offer->offer))
                        <input type="number" required class="form-control" name="offer" id="inputPenawaran"
                            aria-describedby="inputPenawaran" placeholder="">
                        <input type="text" hidden name="current_offer_id"
                            value="{{ $currentAuctioneer->offer->offer_id }}">
                        <input type="text" hidden name="new_offer" value="1">
                    @else
                        <input type="number" required class="form-control" name="offer" id="inputPenawaran"
                            aria-describedby="inputPenawaran" placeholder="">
                    @endif
                    <input type="text" name="id_auction" class="form-control" hidden
                        value="{{ $data->auction_id }}" />
                    <input type="text" name="id_auctioneer" class="form-control" hidden
                        value="{{ $currentAuctioneer->auctioneer_id }}" />
                    <input type="text" name="token_lelang" class="form-control" hidden value="{{ $data->token }}" />
                </div>
                <button type="submit" class="btn btn-primary mt-3">
                    Kirim
                </button>
            </div>
        </div>
    </div>
</form>
