<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Bootstrap-ecommerce by Vosidiy">
    <title>POS</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset("assets/images/logos/squanchy.jpg")}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset("assets/images/logos/squanchy.jpg")}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset("assets/images/logos/squanchy.jpg")}}"/>
    <!-- jQuery -->
    <!-- Bootstrap4 files-->
    <link href="{{asset("assets/css/bootstrap.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("assets/css/ui.css")}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset("assets/fonts/fontawesome/css/fontawesome-all.min.css")}}" type="text/css" rel="stylesheet">
    <link href="{{asset("assets/css/OverlayScrollbars.css")}}" type="text/css" rel="stylesheet"/>

    <!-- Font awesome 5 -->
    <style>
        .avatar {
            vertical-align: middle;
            width: 35px;
            height: 35px;
            border-radius: 50%;
        }

        .bg-default, .btn-default {
            background-color: #f2f3f8;
        }

        .btn-error {
            color: #ef5f5f;
        }
    </style>
    <!-- custom style -->


    <!-- Start izitoast css-->
    <link href="{{asset('assets/iziToast/css/iziToast.min.css')}}" rel="stylesheet"/>
    <!-- End izitoast css-->

</head>
<body>
<section class="header-main">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3">
                <div class="brand-wrap">
                    <img class="logo" src="{{asset("assets/images/logos/squanchy.jpg")}}">
                    <h2 class="logo-text">{{env('APP_NAME')}}</h2>
                </div> <!-- brand-wrap.// -->
            </div>
            <div class="col-lg-6 col-sm-6">
                <form action="#" class="search-wrap">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form> <!-- search-wrap .end// -->
            </div> <!-- col.// -->
            <div class="col-lg-3 col-sm-6">
                <div class="widgets-wrap d-flex justify-content-end">
                    <div class="widget-header">
                        <a href="#" class="icontext">
                            <a href="{{route('orders.index')}}"
                               class="btn btn-primary m-btn m-btn--icon m-btn--icon-only">
                                <i class="fa fa-shopping-cart"></i>
                            </a>
                        </a>
                    </div> <!-- widget .// -->
                    <div class="widget-header dropdown">
                        <a href="#" class="ml-3 icontext" data-toggle="dropdown" data-offset="20,10">
                            <img src="{{asset("assets/images/avatars/bshbsh.png")}}" class="avatar" alt="">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#"><i class="fa fa-sign-out-alt"></i> Logout</a>
                        </div> <!--  dropdown-menu .// -->
                    </div> <!-- widget  dropdown.// -->
                </div>    <!-- widgets-wrap.// -->
            </div> <!-- col.// -->
        </div> <!-- row.// -->
    </div> <!-- container.// -->
</section>
<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content padding-y-sm bg-default ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 card padding-y-sm card ">
                <ul class="nav bg radius nav-pills nav-fill mb-3 bg" role="tablist" hidden>
                    <li class="nav-item">
                        <a class="nav-link active show" data-toggle="pill" href="#nav-tab-card">
                            <i class="fa fa-tags"></i> All</a></li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#nav-tab-paypal">
                            <i class="fa fa-tags "></i> Category 1</a></li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#nav-tab-bank">
                            <i class="fa fa-tags "></i> Category 2</a></li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#nav-tab-bank">
                            <i class="fa fa-tags "></i> Category 3</a></li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#nav-tab-bank">
                            <i class="fa fa-tags "></i> Category 4</a></li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="pill" href="#nav-tab-bank">
                            <i class="fa fa-tags "></i> Category 5</a></li>
                </ul>
                <span id="items">
<div class="row">
               @foreach($products as $index=>$product)
        <div class="col-md-4">
	<figure class="card card-product">
		<span class="badge-new"> NEW </span>
		<div class="img-wrap">
			<img src="{{asset("assets/images/items/".$product->image)}}">
			<a class="btn-overlay" href="#"><i class="fa fa-search-plus"></i> Quick view</a>
		</div>
		<figcaption class="info-wrap">
			<a href="#" class="title">{{$product->name}}</a>
			<div class="action-wrap">
				<a href="{{route('addProduct',$product->id)}}" class="btn btn-primary btn-sm float-right"> <i
                        class="fa fa-cart-plus"></i> Add </a>
				<div class="price-wrap h5">
					<span class="price-new">${{$product->price}}</span>
				</div> <!-- price-wrap.// -->
			</div> <!-- action-wrap -->
		</figcaption>
	</figure> <!-- card // -->
