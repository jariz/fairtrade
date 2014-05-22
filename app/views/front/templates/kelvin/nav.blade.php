<nav class="header navbar navbar-default hidden-lg hidden-md hidden-sm visible-xs" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url()}}"><img src="{{url('images/logo.png')}}" alt=""></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse " id="navigation">
            <ul class="nav navbar-nav">
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
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<div class="header container visible-sm visible-md visible-lg  hidden-xs">

    <div class="logo col-md-3"><img src="{{url('images/logo.png')}}" alt="Faretrade Gemeente amsterdam"></div>
    <div class="col-md-9 navMain">
        <ul class="list-inline">
            @foreach($menuData as $menuItem)
            <li>
                <a href="{{URL::to($menuItem['slug'])}}" title="Home" class="{{$menuItem['class']}}">
                                <span class="overlayLeft">
                                    <img src="{{url('images/overlay_left.png')}}" alt="">
                                </span>
                    {{$menuItem['menu_title']}}
                                <span class="overlayRight">
                                    <img src="{{url('images/overlay_right.png')}}" alt="">
                                </span>
                </a>
            </li>
            @endforeach
        </ul>
    </div>
    <div class="clear"></div>
    <div class="border_horizontal"></div>
    <div class="clear"></div>
</div>