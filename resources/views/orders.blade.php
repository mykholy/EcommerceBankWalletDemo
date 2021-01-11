<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Bootstrap-ecommerce by Vosidiy">
    <title>Orders |POS</title>
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
                            <a href="{{route('home')}}" class="btn btn-primary m-btn m-btn--icon m-btn--icon-only">
                                <i class="fa fa-home"></i>
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
    <div class="container p-5">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
	<span id="cart">
<table class="table table-hover shopping-cart-wrap">
<thead class="text-muted">
<tr>
  <th scope="col">ID</th>
  <th scope="col">Status</th>
  <th scope="col">Total Price</th>
  <th scope="col">Created at</th>

</tr>
</thead>
<tbody>
@forelse($orders as $order)
    <tr>

	<th>
		<div class="price-wrap">
			<var class="price">{{$order->id}}</var>
		</div> <!-- price-wrap .// -->
	</th>

        <td>
		<div class="price-wrap">
			<var class="price  {{$order->paid?'text-success':'text-danger'}}">{{$order->paid?'Paid':'not paid'}}</var>
		</div> <!-- price-wrap .// -->
	</td>
                  <td>
		<div class="price-wrap">
			$ {{$order->cart_data['total']}}
		</div> <!-- price-wrap .// -->
	</td>

             <td>
		<div class="price-wrap">
			{{$order->created_at}}
		</div> <!-- price-wrap .// -->
	</td>


</tr>
@empty

    <p class="text-muted text-center logo-text mt-2">no orders found</p>


@endforelse

</tbody>
</table>
</span>
                </div> <!-- card.// -->


            </div>
        </div>
    </div><!-- container //  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->
<script src="{{asset("assets/js/jquery-2.0.0.min.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/js/bootstrap.bundle.min.js")}}" type="text/javascript"></script>
<script src="{{asset("assets/js/OverlayScrollbars.js")}}" type="text/javascript"></script>
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
</body>
</html>
