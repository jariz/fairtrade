@extends("front.templates.{$template}.layout")

      @section('content')
      <div class="newsOverview col-md-8">
         <div class="border_vertical hidden-md hidden-sm hidden-xs"></div>
         <h1 class="over">{{$heading_main or null}} </h1>

         <h3 class="over">{{$heading_1 or null}}</h3>
         {{$paragraph_1 or null}}

         <h3 class="over">{{$heading_2 or null}}</h3>
         {{$paragraph_2 or null}}
      <div class="clear"></div>
      </div>
         <div class="col-md-12 visible-md visible-sm visible-xs">
             <div class="border_horizontal"></div>
         </div>
      <div class="sidebar hidden-md hidden-sm hidden-xs col-md-4">
         <img src="{{URL::asset('images/overfairtrade_img1.jpg')}}" class="sidebarimg" alt="">
         <img src="{{URL::asset('images/overfairtrade_img2.jpg')}}" class="sidebarimg" alt="">
         <img src="{{URL::asset('images/overfairtrade_img3.jpg')}}" class="sidebarimg" alt="">
      </div>

      </div>
  @stop