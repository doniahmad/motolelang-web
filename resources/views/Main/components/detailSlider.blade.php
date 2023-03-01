<div id="carouselDetailSlider" class="carousel slide" data-bs-ride="carousel">

    <div class="carousel-inner ">
        @foreach ($path as $index => $item)
            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                <img src="{{ asset('storage/image/product/' . $item->image_path) }}" class="img-parent" alt="">
            </div>
        @endforeach
        {{-- <div class="carousel-item">
            <img src="/assets/main/img/unitedemotor_result.webp" class="d-block w-100" alt="">
        </div> --}}

    </div>

    <div class="carousel-indicators">
        @foreach ($path as $index => $item)
            <button type="button" data-bs-target="#carouselDetailSlider" data-bs-slide-to="{{ $index }}"
                class="{{ $index === 0 ? 'active' : '' }} img-thumbnail"
                aria-current="{{ $index === 0 ? true : false }}" aria-label="Slide{{ $index }}">
                <img src="{{ asset('storage/image/product/' . $item->image_path) }}" class="img-child" alt="">
            </button>
        @endforeach
        {{-- <button type="button" data-bs-target="#carouselDetailSlider" data-bs-slide-to="1" class="img-thumbnail"
            aria-label="Slide 2">
            <img src="/assets/main/img/unitedemotor_result.webp" class="d-block w-100" alt="">
        </button> --}}
    </div>
</div>
