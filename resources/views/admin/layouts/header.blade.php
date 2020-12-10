<header class="main-header">
    <!-- Logo -->
    <a href="{{ route('admin.home') }}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Eshop.</b> SN</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          @if(Auth::user()->status_admin == 1)
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">{{ contacte_header()->count() }}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Vous avez nouveaux {{ contacte_header()->count() }} messages</li>
              @foreach(contacte_header() as $message)
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li><!-- start message -->
                    <a href="{{ route('admin.contact.show',$message->id) }}">
                      <div class="pull-left">
                        <img src="{{ asset('user/images/default.png') }}" class="img-circle" alt="User Image">
                      </div>
                      <h4>
                        {{$message->email}}
                        <small><i class="fa fa-clock-o"></i> {{ $message->created_at->diffForHumans() }}</small>
                      </h4>
                      <p>Why not buy a new awesome theme?</p>
                    </a>
                  </li>
                  <!-- end message -->
              
                </ul>
              </li>
                  @endforeach
              <li class="footer"><a href="{{ route('admin.contact.index') }}">Voire Tout les Messages</a></li>
            </ul>
          </li>

          <!-- Notifications: style can be found in dropdown.less -->
          
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have 10 notifications</li>
              @foreach(admin_header() as $news)
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>
                </ul>
              </li>
              @endforeach
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <!-- Tasks: style can be found in dropdown.less -->
         
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">{{ abonner_eshop()->count() }}</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">You have {{abonner_eshop()->count()}} tasks</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  @foreach(abonner_eshop() as $abonner)
                  <li><!-- Task item -->
                    <a href="#">
                      <h3>
                        Design some buttons
                        <small class="pull-right">20%</small>
                      </h3>
                      <div class="progress xs">
                        <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar"
                             aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                          <span class="sr-only">20% Complete</span>
                        </div>
                      </div>
                    </a>
                  </li>
                  <!-- end task item -->
                  @endforeach
                </ul>
              </li>
              <li class="footer">
                <a href="#">View all tasks</a>
              </li>
            </ul>
          </li>
          <!-- User Account: style can be found in dropdown.less -->
          @endif
          <li>
          <a href="{{ route('admin.cart.index') }}" >
          <span>Aller au Panier </span><i class="glyphicon glyphicon-shopping-cart"></i>
              <span class="label label-warning">{{ Cart::count() }}</span> 
            </a>
          </li>
          <li>
            <a href="{{ route('admin.videpanier') }}"><i class="glyphicon glyphicon-trash"></i> <span> Vider le Panier</span></a>
          </li>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{ asset('storage/'.Auth::user()->image) }}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->nom }} {{ Auth::user()->prenom }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{ asset('storage/'.Auth::user()->image) }}" class="img-circle" alt="User Image">

                <p>
                {{ Auth::user()->nom }} {{ Auth::user()->prenom }} 
                @if( Auth::user()->status_admin == 1 )
                - Developeurs
                  <small>Membre de Empro</small>
                  @endif
                   <small> Simple Utilisateur</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ route('admin.user.edit',Auth::user()->id) }}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                @if(Auth::guest())
                  <a href="#" class="btn btn-flat">Sign In</a>
                  @else
								<a class=" btn btn-flat" style="color:red;font-family:bold;" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                    {{ __('Se Deconnecter') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            	@endif
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
    </nav>
  </header>