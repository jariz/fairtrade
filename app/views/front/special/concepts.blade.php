@extends("front.templates.{$template}.layout")

@section('content')



               <div class="clear"></div>
           <div class="border_horizontal"></div>
           <div class="clear"></div>
           <div class="spacing">

           <div class=" content_company col-md-12">
            <div class="spacing"></div>
               <div class="col-md-9">
                   <span class="h2Wrap">
                       <span class="h2Left">
                           <img src="images/h2Left.png" alt="">
                       </span>
                       <h2>
                           Concepten en Bedrijf pagina
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
                   {{Form::open(['id'=>'form'])}}
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
                           <input type="text">
                       </div>
                       <div class="input">
                           Wachtwoord<br/>
                           <input type="text" name="">
                       </div>
                       <a href="#" class="registerBtn">Registreer</a>
                       <a href="#" onclick="$('#form').submit();" class="loginBtn">Login</a>
                   {{Form::close()}}
               </div>
           </div>

           </div>

               <div class="col-md-12">
                   <div >
                       <div class="border_horizontal"></div>
                   </div>
               </div>
               <div class="col-lg-12">
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
                           <li>
                               <ul>
                                   <li class="image">
                                       <img src="http://placehold.it/158x106" alt="">
                                   </li>
                                   <li>
                                       <h2>Dinner & co</h2>
                                   </li>
                                   <li>
                                       <h3>Fairtrade wijn cursus</h3>
                                   </li>
                               </ul>
                           </li>
                           <li>
                               <ul>
                                   <li>
                                       <img src="http://placehold.it/158x106" alt="">
                                   </li>
                                   <li>
                                       <h2>Dinner & co</h2>
                                   </li>
                                   <li>
                                       <h3>Fairtrade wijn cursus</h3>
                                   </li>
                               </ul>
                           </li>
                       </ul>
                        <ul class="list-inline">
                           <li>
                               <ul>
                                   <li class="image">
                                       <img src="http://placehold.it/158x106" alt="">
                                   </li>
                                   <li>
                                       <h2>Dinner & co</h2>
                                   </li>
                                   <li>
                                       <h3>Fairtrade wijn cursus</h3>
                                   </li>
                               </ul>
                           </li>
                           <li>
                               <ul>
                                   <li>
                                       <img src="http://placehold.it/158x106" alt="">
                                   </li>
                                   <li>
                                       <h2>Dinner & co</h2>
                                   </li>
                                   <li>
                                       <h3>Fairtrade wijn cursus</h3>
                                   </li>
                               </ul>
                           </li>
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
                       <li>
                           <a href="{{$item->link}}">
                               <img src="http://placehold.it/119x91" alt="">
                           </a>
                       </li>
                       @endforeach
                   </ul>
               </div>
           </div>
           <div class="clear"></div>


@stop