<div class="brand_color">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Productos</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- brand -->
    <div class="brand">
        <div class="container">

        </div>
        <div class="brand-bg">
            <div class="container">
                <div class="row">
                    @foreach($products as $product)
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 margin">
                        <div class="brand_box">
                            <img src="{{asset('image/'.$product->image)}}" alt="img" />
                            <h3><a>{{$product->name}}</a></h3>
                            <h4>$<strong class="red">{{$product->sell_price}}</strong></h4>
                            <span>{{$product->category->name}}</span>
                            <a href="{{route('web.product_details', $product)}}" class="read-more">Leer más</a>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-md-12">
                        <a href="{{route('web.product')}}" class="read-more">Todos los productos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end brand -->