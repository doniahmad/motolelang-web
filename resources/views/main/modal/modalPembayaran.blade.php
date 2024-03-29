<form method="POST" action="{{ route('invoice.bayar') }}" enctype="multipart/form-data" onsubmit="loading()">
    @csrf
    <div id="modalPembayaran" class="modal custom-modal">
        <div class="modal-dialog myModal modal-lg ">
            <div class="modal-content p-3">
                <div class="modal-header">
                    <h5 class="modal-title">Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="">
                        <h5 class="text-center mb-3">
                            Tagihan :
                            <span id="jumlah-tagihan">

                            </span>
                        </h5>
                        <p>Silahkan melakukan pembayaran dengan cara transfer ke salah satu dari rekening MOTO Lelang
                            dibawah ini : </p>
                        <ul>
                            <li>
                                <p>Bank Mandiri : 123–0090–111–909 a.n. PT Moto Jaya Abadi</p>
                            </li>
                            <li>
                                <p>Bank BCA : 372–171–7273 a.n. PT Moto Jaya Abadi</p>
                            </li>
                        </ul>
                    </div>
                    <div class="">
                        <p>Kirim bukti transfer dibawah sini : </p>
                        <div class="output-konten">
                            <img id="output" style="max-height:200px;">
                        </div>

                        <div id="formBayar" class="form-group">
                            <label>File</label>
                            <input id="kode_pembayaran_container" type="text" name="kode_pembayaran"
                                value="{{ $data->kode_pembayaran }}" hidden>
                            <input type="integer" name="ongkir" id="ongkir-value" hidden>
                            <input type="text" name="status" value="menunggu_persetujuan" hidden>
                            <input type="text" name="alamat_pengiriman" id="alamat-pengiriman" hidden>
                            <div class="input-group">
                                <i class="input-group-btn">
                                    <input type="file" class="btn btn-primary-outlined" name="bukti_pembayaran">
                                </i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary ps-4">Kirim <span><i
                                class="fa fa-chevron-right ps-4"></i></span></button>
                </div>
            </div>
        </div>
    </div>
</form>

<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    }

    function loading() {
        Swal.fire({
            title: 'Tunggu Sebentar !',
            allowOutsideClick: false,
            allowEscapeKey: false,
            allowEnterKey: false,
            showConfirmButton: false,
            willOpen: () => {
                swal.showLoading();
            },
        });
    }
</script>
