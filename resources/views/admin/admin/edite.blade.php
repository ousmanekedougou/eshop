@extends('admin.layouts.app')

@section('main-content')




     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Modifier les Infos du user
      </h1>
      <ol class="breadcrumb">
  
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
             <div class="row form-group">
            <form role="form" action="{{ route('admin.admin.update',$admin->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <div class="form-group">
              <div class="">
              <div class="form-group">
                  <label for="exampleInputPassword1">Commissions</label>
                    <select name="commission" class="form-control" id="">
                      @foreach($com as $commission)
                      <option value="{{ $commission->nom }}">{{ $commission->nom }}</option>
                      @endforeach
                    </select>
                </div>

                <div class="form-group">
                  <label for="exampleInputPassword1">Postes</label>
                    <select name="poste" class="form-control" id="">
                    @foreach($post as $po)
                      <option value="{{ $po->id }}">{{ $po->nom }}</option>
                      @endforeach
                    </select>
                </div>


                <div class="radio">
                  <label>
                    <input type="radio" name="status" value="1"
                    @if($admin->status == '1')
                             checked
                             @endif
                    > Admin
                  </label>

                  <label style="margin-left:5px;">
                    <input type="radio" name="status" value="0"
                    @if($admin->status == '0')
                             checked
                             @endif
                    > User
                  </label>
                </div>

                


                <div class="box-footer">
                <button type="submit" class="btn btn-primary">Modifier</button>
                <button type="reset" class="btn btn-info">Annuler</button>
              </div>
              
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