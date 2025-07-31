<x-mylayouts.layout-default title="E-Commerce" :hideBanner="true">



    <section id="home-section" class="hero">
        <div class="home-slider js-fullheight owl-carousel">
            <div class="slider-item js-fullheight">
                <div class="overlay"></div>
                <div class="container-fluid p-0">
                    <div class="row d-md-flex no-gutters slider-text js-fullheight align-items-center justify-content-end"
                        data-scrollax-parent="true">
                        <div class="one-third order-md-last img js-fullheight"
                            style="background-image:url('images/bg_1.jpg');">
                        </div>
                        <div class="one-forth d-flex js-fullheight align-items-center ftco-animate"
                            data-scrollax=" properties: { translateY: '70%' }">
                            <div class="text">
                                <span class="subheading">Pear Technology</span>
                                <div class="horizontal">
                                    <h3 class="vr" style="background-image: url('images/divider.jpg');">Esstablished
                                        Since
                                        2015</h3>
                                    <div
                                        class="col-sm-50 col-md-50 col-lg-10 ftco-animate d-flex fadeInUp ftco-animated">
                                        <div class="product d-flex flex-column">
                                            <a href="{{ route('store.index') }}" class="img-prod">
                                                <img class="img-fluid fade-edges"
                                                    src="http://localhost:8000/storage/images/products/pear1.jpg"
                                                    alt="Colorlib Template">
                                            </a>

                                        </div>
                                    </div>
                                    <p><a href="{{ route('store.index') }}" class="btn btn-primary px-5 py-3 mt-3">Shop
                                            Now</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="slider-item js-fullheight">
                <div class="overlay"></div>
                <div class="container-fluid p-0">
                    <div class="row d-flex no-gutters slider-text js-fullheight align-items-center justify-content-end"
                        data-scrollax-parent="true">
                        <div class="one-third order-md-last img js-fullheight"
                            style="background-image:url('images/bg_2.jpg');">
                        </div>
                        <div class="one-forth d-flex js-fullheight align-items-center ftco-animate"
                            data-scrollax=" properties: { translateY: '70%' }">
                            <div class="text">
                                <span class="subheading">Pear Technology</span>
                                <div class="col-sm-50 col-md-50 col-lg-8 ftco-animate d-flex fadeInUp ftco-animated">
                                    <div class="product d-flex flex-column">
                                        <a href="{{ route('store.index') }}" class="img-prod">
                                            <img class="img-fluid fade-edges"
                                                src="http://localhost:8000/storage/images/products/pearphone1-4.jpg"
                                                alt="Colorlib Template">
                                        </a>

                                    </div>

                                </div>
                                <p><a href="{{ route('store.index') }}" class="btn btn-primary px-5 py-3 mt-3">Shop
                                        Now</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-10 order-md-last">
                    <div class="row">


                        @foreach ($product_data as $data)

                        <div class="col-sm-12 col-md-12 col-lg-4 ftco-animate d-flex">
                            <div class="product d-flex flex-column">
                                <a href="#" class="img-prod"><img class="img-fluid" src="{{ $data->getImage() }}"
                                        alt="Colorlib Template">
                                    <span class="status">50% Off</span>
                                    <div class="overlay"></div>
                                </a>
                                <div class="text py-3 pb-4 px-3">
                                    <div class="d-flex">
                                        <div class="cat">
                                            <span>{{ $data->category }}</span>
                                        </div>
                                        <div class="rating">
                                            <p class="text-right mb-0">
                                                <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                <a href="#"><span class="ion-ios-star-outline"></span></a>
                                                <a href="#"><span class="ion-ios-star-outline"></span></a>
                                            </p>
                                        </div>
                                    </div>
                                    <h3><a href="{{ $data->getLink() }}">{{ $data->title }}</a></h3>
                                    <div class="pricing">
                                        {{-- <p class="price"><span class="mr-2 price-dc">$120.00</span> --}}
                                            <span class="price-sale">${{ $data->getPrice() }}</span>
                                        </p>
                                    </div>
                                    <p class="bottom-area d-flex px-3">
                                        <a href="{{ route('cart.addfromstorepage', ['id' => $data->id]) }}"
                                            class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i
                                                    class="ion-ios-add ml-1"></i></span></a>
                                        <a href="{{ $data->getLink() }}"
                                            class="buy-now text-center py-2">Details<span><i
                                                    class="ion-ios-cart ml-1"></i></span></a>
                                    </p>
                                </div>
                            </div>
                        </div>

                        @endforeach






                    </div>

    </section>


    <hr>

    <section class="ftco-section-parallax">
        <div class="parallax-img d-flex align-items-center">
            <div class="container">
                <div class="row d-flex justify-content-center py-5">
                    <div class="col-md-7 text-center heading-section ftco-animate">
                        <h2>Subcribe to our Newsletter</h2>
                        <div class="row d-flex justify-content-center mt-5">
                            <div class="col-md-8">
                                <form action="#" class="subscribe-form">
                                    <div class="form-group d-flex">
                                        <input type="text" class="form-control" placeholder="Enter email address">
                                        <input type="submit" value="Subscribe" class="submit px-3">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type='text/javascript'>
        (function(I, L, T, i, c, k, s) {if(I.iticks) return;I.iticks = {host:c, settings:s, clientId:k, cdn:L, queue:[]};var h = T.head || T.documentElement;var e = T.createElement(i);var l = I.location;e.async = true;e.src = (L||c)+'/client/inject-v2.min.js';h.insertBefore(e, h.firstChild);I.iticks.call = function(a, b) {I.iticks.queue.push([a, b]);};})(window, 'https://cdn-v1.intelliticks.com/prod/common', document, 'script', 'https://app.intelliticks.com', 'XqDvPniasRQZ6ZFyD_c', {});
    </script>

</x-mylayouts.layout-default>