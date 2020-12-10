@extends('admin.layouts.app')

@section('main-content')




     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Modifier ce Reseau Social
      </h1>
      <ol class="breadcrumb">
      <li><a href="{{ route ('admin.social.index') }}"><span class="btn btn-success"> Home </span></a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    @include('includes.message')
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
            <form role="form" action="{{ route('admin.social.update',$edit_social->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nom</label>
                  <input type="text" value="{{ $edit_social->nom }}" name="nom" class="form-control" id="exampleInputEmail1" placeholder="">
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">Lien</label>
                  <input type="text" name="lien" value="{{ $edit_social->lien }}" class="form-control" id="exampleInputPassword1" placeholder="">
                </div>
                <div class="form-group">
                <label for="exampleInputText">Image</label>
                    <input type="file" name="image">
                </div>
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
      
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



@endsection