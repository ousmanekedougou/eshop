@extends('admin.layouts.app')

@section('main-content')




     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Liste des commission
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route ('admin.commission.create') }}"> <span class="btn btn-success" >Ajouter</span></a></li>
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
                  <th>Commission</th>
                  <th class="text-success">Option</th>
                </tr>
                </thead>
                <tbody>
              @foreach($com_show as $commission)
                <tr>
                  <td>{{ $commission->nom }}</td>
                  <td class="">   
                  <form id="delete-form-{{$commission->id}}" action="{{ route('admin.commission.destroy',$commission->id) }}" method="post" style="display:none;">
                      @csrf
                      {{ method_field('DELETE') }}
                    </form>
                    <a href="{{ route('admin.commission.edit',$commission->id) }}"><span> <i class=" glyphicon glyphicon-edit"></i> </span></a>
                    <a href="" onClick=" if(confirm('Etes vous sure de Supprimer ce commission')){ event.preventDefault();document.getElementById('delete-form-{{$commission->id}}').submit();}else{event.preventDefault();}" href="{{ route('admin.commission.update',$commission->id) }}" style="margin-right:20px;"><i class=" glyphicon glyphicon-trash"></i></a>
                  </td>
                </tr>
              @endforeach
                </tbody>
                <tfoot>
                <tr>
                <tr>
                <th>Commission</th>
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