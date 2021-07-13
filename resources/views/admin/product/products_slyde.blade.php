<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="custom-product col-md-12"> 
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <style>
      .custom-product{
        height: 300px
      }
      h2{
        text-align: center;
        position:relative;
        left: 25px;
        bottom: 80px;
      }
      h4.datos{
        text-align: justify;
        position:relative;
        left: 100px;
        bottom: 80px;
      }
      img.slider-img{
        height: auto;
        width: auto;
        max-height: 250px;
        max-width: 250px;
      }
    </style>
    <div class="carousel-inner">
      @foreach ($services as $service)
      <div class="item {{$service['id']==1?'active':''}}">
        <img class="slider-img" src="{{asset('image/'.$service->image)}}" alt="Los Angeles">
        <div class="carousel-caption">
          <h2 class="product-name"><a class="text-light" href="{{ route('services.show', $service->id) }}">{{ $service->name }}</a></h2>
          <h4 class="datos">{{$service->description}}</h4>
        </div>
      </div>
      @endforeach
    </div>
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
</body>
</html>
