   @extends('layouts.frontend')
   @section('frontend')
   <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All Categories</span>
                        </div>
                        @if(isset($categories))
                            @foreach($categories as $category)
                            <ul>
                                <li><a href="#">{{$category->title}}</a></li>
                            </ul>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @if(isset($categories))
                        @foreach($categories as $category)
                            <div class="col-lg-3">
                                <div class="categories__item set-bg" data-setbg="frontend/img/categories/cat-1.jpg">
                                    <h5><a href="#">{{$category->title}}</a></h5>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                </div>
            </div>
            <div class="row ">
            @if(isset($foods))
				@foreach($foods as $food)
				<div class="col-md-3 menu-item p-1">
					<div class="card">
						<a href="#"><img src="{{ url('/images/foods/'.$food->photo) }}" class="card-img-top" alt=""></a>
						<div class="card-body">
							<h5 class="card-title menu-caption"><a href="#">{{$food->title}}</a> <span
									class="price">NRs.
									{{$food->price}}</span></h5>
							<p class="card-text">{{$food->details}}</p>
						</div>
						<div class="row mx-auto">
							<form action="{{route('addtocart',$food->id)}}" method="POST" class="d-block ml-2 mb-0">
								{{csrf_field()}}
								<input type="hidden" name="food_id" value="{{$food->id}}">
								<button type="submit" class="btn btn-success">Add To Cart</button>
							</form>
							<form action="{{route('singlefood',$food->id)}}" method="get" class="d-block ml-2 mb-0">
								{{csrf_field()}}
								<input type="hidden" name="food_id" value="{{$food->id}}">
								<button type="submit" class="btn btn-primary">Buy Now</button>
							</form>
						</div>
					</div>
				</div>
				
				@endforeach
				@endif
				
            </div>
        </div>
    </section>
    <!-- Featured Section End -->



    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Foods</h4>
                        <div class="latest-product__slider owl-carousel">
                            @if(isset($latestfoods))
                            @foreach($latestfoods as $food)
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ url('/images/foods/'.$food->photo) }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$food->title}}</h6>
                                        <span>${{$food->price}}</span>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="latest-product__text">
                        <h4>Top Order Food</h4>
                        <div class="latest-product__slider owl-carousel">
                            @if(isset($latestfoods))
                            @foreach($latestfoods as $food)
                            <div class="latest-prdouct__slider__item">
                                <a href="#" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ url('/images/foods/'.$food->photo) }}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$food->title}}</h6>
                                        <span>${{$food->price}}</span>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    {{-- <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="frontend/img/blog/blog-1.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Cooking tips make cooking simple</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="frontend/img/blog/blog-2.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">6 ways to prepare breakfast for 30</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img src="frontend/img/blog/blog-3.jpg" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                <li><i class="fa fa-comment-o"></i> 5</li>
                            </ul>
                            <h5><a href="#">Visit the clean farm in the US</a></h5>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Blog Section End -->

  @endsection