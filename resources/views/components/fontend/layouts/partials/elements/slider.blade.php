<div class="container-fluid mb-3">
    
    <div class="row px-xl-5">
        <div class="col-lg-8">
            <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">
                <ol class="carousel-indicators">
                    <?php $counter = 0;
                        $active = 'active';

                    foreach ($sliders as $slider){
                    ?>
                    <li data-target="#header-carousel" data-slide-to="<?= $counter ?>" class="<?= $active ?>"></li>
                    <?php
                     $counter++;
                    $active = '';

                }

                    ?>
                </ol>


                <div class="carousel-inner">
                    <?php
                        $active = 'active';
                        foreach ($sliders as $slider){
                    ?>
                    <div class="carousel-item position-relative <?= $active ?>" style="height: 430px;">
                        <img class="position-absolute w-100 h-100"
                            src="{{ asset('storage/slider/' . $slider->SliderImage) ?? '' }} " style="object-fit: cover;">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 700px;">
                                <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">
                                    {{ $slider->SliderName ?? '' }}</h1>
                                <p class="mx-md-5 px-5 animate__animated animate__bounceIn">
                                    {{ $slider->SliderDatials ?? '' }}</p>
                                <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp"
                                    href="#">
                                    @if ($slider->SliderName)
                                        {{ 'Shop Now' }}
                                    @endif
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php
                        $active = '';
}
                    ?>

                </div>
            </div>
        </div>
        <div class="col-lg-4">
           @foreach ($specialoffers = App\Models\Specialoffers::limit(2)->get(); as $specialoffer)
           <div class="product-offer mb-30" style="height: 200px;">
            <img class="img-fluid" src="{{ asset('storage/specialoffer/'. $specialoffer->OfferImage)  }}" alt="">
            <div class="offer-text">
                <h6 class="text-white text-uppercase"> @if($specialoffer->OfferDiscount)
                        {{"Save " .$specialoffer->OfferDiscount ." %" ?? '' }}
                @endif
            </h6>
                <h3 class="text-white mb-3">
                    @if ($specialoffer->OfferName)
                    {{$specialoffer->OfferName  }}
                    @endif </h3>
                <a href="" class="btn btn-primary">Shop Now</a>
            </div>
        </div>
           @endforeach
        </div>
    </div>
</div>
