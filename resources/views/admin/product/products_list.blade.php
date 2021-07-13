    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('galio/assets/css/bootstrap.min.css')}}">
    <!-- Font-Awesome CSS -->
    <link rel="stylesheet" href="{{asset('galio/assets/css/font-awesome.min.css')}}">
    <style>
  h3{
    color: white;
    text-align: left;
    position:relative;
    left: 25px;
    bottom: 0px;
      }
</style>
<div id="product-list">
          @foreach ($services as $service)
          <div class="product-item col-md-6 pull-left panel panel-default">
            <div class="panel-body">
            <div class="product-image-thumb col-md-3 pull-left">
                <div class="product-image-mask">
            <img src="{{asset('service/'.$service->image)}}" alt="profile" class="img-lg  mb-3" />
            </div>
        </div>
           <div class="data">
                  <h3 class="product-name"><a class="text-light" href="{{ route('services.show', $service->id) }}">{{ $service->name }}</a></h3>
                  <p class="datos text-light">Categoria: {{$service->category->name}}</p>
                  <p class="datos text-light">Stock: {{$service->stock}}</p>
                  <p class="datos text-light">Precio:$MX {{$service->sell_price}}</p>
                  <br>
                  <form action="{{route('shopping_cart_details.store')}}" method="POST">
                    {{ csrf_field() }}
                        <input type="hidden" name="product_id" value="{{$service->id}}">
                        <input type="hidden" name="quantity" value="1">
                        <input type="submit" name="btn" class="btn btn-success" value="ADD TO CART">
                  </form>
          </div>
          <button class="btn btn-success" onclick="location.href='{{ route('sales.create') }}'">BUY</button>
          @if(Auth::check() && Auth::user()->id == $service->user_id)
          <button class="btn btn-success" onclick="location.href='{{ route('services.show', $service->id) }}'">Ver</button>
            <button class="btn btn-info" onclick="location.href='{{ route('services.edit', $service->id) }}'">
            Editar</button>
            <form style="display:inline" method="POST" action="{{ 
                route('services.destroy', $service->id) }}">
                {{ csrf_field() }}
                {!! method_field('DELETE') !!}
                    <button class="btn btn-danger" type="submit">Eliminar</button>
                </form>
            @endif
    </div>
    </div>
  </div>
       @endforeach