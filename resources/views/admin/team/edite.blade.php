@extends('admin.layouts.app')

@section('main-content')




     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Modifier votre Personnel
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route ('admin.team.index') }}"><span class="btn btn-success" >Home</span> </a></li>
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
            <form role="form" action="{{ route('admin.team.update',$edit_team->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <div class="form-group row">


              <div class="col-lg-6">
              <div class="form-group">
                  <label for="exampleInputEmail1">Prenom</label>
                  <input type="text" value="{{$edit_team->prenom}}" name="prenom" class="form-control" id="exampleInputEmail1" placeholder="">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Nom</label>
                  <input type="text" name="nom" value="{{$edit_team->nom}}" class="form-control" id="exampleInputEmail1" placeholder="">
                </div>

                

                <div class="form-group">
                  <label for="exampleInputEmail1">Email </label>
                  <input type="email" name="email" value="{{$edit_team->email}}" class="form-control" id="exampleInputEmail1" placeholder="">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Telephone</label>
                  <input type="number" name="phone" value="{{$edit_team->phone}}" class="form-control" id="exampleInputPassword1" placeholder="">
                </div>

                
              
              </div>

               <div class="col-lg-6">
            

               
               <div class="form-group">
                  <label for="exampleInputPassword1">Adresse</label>
                  <input type="text" name="adresse" value="{{$edit_team->adresse}}" class="form-control" id="exampleInputPassword1" placeholder="">
                </div>


                <div class="form-group">
                  <label for="exampleInputPassword1">Commission</label>
                  <select class="form-control" name="commission" id="">
                  @foreach($com as $com)
                    <option value="{{ $com->id }}">{{ $com->nom }}</option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Status</label>
                  <select class="form-control" name="status" id="">
                  @foreach($status as $status)
                    <option value="{{ $status->id }}">{{ $status->nom }}</option>
                    @endforeach
                  </select>
                </div>
              
                <div class="form-group">
                  <label for="exampleInputPassword1">Image</label>
                  <input type="file" name="image" id="exampleInputFile" placeholder="">
                </div>

                <div class="checkbox">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div>

          

              
              </div>
              <!-- /.box-body -->

             </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Modifier</button>
                <button type="reset" class="btn btn-info">Annuler</button>
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