</div> <!-- col // -->
        {{--                        @if(($index+1)%4==0)--}}
        {{--                            --}}
        {{--                        @else--}}
        {{--                        @endif--}}
    @endforeach
</div>



</span>
            </div>
            <div class="col-md-6">
                <div class="card">
	<span id="cart">
<table class="table table-hover shopping-cart-wrap">
<thead class="text-muted">
<tr>
  <th scope="col">Item</th>
  <th scope="col" width="120">Qty</th>
  <th scope="col" width="120">Price</th>
  <th scope="col" class="text-right" width="200">Delete</th>
</tr>
</thead>
<tbody>
@forelse($carts as $row)
    <tr>
	<td>
<figure class="media">
	<div class="img-wrap"><img src="{{asset("assets/images/items/".$row->associatedModel->image)}}"
                               class="img-thumbnail img-xs"></div>
	<figcaption class="media-body">
		<h6 class="title text-truncate">{{$row->name}} </h6>
	</figcaption>
</figure>
	</td>
	<td class="text-center">
		<div class="m-btn-group m-btn-group--pill btn-group mr-2" role="group" aria-label="...">
																		<a type="button"
                                                                           href="{{route('updateQty',['product'=>$row->id,'qty'=>-1])}}"
                                                                           class="m-btn btn btn-default"><i
                                                                                class="fa fa-minus"></i></a>
																		<button type="button"
                                                                                class="m-btn btn btn-default"
                                                                                disabled>{{$row->quantity}}</button>
																		<a type="button"
                                                                           href="{{route('updateQty',['product'=>$row->id,'qty'=>1])}}"
                                                                           class="m-btn btn btn-default"><i
                                                                                class="fa fa-plus"></i></a>
																	</div>
	</td>
	<td>
		<div class="price-wrap">
			<var class="price">${{$row->price}}</var>
		</div> <!-- price-wrap .// -->
	</td>
	<td class="text-right">
	<a href="{{route('removeItem',$row->id)}}" class="btn btn-outline-danger"> <i class="fa fa-trash"></i></a>
	</td>
</tr>
@empty

    <p class="text-muted text-center logo-text mt-2">Cart empty</p>


@endforelse

</tbody>
</table>
</span>
                </div> <!-- card.// -->

                <div class="box">
                    <dl class="dlist-align">
                        <dt>Tax:</dt>
                        <dd class="text-right">0%</dd>
                    </dl>
                    <dl class="dlist-align">
                        <dt>Discount:</dt>
                        <dd class="text-right"><a href="#">0%</a></dd>
                    </dl>
                    <dl class="dlist-align">
                        <dt>Sub Total:</dt>
                        <dd class="text-right">${{\Cart::session(auth()->user()->id)->getSubTotal()}}</dd>
                    </dl>
                    <dl class="dlist-align">
                        <dt>Total:</dt>
                        <dd class="text-right h4 b"> ${{\Cart::session(auth()->user()->id)->getTotal()}}</dd>
                    </dl>
                    <div class="row">
                        <div class="col-md-6">
                            <a href="{{route('clearCart')}}" class="btn  btn-default btn-error btn-lg btn-block"><i
                                    class="fa fa-times-circle "></i> Cancel </a>
                        </div>
                        <div class="col-md-6">
                            <a onclick="document.getElementById('form_pay').submit();"
                               class="btn text-white  btn-primary btn-lg btn-block  {{\Cart::session(auth()->user()->id)->isEmpty()?'disabled':''}}"><i
                                    class="fa fa-shopping-bag"></i>
                                Charge </a>
                            <form id="form_pay" method="post" action="{{route('pay')}}">
                                @csrf


                            </form>
                        </div>
                    </div>
                </div> <!-- box.// -->
            </div>
        </div>
    </div><!-- container //  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
<script src="{{asset("assets/js/jquery-2.0.0.min.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/js/bootstrap.bundle.min.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/js/OverlayScrollbars.js")}}" type="text/javascript"></script>
<!-- Start iziToast -->
<script src="{{asset('assets/iziToast/js/iziToast.min.js')}}"></script>
<!-- End iziToast -->
<script>
    $(function () {
        //The passed argument has to be at least a empty object or a object with your desired options
        //$("body").overlayScrollbars({ });
        $("#items").height(552);
        $("#items").overlayScrollbars({
            overflowBehavior: {
                x: "hidden",
                y: "scroll"
            }
        });
        $("#cart").height(445);
        $("#cart").overlayScrollbars({});
    });
</script>

@include('notify.errors')
@include('notify.success')
</body>
</html>
