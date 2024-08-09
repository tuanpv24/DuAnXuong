<div class="slide-home-01">
    <div class="container">
      <div
        class="response-product product-list-owl owl-slick equal-container better-height"
        data-slick='{"arrows":{{$slideShow[0]->arrows==1 ? 'true' : 'false'}},"slidesMargin":0,"dots":{{$slideShow[0]->dots==1 ? 'true' : 'false'}},"infinite":{{$slideShow[0]->infinite==1 ? 'true' : 'false'}},"autoplay": {{$slideShow[0]->auto_play==1 ? 'true' : 'false'}}, "autoplaySpeed": {{$slideShow[0]->speed}},"speed": 300,"slidesToShow":1, "fade": {{$slideShow[0]->fade==1 ? "true" : "false"}}, "cssEase": "linear","rows":1}'
        data-responsive='[{"breakpoint":480,"settings":{"slidesToShow":1,"slidesMargin":"0"}},{"breakpoint":768,"settings":{"slidesToShow":1,"slidesMargin":"0"}},{"breakpoint":992,"settings":{"slidesToShow":1,"slidesMargin":"0"}},{"breakpoint":1200,"settings":{"slidesToShow":1,"slidesMargin":"0"}},{"breakpoint":1500,"settings":{"slidesToShow":1,"slidesMargin":"0"}}]'
      >
      @foreach ($slideShowActive as $key=>$value)
      <div class="slide-wrap">
        <img src="{{'.'.Storage::url($value->duong_dan_anh)}}" style="width: 100%" alt="image" />
        <div class="slide-info">
          <div class="slide-inner">
            <h5>Black Friday</h5>
            <h1>Electronics</h1>
            <h2>New Arrivals</h2>
            <a href="{{$value->link === NULL ? 'javascript:void(0)' : route('client.show', $value->link)}}">Shop now</a>
          </div>
        </div>
      </div>
      @endforeach
        {{-- <div class="slide-wrap">
          <img src="assets/images/slide11.jpg" alt="image" />
          <div class="slide-info">
            <div class="slide-inner">
              <h5>Black Friday</h5>
              <h1>Electronics</h1>
              <h2>New Arrivals</h2>
              <a href="#">Shop now</a>
            </div>
          </div>
        </div>
        <div class="slide-wrap">
          <img src="assets/images/slide12.jpg" alt="image" />
          <div class="slide-info">
            <div class="slide-inner">
              <h5>Best Selling</h5>
              <h1><span>Life Compani</span></h1>
              <h2>Smartphone</h2>
              <a href="#">Shop now</a>
            </div>
          </div>
        </div>
        <div class="slide-wrap">
          <img src="assets/images/slide13.jpg" alt="image" />
          <div class="slide-info">
            <div class="slide-inner">
              <h5>This Week Only</h5>
              <h1>Up Sale To</h1>
              <h2>50% Off</h2>
              <a href="#">Shop now</a>
            </div>
          </div>
        </div> --}}
      </div>
    </div>
  </div>