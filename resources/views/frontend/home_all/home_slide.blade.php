 @php

$homeslide = App\Models\HomeSlide::find(1);


 @endphp



 <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{asset('frontend/assets/img/carousel-1.jpg')}}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">{{$homeslide->title}}</h5>
                            <h3 class="display-1 text-white mb-md-4 animated zoomIn">{{$homeslide->short_title}}</h3>
                            <a href="quote.html" class="btn btn-success py-md-3 px-md-5 me-3 ">Free Quote</a>
                            <a href="" class="btn btn-outline-light py-md-3 px-md-5 ">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>