@extends("front.templates.{$template}.layout")

@section('content')
           <div class=" content_company col-md-12">
               <div class="col-md-9">
                   <span class="h2Wrap">
                       <span class="h2Left">
                           <img src="images/h2Left.png" alt="">
                       </span>
                       <h2>
                           Activiteiten
                       </h2>
                       <span class="h2Right">
                           <img src="images/h2Right.png" alt="">
                       </span>
                   </span>
                   <h2>Goed idee? Wacht niet langer en deel hem! deel hem</h2>
                   <p>
                       Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, cumque, at aliquam odio perferendis quidem error ducimus doloribus eius placeat quis ut aliquid quo nihil alias ullam ipsam numquam. Quas!
                       Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, cumque, at aliquam odio perferendis quidem error ducimus doloribus eius placeat quis ut aliquid quo nihil alias ullam ipsam numquam. Quas!
                       Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi, cumque, at aliquam odio perferendis quidem error ducimus doloribus eius placeat quis ut aliquid quo nihil alias ullam ipsam numquam. Quas!

                   </p>
               </div>

               <div class="col-md-3 register">
                   {{Form::open(['id'=>'form', 'route'=>'dashboard.do-login'])}}
                       <span class="h2Wrap">
                       <span class="h2Left">
                           <img src="images/h2Left.png" alt="">
                       </span>
                       <h2>
                           Inloggen
                       </h2>
                       <span class="h2Right">
                           <img src="images/h2Right.png" alt="">
                       </span>
                   </span>
                       <div class="input">
                           Gebruikersnaam<br/>
                           <input type="text" name="email">
                       </div>
                       <div class="input">
                           Wachtwoord<br/>
                           <input type="password" name="password">
                       </div>
                       <a href="#" class="registerBtn">Registreer</a>
                       <a href="#" onclick="$('#form').submit();" class="loginBtn">Login</a>
                   {{Form::close()}}
               </div>
           </div>


               <div class="col-md-12">
                   <div >
                       <div class="border_horizontal"></div>
                   </div>
               </div>
                  <div class="col-lg-5 col-md-12 uitgelicht">
                   <div class="border_vertical hidden-md hidden-sm hidden-xs"></div>
                   <span class="h2Wrap">
                       <span class="h2Left">
                           <img src="images/h2Left.png" alt="">
                       </span>
                       <h2>
                           Uitgelicht
                       </h2>
                       <span class="h2Right">
                           <img src="images/h2Right.png" alt="">
                       </span>
                   </span>
                       <ul class="list-inline">
                           @foreach($featured as $item)
                           <li>
                               <a href="{{$item->link}}">
                               <ul>
                                   @if(!empty($item->image))
                                   <li class="image">
                                       <img src="http://placehold.it/158x106" alt="">
                                   </li>
                                   @endif
                                   <li>
                                       <h2>{{\Fairtrade\Util::truncate($item->company->name, 20)}}</h2>
                                   </li>
                                   <li>
                                       <h3>{{\Fairtrade\Util::truncate($item->title, 20)}}</h3>
                                   </li>
                               </ul>
                               </a>
                           </li>
                           @endforeach
                       </ul>
                   </div>
                   <div class="col-md-12 visible-md visible-sm visible-xs">
                       <div class="border_horizontal"></div>
                   </div>
                   <div class="col-lg-7 col-md-12 col-sm-12 col-xs-8 nieuw">
                       <span class="h2Wrap">
                       <span class="h2Left">
                           <img src="images/h2Left.png" alt="">
                       </span>
                       <h2>
                           Nieuw
                       </h2>
                       <span class="h2Right">
                           <img src="images/h2Right.png" alt="">
                       </span>
                   </span>
                   <ul class="list-inline">
                   @foreach($concepts as $item)
                       @if(!empty($item->image))
                       <li>
                           <a href="{{$item->link}}">
                               <img src="{{url('uploads/concepts/t/'.$item->image)}}" alt="">
                           </a>
                       </li>
                       @endif
                       @endforeach
                   </ul>
               </div>
           </div>
           <div class="clear"></div>


@stop