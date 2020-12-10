@extends('admin.layouts.app')

@section('main-content')




     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Modifier vos Infos
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route ('admin.personnel.index') }}"> <span class="btn btn-success" >Home</span> </a></li>
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
        <div class="col-lg-offset-3 col-lg-6">
        <div class=" box-primary">
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
              @include('includes.message')
        
            <form role="form" action="{{ route('admin.information.update',$info_edit->id) }}" method="post">
            @csrf
            {{ method_field('PUT') }}
              <div class="form-group">
                  <label for="exampleInputEmail1">Email </label>
                  <input type="email" name="email" class="form-control"  value="{{ $info_edit->email }}" id="exampleInputEmail1" placeholder="">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Telephone</label>
                  <input type="number" name="phone" value="{{ $info_edit->phone }}" class="form-control" id="exampleInputPassword1" placeholder="">
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Adresse</label>
                  <input type="text" name="adresse"  value="{{ $info_edit->adresse }}" class="form-control" id="exampleInputPassword1" placeholder="">
                </div>

                <div class="form-group">
                  <label for="exampleInputEmail1">Boite Postal</label>
                  <input type="text" name="bp" class="form-control"  value="{{ $info_edit->bp }}"  id="exampleInputEmail1" placeholder="">
                </div>

              <div class="form-group">
                  <label for="exampleInputEmail1">Fax</label>
                  <input type="text" name="fax" class="form-control"  value="{{ $info_edit->fax }}" id="exampleInputEmail1" placeholder="">
                </div>

               
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Modifier</button>
                <button type="reset" class="btn btn-info">Annuler</button>
              </div>

             
            </form>
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