@extends('user.layout.master')

@section('content')
    <!-- Cart Page Start -->
    <div class="container-fluid py-5 mt-5">
        <div class="container py-5">
            <div class="table-responsive">
                <table class="table" id="productTable">
                    <thead>
                      <tr>
                        <th scope="col">Products</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                        <th scope="col">Handle</th>
                      </tr>
                    </thead>
                    <tbody>
                        <input type="hidden" id="userId" value="{{Auth::user()->id}}">

                        @foreach ($cart as $item)
                        <tr>
                            <th scope="row">
                                <div class="d-flex align-items-center">
                                    <img src="{{asset('product/'.$item->image)}}" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                </div>
                            </th>
                            <td>
                                <p class="mb-0 mt-4">{{ $item->name }}</p>
                            </td>
                            <td>
                                <p class="mb-0 mt-4 price">{{ $item->price }} MMK</p>
                            </td>
                            <td>
                                <div class="input-group quantity mt-4" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-minus rounded-circle bg-light border" >
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control qty form-control-sm text-center border-0" value="{{ $item->qty }}">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-plus rounded-circle bg-light border">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <p class="mb-0 mt-4 total">{{ $item->price * $item->qty}} MMK</p>
                            </td>
                            <td>
                                <input type="hidden" class="" name="" id="cartId" value="{{$item->cart_id}}">
                                <input type="hidden" class="" name="" id="productId" value="{{$item->product_id}}">
                                <button class="btn btn-md btn-remove rounded-circle bg-light border mt-4" >
                                    <i class="fa fa-times text-danger"></i>
                                </button>
                            </td>

                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
            {{-- <div class="mt-5">
                <input type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Coupon Code">
                <button class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button">Apply Coupon</button>
            </div> --}}
            <div class="row g-4 justify-content-end">
                <div class="col-8"></div>
                <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                    <div class="bg-light rounded">
                        <div class="p-4">
                            <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="mb-0 me-4">Subtotal:</h5>
                                <p class="mb-0" id="subtotal">{{$total}} MMK</p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-0 me-4">Shipping Fees</h5>
                                <div class="">
                                    <p class="mb-0">{{ 5000}} MMK</p>
                                </div>
                            </div>
                            {{-- <p class="mb-0 text-end">Shipping to Ukraine.</p> --}}
                        </div>
                        <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                            <h5 class="mb-0 ps-4 me-4">Total</h5>
                            <p class="mb-0 pe-4" id="finaltotal">{{$total + 5000}} MMK</p>
                        </div>
                        <button @if (count($cart)== 0) disabled @endif id="btn-checkout" class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="button">Proceed Checkout</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Page End -->


    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
        <div class="container py-5">
            <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
                <div class="row g-4">
                    <div class="col-lg-3">
                        <a href="#">
                            <h1 class="text-primary mb-0">Fruitables</h1>
                            <p class="text-secondary mb-0">Fresh products</p>
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <div class="position-relative mx-auto">
                            <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" type="number" placeholder="Your Email">
                            <button type="submit" class="btn btn-primary border-0 border-secondary py-3 px-4 position-absolute rounded-pill text-white" style="top: 0; right: 0;">Subscribe Now</button>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="d-flex justify-content-end pt-3">
                            <a class="btn  btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-secondary btn-md-square rounded-circle" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4 class="text-light mb-3">Why People Like us!</h4>
                        <p class="mb-4">typesetting, remaining essentially unchanged. It was
                            popularised in the 1960s with the like Aldus PageMaker including of Lorem Ipsum.</p>
                        <a href="" class="btn border-secondary py-2 px-4 rounded-pill text-primary">Read More</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column text-start footer-item">
                        <h4 class="text-light mb-3">Shop Info</h4>
                        <a class="btn-link" href="">About Us</a>
                        <a class="btn-link" href="">Contact Us</a>
                        <a class="btn-link" href="">Privacy Policy</a>
                        <a class="btn-link" href="">Terms & Condition</a>
                        <a class="btn-link" href="">Return Policy</a>
                        <a class="btn-link" href="">FAQs & Help</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="d-flex flex-column text-start footer-item">
                        <h4 class="text-light mb-3">Account</h4>
                        <a class="btn-link" href="">My Account</a>
                        <a class="btn-link" href="">Shop details</a>
                        <a class="btn-link" href="">Shopping Cart</a>
                        <a class="btn-link" href="">Wishlist</a>
                        <a class="btn-link" href="">Order History</a>
                        <a class="btn-link" href="">International Orders</a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="footer-item">
                        <h4 class="text-light mb-3">Contact</h4>
                        <p>Address: 1429 Netus Rd, NY 48247</p>
                        <p>Email: Example@gmail.com</p>
                        <p>Phone: +0123 4567 8910</p>
                        <p>Payment Accepted</p>
                        <img src="img/payment.png" class="img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Copyright Start -->
    <div class="container-fluid copyright bg-dark py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>Your Site Name</a>, All right reserved.</span>
                </div>
                <div class="col-md-6 my-auto text-center text-md-end text-white">
                    <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                    <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                    <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                    Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a> Distributed By <a class="border-bottom" href="https://themewagon.com">ThemeWagon</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Copyright End -->



    <!-- Back to Top -->
    <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>

