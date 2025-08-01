<x-mylayouts.layout-default>

    @if($product_data->isEmpty())
    <x-core.products-empty />
    @else



    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-10 order-md-last">

                    <x-core.products-search />
                    <x-core.products-filter />

                    <div class="row">


                        @foreach ($product_data as $data)

                        <div class="col-sm-12 col-md-12 col-lg-4 ftco-animate d-flex">
                            <div class="product d-flex flex-column">
                                <a href="javascript:void(0)" class="img-prod"><img class="img-fluid"
                                        src="{{ $data->getImage() }}" alt="Colorlib Template">
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
                                                <a href="javascript:void(0)"><span
                                                        class="ion-ios-star-outline"></span></a>
                                                <a href="javascript:void(0)"><span
                                                        class="ion-ios-star-outline"></span></a>
                                                <a href="javascript:void(0)"><span
                                                        class="ion-ios-star-outline"></span></a>
                                                <a href="javascript:void(0)"><span
                                                        class="ion-ios-star-outline"></span></a>
                                                <a href="javascript:void(0)"><span
                                                        class="ion-ios-star-outline"></span></a>
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

                </div>

                <div class="col-md-4 col-lg-2">
                    <div class="sidebar">
                        <div class="sidebar-box-2">
                            <h2 class="heading">Categories</h2>
                            <div class="fancy-collapse-panel">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <div class="panel panel-default">
                                        <div class="panel-heading" role="tab" id="headingOne">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne"
                                                    aria-expanded="true" aria-controls="collapseOne">Pear Phone
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse" role="tabpanel"
                                            aria-labelledby="headingOne">
                                            <div class="panel-body">
                                                <ul>
                                                    @foreach ($category_data as $category)
                                                    <li><a
                                                            href="{{route('store.index',['category'=>$category])}}">{{$category}}</a>
                                                    </li>
                                                    @endforeach

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="sidebar-box-2">
                            <h2 class="heading">Sort</h2>
                            <ul>
                                <li><a href="{{route('store.index',['sort'=>'category'])}}">Category</a></li>
                                <li><a href="{{route('store.index',['sort'=>'price_asc'])}}">Price (Low to High)</a>
                                </li>
                                <li><a href="{{route('store.index',['sort'=>'price_desc'])}}">Price (High to Low)</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <script type='text/javascript'>
        (function(I, L, T, i, c, k, s) {if(I.iticks) return;I.iticks = {host:c, settings:s, clientId:k, cdn:L, queue:[]};var h = T.head || T.documentElement;var e = T.createElement(i);var l = I.location;e.async = true;e.src = (L||c)+'/client/inject-v2.min.js';h.insertBefore(e, h.firstChild);I.iticks.call = function(a, b) {I.iticks.queue.push([a, b]);};})(window, 'https://cdn-v1.intelliticks.com/prod/common', document, 'script', 'https://app.intelliticks.com', 'XqDvPniasRQZ6ZFyD_c', {});
    </script>



</x-mylayouts.layout-default>