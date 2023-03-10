<form method="POST" action="{{ route('lelang.offer') }}">
    @csrf
    <div id="modalInputPenawaran" class="modal" tabindex="-1" onsubmit="confirmOffer(this)">
        <div class="modal-dialog myModal modal-xl">
            <div class="modal-content p-5">
                <h5>Masukkan Nominal Penawaran</h5>
                <div class="form-group">
                    <label>Penawaran Tidak Boleh Lebih Kecil Atau Sama Dengan Harga Tertinggi Yang
                        Terbaru</label>
                    @if (isset($currentAuctioneer->offer->offer))
                        <input type="number" min="{{ $num1BestOffer->offer }}" required class="form-control"
                            name="offer" id="inputPenawaran" aria-describedby="inputPenawaran" placeholder="">
                        <input type="text" hidden name="current_offer_id"
                            value="{{ $currentAuctioneer->offer->offer_id }}">
                        <input type="text" hidden name="new_offer" value="1">
                    @else
                        <input type="number" required class="form-control" name="offer" id="inputPenawaran"
                            aria-describedby="inputPenawaran" placeholder=""
                            min="{{ $num1BestOffer !== null ? $num1BestOffer->offer + 1 : $data->product->harga_awal + 1 }}">
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

@push('scripts')
    <script>
        function confirmOffer(val) {
            if (validate() == true) {
                const offer = document.getElementById('inputPenawaran');
                Swal.fire({
                    title: 'Ingin memasang penawaran ?',
                    text: "Anda akan memasang pembayaran sebesar : " + offer,
                    icon: 'danger',
                    showCancelButton: true,
                    confirmButtonColor: '#138611',
                    cancelButtonColor: '#C72D00',
                    confirmButtonText: 'Iya',
                    cancelButtonText: 'Tidak',
                }).then((result) => {
                    if (result.isConfirmed) {
                        val.submitButton.click();
                    }
                })
            }
        }
    </script>
@endpush
