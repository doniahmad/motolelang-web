<div id="carouselDetailSlider" class="carousel slide" data-bs-ride="carousel">

    <div class="carousel-inner ">
        <div class="carousel-item active">
            <img src="{{ asset('storage/image/product/' . $path) }}" class="d-block w-100" alt="">
        </div>

        {{-- <div class="carousel-item">
            <img src="/assets/main/img/unitedemotor_result.webp" class="d-block w-100" alt="">
        </div> --}}

    </div>

    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselDetailSlider" data-bs-slide-to="0" class="active img-thumbnail"
            aria-current="true" aria-label="Slide 0">
            <img src="{{ asset('storage/image/product/' . $path) }}" class="d-block w-100" alt="">
        </button>
        {{-- <button type="button" data-bs-target="#carouselDetailSlider" data-bs-slide-to="1" class="img-thumbnail"
            aria-label="Slide 2">
            <img src="/assets/main/img/unitedemotor_result.webp" class="d-block w-100" alt="">
        </button> --}}
    </div>
</div>
