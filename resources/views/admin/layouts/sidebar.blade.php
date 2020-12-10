  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('storage/'.Auth::user()->image) }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->nom }} {{ Auth::user()->prenom }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> En ligne</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">

        <!-- <li class="header">PARAMETRES</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-gear"></i>
            <span>Vos Options</span>
            <span class="pull-right-container">
              <span class="label label-success pull-right">5</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route ('admin.category.index') }}"><i class="fa fa-circle-o"></i>Categorie</a></li>
            <li><a href="{{ route ('admin.tag.index') }}"><i class="fa fa-circle-o"></i>tags</a></li>
            <li><a href="{{ route ('admin.produit.index') }}"><i class="fa fa-circle-o"></i>Produit</a></li>
          </ul>
        </li> -->

        <li><a href="{{ route ('admin.category.index') }}"><i class="fa fa-circle-o"></i> Vos Categories</a></li>
        <li><a href="{{ route ('admin.tag.index') }}"><i class="fa fa-circle-o"></i> Vos Etiquettes</a></li>
        <li><a href="{{ route ('admin.produit.index') }}"><i class="fa fa-circle-o"></i> Vos Produits</a></li>

        @if(Auth::user()->status_admin == 1 And Auth::user()->status == 1)
        <li class="treeview">
          <a href="#">
            <i class="fa fa-gears"></i>
            <span>Reglage</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">8</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route ('admin.information.index') }}"><i class="fa fa-circle-o text-warning"></i> <span>Information</span></a></li>
            <li><a href="{{ route ('admin.partener.index') }}"><i class="fa fa-circle-o text-success"></i> <span>Partenaire</span></a></li>
            <li><a href="{{ route ('admin.team.index') }}"><i class="fa fa-circle-o text-info"></i> <span>Personnelles</span></a></li>
            <li><a href="{{ route ('admin.slider.index') }}"><i class="fa fa-circle-o text-green"></i> <span>Slider</span></a></li>
            <li><a href="{{ route ('admin.gallery.index') }}"><i class="fa fa-circle-o text-yellow"></i> <span>Gallery</span></a></li>
            <li><a href="{{ route ('admin.social.index') }}"><i class="fa fa-circle-o text-primary"></i> <span>Social</span></a></li>
            <li><a href="{{ route ('admin.commission.index') }}"><i class="fa fa-circle-o text-primary"></i> <span>Commission</span></a></li>
            <li><a href="{{ route ('admin.status.index') }}"><i class="fa fa-circle-o text-primary"></i> <span>Postes</span></a></li>
            <li><a href="{{ route ('admin.admin.index') }}"><i class="fa fa-circle-o"></i>Admin</a></li>
            <li><a href="{{ route ('admin.user.index') }}"><i class="fa fa-circle-o"></i>User</a></li>
          </ul>
        </li>


        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Frond End</span>
            <span class="pull-right-container">
            <span class="label label-danger pull-right">2</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route ('admin.service.index') }}"><i class="fa fa-circle-o"></i> Services</a></li>
            <li><a href="{{ route ('admin.contact.index') }}"><i class="fa fa-circle-o"></i> Contacts</a></li>
          </ul>
        </li>
        @endif

        

        <li class="header">LABELS</li>

 
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>