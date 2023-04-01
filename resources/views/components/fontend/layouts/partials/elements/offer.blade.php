<div class="container-fluid pt-5 pb-3">
    <div class="row px-xl-5">

        @foreach ($specialoffers as $specialoffer)
            <div class="col-md-6">
                <div class="product-offer mb-30" style="height: 300px;">
                    <img class="img-fluid" src="{{ asset('ui/fontend') }}/img/offer-1.jpg" alt="">
                    <div class="offer-text">
                        <h6 class="text-white text-uppercase">
                            @if ($specialoffer)
                                {{ 'Save ' . $specialoffer->OfferDiscount . ' %' }}
                            @endif
                        </h6>
                        <h3 class="text-white mb-3">
                            @if ($specialoffer)
                                {{ $specialoffer->OfferName }}
                            @endif
                        </h3>
                        <a href="" class="btn btn-primary">Shop Now</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
