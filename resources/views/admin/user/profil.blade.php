@extends('admin.layouts.app')

@section('main-content')



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profil de {{ Auth::user()->prenom }} {{ Auth::user()->nom }}
      </h1>
      <ol class="breadcrumb">
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ asset('storage/'.Auth::user()->image) }}" alt="User profile picture">

              <h3 class="profile-username text-center">{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</h3>

              <p class="text-muted text-center">Software Engineer</p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  @if(Auth::user()->status == 1)
                  <b>Status :</b> <a class="pull-right">Administrateur</a>
                  @else
                  <b>Status :</b> <a class="pull-right">Client</a>
                  @endif
                </li>
                <li class="list-group-item">
                @if(Auth::user()->status_admin == 1 And Auth::user()->status == 1)
                  <b>Post :</b> <a class="pull-right">President</a>
                  @else
                  @endif
                </li>
              </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Votre Profile</a></li>
              <li class="pull-right"><a href="#settings" data-toggle="tab" ><span>Modifier</span></a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="{{ asset('storage/'.Auth::user()->image) }}" alt="user image">
                        <span class="username">
                          <a href="#">{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                        <span class="description">
                          @if(Auth::user()->status == 0)
                      Client de Eshop depuit : {{ Auth::user()->created_at }}
                      @else
                      Administrateur de Eshop depuit : {{ Auth::user()->created_at }}
                      @endif
                    </span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    <table class="table">
                      <tbody>
                       <tr>
                       <th>Email</th>
                        <th>Telephone</th>
                        <th>Date</th>
                        <th>Addresse</th>
                        @if(Auth::user()->status == 1)
                        <th>Status</th>
                        @endif
                        @if(Auth::user()->status == 1 And Auth::user()->status_admin == 1)
                        <th>Poste</th>
                        @endif
                       </tr>
                          <td> {{ Auth::user()->email }} </td>
                          <td> {{ Auth::user()->phone }} </td>
                          <td> {{ Auth::user()->date }} </td>
                          <td> {{ Auth::user()->addresse }} </td>
                          <td>
                            @if(Auth::user()->status == 1)
                            Administrateur
                            @else 
                              Client
                            @endif
                          </td>
                        
                          @if(Auth::user()->status == 1 And Auth::user()->status_admin >= 1)
                        <td>
                          @if(Auth::user()->status_admin == 1)
                                President
                                @elseif(Auth::user()->status_admin == 2)
                                Vice President
                          @endif
                        </td>
                        @endif
                       <tr>

                       </tr>
                      </tbody>

                    </table>
                  </p>
               
                </div>
                <!-- /.post -->

        <hr>
              </div>
              <!-- /.tab-pane -->
         

              <div class="tab-pane" id="settings">
                <form class="form-horizontal" action="{{ route('inscription.update',Auth::user()->id) }}" method="Post" enctype="multipart/form-data">
                  @csrf
                  {{ method_field('PATCH') }}
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Vore Nom</label>
                    <div class="col-sm-2 col-lg-offset-1 col-lg-7">
                      <input type="text" name="nom" value="{{ Auth::user()->nom }}" class="form-control" id="inputName">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Prenom</label>
                    <div class="col-sm-2 col-lg-offset-1 col-lg-7">
                      <input type="text" name="prenom" value="{{ Auth::user()->prenom }}" class="form-control" id="inputEmail">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-2 col-lg-offset-1 col-lg-7">
                      <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control" id="inputName">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-2 col-lg-offset-1 col-lg-7">
                      <input type="text" name="password" class="form-control" id="inputName">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputExperience" class="col-sm-2 control-label">Telephone</label>
                    <div class="col-sm-2 col-lg-offset-1 col-lg-7">
                    <input type="text" name="phone" value="{{ Auth::user()->phone }}" class="form-control" id="inputName">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Date de Naissance</label>
                    <div class="col-sm-2 col-lg-offset-1 col-lg-7">
                      <input type="date" name="date" value="{{ Auth::user()->date }}" class="form-control" id="inputSkills">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Adresse</label>
                    <div class="col-sm-2 col-lg-offset-1 col-lg-7">
                      <input type="text" value="{{ Auth::user()->addresse }}" name="addresse" class="form-control" id="inputSkills">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="inputSkills" class="col-sm-2 control-label">Image</label>
                    <div class="col-sm-2 col-lg-offset-1 col-lg-7">
                      <input type="file" name="image" id="inputSkills">
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-10">
                      <button type="submit" class="btn btn-danger">Modifier</button>
                    </div>
                  </div>

                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



@endsection