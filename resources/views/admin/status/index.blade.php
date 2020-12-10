@extends('admin.layouts.app')

@section('main-content')




     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Liste Des Status
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route ('admin.status.create') }}"> <span class="btn btn-success" >Ajouter</span></a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    @include('includes.message')
      <!-- Default box -->
      <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Status</th>
                  <th class="text-success">Option</th>
                </tr>
                </thead>
                <tbody>
              @foreach($status_show as $status)
                <tr>
                  <td>{{ $status->nom }}</td>
                  <td class="">   
                  <form id="delete-form-{{$status->id}}" action="{{ route('admin.status.destroy',$status->id) }}" method="post" style="display:none;">
                      @csrf
                      {{ method_field('DELETE') }}
                    </form>
                    <a href="{{ route('admin.status.edit',$status->id) }}"><span> <i class=" glyphicon glyphicon-edit"></i> </span></a>
                    <a href="" onClick=" if(confirm('Etes vous sure de Supprimer ce status')){ event.preventDefault();document.getElementById('delete-form-{{$status->id}}').submit();}else{event.preventDefault();}" href="{{ route('admin.status.update',$status->id) }}" style="margin-right:20px;"><i class=" glyphicon glyphicon-trash"></i></a>
                  </td>
                </tr>
              @endforeach
                </tbody>
                <tfoot>
                <tr>
                <tr>
                <th>Status</th>
                  <th class="text-success">Option</th>
                </tr>
                </tfoot>
              </table>
            </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



@endsection