<x-fontend.layouts.master>
{{-- {{print_r($producs) }} --}}
    <!-- Carousel Start -->
    <x-fontend.layouts.partials.elements.slider :$sliders />
    <!-- Carousel End -->


    <!-- Featured Start -->
    <x-fontend.layouts.partials.elements.feature />
    <!-- Featured End -->


    <!-- Categories Start -->
    <x-fontend.layouts.partials.elements.categories />
    <!-- Categories End -->


    <!-- Products Start -->
    <x-fontend.layouts.partials.elements.products />

    <!-- Products End -->


    <!-- Offer Start -->
    <x-fontend.layouts.partials.elements.offer :$specialoffers/>

    <!-- Offer End -->



    <!-- recent Products Start -->
    <x-fontend.layouts.partials.elements.recentproducts />

    <!-- recent Products End -->


    <!-- Vendor Start -->
    <x-fontend.layouts.partials.elements.vendor />

    <!-- Vendor End -->




</x-fontend.layouts.master>