@endsection

@section('js-section')

<script>
    $(document).ready(function(){
        //plus btn click
        $('.btn-plus').click(function(){
            $parentNode = $(this).parents("tr");

            $price = $parentNode. find(".price").text().replace("MMK","");
            $qty = $parentNode.find(".qty").val();
            $totalAmt = $price * $qty ;

            $parentNode. find(".total").text($totalAmt + " MMK" )
            finalCalculation();

        })
        //minus btn click
        $('.btn-minus').click(function(){
            $parentNode = $(this).parents("tr");

            $price = $parentNode. find(".price").text().replace("MMK","");
            $qty = $parentNode.find(".qty").val();
            $totalAmt = $price * $qty ;

            $parentNode. find(".total").text($totalAmt + " MMK" )
            finalCalculation();
        })

        function finalCalculation(){
            $total = 0 ;

            $('#productTable tbody tr').each(function(index,item){
                $total += Number( $(item).find('.total').text().replace("MMK","") )
            })

            $('#subtotal').html( ` ${$total} MMK ` )
            $('#finaltotal').html( ` ${$total + 5000 } MMK `)
        }

        //when remove btn click
        $(".btn-remove").click(function(){
            $parentNode = $(this).parents("tr");
            $cartId = $parentNode.find("#cartId").val();

            $data = {
                'cartId' : $cartId
            }

            $.ajax({
                type: 'get',
                url: '/user/cart/delete' ,
                data : $data,
                dataType: 'json',
                success: function(response){
                    response.status == 'success' ? location.reload() : '' ;
                }
            })
        })

        //btn checkout
        $('#btn-checkout').click(function(){
            $orderList = [] ;
            $userId = $("#userId") .val();
            $orderCode = "CL-POS-" + Math. floor(Math.random() * 1000000000);
            $totalAmount = $('#finaltotal').text().replace("MMK","") * 1;

            $('#productTable tbody tr').each(function (index, row){
                $productId = $(row). find("#productId").val();
                $qty = $(row). find(".qty").val();
                // $totalAmount += $(row).find('.total').text().replace("MMK","") * 1 ;

                $orderList.push({
                    'user_id' : $userId,
                    'product_id': $productId,
                    'qty' : $qty,
                    'order_code': $orderCode,
                    'total_amount': $totalAmount,
                })
            })

            console.log($orderList);

            $.ajax({
                type : 'get',
                url : '/user/cart/temp',
                data : Object.assign({},$orderList),
                dataType : 'json',
                success : function(res){
                    if(res.status == 'success'){
                        location.href = "/user/payment"
                    }
                }
            })
        })
    })
</script>

@endsection
