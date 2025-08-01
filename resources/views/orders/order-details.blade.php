<x-mylayouts.layout-default>
    <div class="container my-S ">
        <div class="d-flex justify-content-end pe-5">
            <a class="btn btn-primary" href="{{route('order-history.index')}}">Return</a>
        </div>

    </div>
    <div class="d-flex flex-column justify-content-center align-items-center" id="order-heading">
        <div class="text-uppercase">
            <p>Order detail</p>
        </div>
        <div class="h4">{{App\Helpers\CustomHelper::dateToReadable($order->created_at)}}</div>
        <div class="pt-1">
            <p>Order <b class="text-dark"> #{{$order->order_no}}</b></p>
        </div>
        <div class="btn close text-white">
            &times;
        </div>
    </div>

    <div class="container">
        <div class="table-responsive">
            <table class="table table-borderless">
                <thead>
                    <tr class="text-uppercase text-muted">
                        <th scope="col">product</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th class="border-0 text-uppercase small font-weight-bold">ID</th>
                        <th class="border-0 text-uppercase small font-weight-bold">Image</th>
                        <th class="border-0 text-uppercase small font-weight-bold">Product Name</th>
                        <th class="border-0 text-uppercase small font-weight-bold">Quantity</th>
                        <th class="border-0 text-uppercase small font-weight-bold">Shipping Cost</th>
                        <th class="border-0 text-uppercase small font-weight-bold">Product Cost</th>
                        <th class="border-0 text-uppercase small font-weight-bold">Total</th>
                    </tr>
                    @php ($count = 1)
                    @foreach ($product_data as $product)
                    <tr>
                        <td>{{$count++}}</td>
                        <td><img style="width: 80px; height: 80px" src={{$product->getImage()}} alt="Image"></td>
                        <td>{{$product->title}}</td>
                        <td>{{$product->pivot->quantity}}</td>
                        <td>${{App\Helpers\CustomHelper::formatPrice(($order->total)-($product->pivot->price))}}
                        </td>
                        <td>${{App\Helpers\CustomHelper::formatPrice($product->pivot->price)}}</td>
                        <td>${{App\Helpers\CustomHelper::formatPrice($order->total)}}</td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="pt-2 border-bottom mb-3"></div>

        <div class="row border rounded p-1 my-3">
            <div class="col-md-6 py-3">
                <div class="d-flex flex-column align-items start">
                    <b>Customer Information</b>
                    <p class="text-justify pt-2">{{$user->name}}</p>
                    <p class="text-justify">{{$user->email}}</p>
                </div>
            </div>
            <div class="col-md-6 py-3">
                <div class="d-flex flex-column align-items start">
                    <b>Shipping Address</b>
                    <p class="text-justify pt-2">{{$address->line_1}}</p>
                    <p class="text-justify">{{$address->line_2}}</p>
                    <p class="text-justify">{{$address->contact}}</p>
                </div>
            </div>
        </div>
        <div class="d-sm-flex justify-content-between rounded my-3 subscriptions">
            <div>
                <b>Order #{{$order->order_no}}</b>
            </div>
            <div>{{App\Helpers\CustomHelper::dateToReadable($order->created_at)}}</div>
            <div>Payment Status: {{$order->payment_status}}</div>
            <div>
                Total: <b> ${{App\Helpers\CustomHelper::formatPrice($order->total)}}</b>
            </div>
        </div>

    </div>



</x-mylayouts.layout-default>