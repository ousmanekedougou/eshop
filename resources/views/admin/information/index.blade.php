@extends('admin.layouts.app')

@section('main-content')



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tableau de board
        <small>Votre lieu de travail</small>
      </h1>
      <ol class="breadcrumb">
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
        
        
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Info</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Adresse Email</th>
                  <th>Numero Telephone</th>
                  <th>Adresse</th>
                  <th>Boite Postal</th>
                  <th>Numero Fax</th>
                  <th class="text-success">Option</th>
                </tr>
                </thead>
                <tbody>
                @foreach($info_show as $info_showe)
                <tr>
                  <td>{{ $info_showe->email }}</td>
                  <td>{{ $info_showe->phone }}</td>
                  <td>{{ $info_showe->adresse }}</td>
                  <td> {{ $info_showe->bp }}</td>
                  <td>{{ $info_showe->fax }}</td>
                  <td class=""> <a href="{{route('admin.information.edit',$info_showe->id)}}"><span> <i class=" glyphicon glyphicon-edit"></i> </span></a></td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                <th>Adresse Email</th>
                  <th>Numero Telephone</th>
                  <th>Adresse</th>
                  <th>Boite Postal</th>
                  <th>Numero Fax</th>
                  <th class="text-success">Option</th>
                </tr>
                </tfoot>
              </table>
            </div>


          </div>
          <!-- /.box -->
<!-- ______________________________________________________________________________________ -->




        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



@endsection


<!-- on s'est arreter a la 7eme minine de la 6eme video -->