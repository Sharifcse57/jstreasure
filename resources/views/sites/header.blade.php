<header class="navbar-fixed-top">
  <nav class="navbar navbar-default navbar-site">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false"> <span class="icon-bar"></span><span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="navbar-brand" href="{{ route('home') }}"><img class="logo" src="{{ asset('front_end/images/logo.svg') }}" alt="logo"/>
        </a>
      </div>
      <div class="big-search" style="display:none;">
        <div class="container">
          <form>
            <input type="text" class="form-control" name="search" placeholder="Search">
          </form>
        </div>
      </div>
      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse custom-nav" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
        @if(!empty($category))
        @foreach ($category as $categoryData)
          <li><a href="category/{{ $categoryData->slug }}">{{$categoryData->title}}</a></li>
        @endforeach
        @endif
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li>
          @if (Auth::guest())
              <li><a href="login.html">Login</a></li>
          @else
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      {{ Auth::user()->name }} <span class="caret"></span>
                  </a>

                  <ul class="dropdown-menu" role="menu">
                      <li>
                          <a href="{{ url('/logout') }}"
                              onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                              Logout
                          </a>

                          <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                      </li>
                  </ul>
              </li>
          @endif



          </li>
          <?php $count = 0;?>
          @foreach( session('cart',[]) as $item)
          <?php $count += $item['quantity']?>
          @endforeach
          <li><a href="javascript:void(0)" id="cart_count">Cart<span>({{ $count }})</span></a></li>
          <li><a href="#">Search</a></li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
  </nav>
</header>