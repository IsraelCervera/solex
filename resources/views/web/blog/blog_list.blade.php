<div class="brand_color">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="titlepage">
                        <h2>Publicaciones</h2>
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
                    @foreach($posts as $post)
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 margin">
                        <div class="brand_box">
                            <img src="{{asset('slug/'.$post->slug)}}" alt="img" />
                            <h5><strong class="red">{{$post->title}}</strong></h5>
                            <a href="{{route('web.blog_details', $post)}}" class="read-more">Leer más</a>
                        </div>
                    </div>
                    @endforeach
                    <div class="col-md-12">
                        <a href="{{route('web.blog')}}" class="read-more">Todas las publicaciones</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end brand -->