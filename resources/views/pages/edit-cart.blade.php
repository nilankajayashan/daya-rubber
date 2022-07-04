<div class="m-0">
    <div class="bg-dark col-12" style="min-height: 100px; border-bottom-right-radius: 50px;">
        <div class="row">
            <h3 class="text-light col-lg-10">Edit Cart</h3>
            @if(in_array( 'view-cart', json_decode($permissions)))
                <div class="col-lg-2  pt-2">
                    <a class="btn btn-warning" href="{{ route('dashboard', ['state' => 'carts']) }}">Back</a>
                </div>
            @endif
        </div>
    </div>
    <div>
        @if(isset($carts) || in_array( 'view-cart', json_decode($permissions)) || in_array( 'edit-cart', json_decode($permissions)))
            <div class="ps-3 pe-3 table-responsive">
                <table class="table mt-3">
                    <tbody>
                    @foreach($cart as $cart)
                        <tr>
                            <td style="width: 150px !important;">
                                <img src="{{ asset('product_images/'.$cart->product_id.'/'.json_decode($cart->main_image))  }}" alt="product image" class="w-100"/>
                            </td>
                            <td>
                                <h5>{{ $cart->name }}</h5>
                                <h5>RS:{{ $cart->unit_price }}/=</h5>
                            </td>
                            <td> <h5 class="d-inline">Quantity:</h5>
                                {{$user->user_id}}
                                <form action="{{ route('remove-item-cart') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $cart->product_id }}">
                                    <input type="hidden" name="user_id" value="{{ $user->user_id }}">
                                    <button type="submit" class="btn btn-outline-warning btn-close d-inline-flex float-end"></button>
                                </form>
                                <form action="{{ route('update-item-cart') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="user_id" value="{{ $user->user_id }}">
                                    <input type="hidden" name="product_id" value="{{ $cart->product_id }}">
                                    <input type="number" name="quantity" id="quantity" class="ml-3 p-2" min="1" value="{{ $cart->user_quantity }}" style="width: 100px">
                                    <button type="submit" class="btn btn-outline-info mt-2">Update</button>
                                </form>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <h6 class="d-inline-flex mt-3 ms-3 ">Something went wrong...! Please refresh page now&nbsp;</h6>
            <a class="btn btn-warning d-inline-flex mt-0 mt-lg-3 ms-3 ms-lg-0" href="{{ route('dashboard', ['state' => 'carts']) }}">Refresh</a>
        @endif
    </div>
</div>
