<nav class="" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="menu">
      <ul>
        @foreach($menuData as $menuItem)
            @if( !isset($menuItem['sub_menu'] ) || count($menuItem['sub_menu']) == 0 )
                <li @if(Request::is($menuItem['slug'])) class="active" @endif><a href="{{URL::to($menuItem['slug'])}}">{{$menuItem['menu_title']}}</a></li>
            @else
                <li class="dropdown @if(Request::is($menuItem['slug'])) active  @endif">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$menuItem['menu_title']}} <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="{{URL::to($menuItem['slug'])}}"><strong>{{$menuItem['menu_title']}}</strong></a></li>
                    <li class="divider"></li>
                    @foreach($menuItem['sub_menu'] as $item )
                    <li><a href="{{URL::to($item['slug'])}}">{{$item['menu_title']}}</a></li>
                    @endforeach
                  </ul>
                </li>
            @endif
        @endforeach

          <!-- TODO HARDCODED VOOR BETA VERSIE!!!!!!!!!! -->
          <!-- TODO ERUIT HALEN VOOR PROD !!!!!!!!!!??!?!?! -->
          <li>
              <a href="{{url('waartekoop')}}">Waar te koop?</a>
          </li>
          <li>
              <a href="{{url('bedrijf-aanmelden')}}">Bedrijf aanmelden</a>
          </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>