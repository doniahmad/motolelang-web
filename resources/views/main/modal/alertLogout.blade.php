<div id="alertLogout" class="modal" tabindex="-1">
    <div class="modal-dialog myModal modal-lg">
        <div class="modal-content">
            <div class="d-block text-center">
                <img class="" src="/assets/main/img/danger_orange.svg" alt="">
            </div>
            <div class="text-center py-5">
                <h5>Yakin Ingin Keluar</h5>
            </div>
            <div class="d-flex ms-auto">
                <button type="button" class="btn me-3 btn-danger" data-bs-toggle="modal" data-bs-target="#alertLogout"
                    data-dismiss="modal">
                    TIDAK
                </button>
                <a href="{{ route('logout.action') }}" class="btn btn-success">
                    YA
                </a>
            </div>

        </div>
    </div>
</div>
