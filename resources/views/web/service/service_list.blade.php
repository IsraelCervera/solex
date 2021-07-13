<div class="brand_color">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Servicios</h2>
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
                    @foreach($services as $service)
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 margin">
                        <div class="brand_box">
                            <img src="{{asset('service/'.$service->image)}}" alt="img" />
                            <h3><a>{{$service->name}}</a></h3>
                            <h4>$<strong class="red">{{$service->sell_price}}</strong></h4>
                            <span>{{$service->category->name}}</span>
                            <a href="{{route('web.service_details', $service)}}" class="read-more">Leer más</a>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-md-12">
                        <a href="{{route('web.service')}}" class="read-more">Todos los servicios</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end brand -->