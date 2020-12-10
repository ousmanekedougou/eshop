@extends('admin.layouts.app')

@section('main-content')




     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        ADD USER
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route ('admin.admin.index') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header ">

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          
      <div class="row">
        <div class="col-lg-offset-2 col-lg-8">
        <div class=" box-primary">
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
              @include('includes.message')
             <div class="row form-group">
            <form role="form" action="{{ route('admin.admin.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">

                <div class="col-lg-offset-0 col-lg-4">
                  <div class="col-lg-6 ">
                      <div class="radio">
                          <label>
                            <input type="radio" name="genre" id="optionsRadios1" value="1">
                            Homme
                          </label>
                        </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="radio">
                        <label>
                          <input type="radio" name="genre" id="optionsRadios2" value="2">
                        Femme
                        </label>
                      </div>
                 </div>
               </div>

              </div>

              <div class="col-lg-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Nom</label>
                  <input type="text" name="nom" class="form-control" id="exampleInputEmail1" placeholder="">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Prenom</label>
                  <input type="text" name="prenom" class="form-control" id="exampleInputEmail1" placeholder="">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Email </label>
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="">
                </div>

               

                <div class="form-group">
                  <label for="exampleInputPassword1">Adresse</label>
                  <input type="text" name="addresse" class="form-control" id="exampleInputPassword1" placeholder="">
                </div>
              
              </div>

               <div class="col-lg-6">
          

                <div class="form-group">
                  <label for="exampleInputPassword1">Telephone</label>
                  <input type="number" name="phone" class="form-control" id="exampleInputPassword1" placeholder="">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Date de naissance</label>
                  <input type="date" name="date" class="form-control" id="exampleInputPassword1" placeholder="">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Password</label>
                  <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Image</label>
                  <input type="file" name="image" id="exampleInputFile" placeholder="">
                </div>

              
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-info">Annuler</button>
              </div>

             </div>

            </form>
               </div>
          </div>

        </div>
        </div>
      </div>
      
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



@endsection