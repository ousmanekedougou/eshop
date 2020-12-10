@extends('admin.layouts.app')

@section('main-content')




     <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Admine
      </h1>
      <ol class="breadcrumb">
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    @include('includes.message')
      <!-- Default box -->
      <div class="box">
            <div class="box-header">
              @if(Auth::user()->status_admin == 1)
              <h2 class="box-title">
                <a href="{{ route ('admin.admin.create') }}" class="btn btn-success"> Ajouter un administrateure </a>
              </h2>
              @endif
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table text-center table-bordered table-striped">
                <thead>
                <tr>
                  <th>Image</th>
                  <th>Prenom et Nom</th>
                  <th>Email</th>
                  <th>Telephone</th>
                  <th>Addresse</th>
                  @if(Auth::user()->status_admin == 1)
                  <th>Option</th>
                  @endif
                </tr>
                </thead>
                <tbody>
                  @foreach($admin as $admin_ad)
                <tr>
                  <td> <img class="img-thumbnail" style="width:60px;height:auto;border-radius:100%" src="{{ asset('storage/'.$admin_ad->image) }}" alt="" srcset=""></td>
                  <td class="text-capitalize">{{ $admin_ad->prenom }}  {{ $admin_ad->nom }}</td>
                  <td class="text-capitalize">{{ $admin_ad->email }}</td>
                  <td class="text-capitalize"> {{ $admin_ad->phone }}</td>
               
                  <td class="text-capitalize">{{ $admin_ad->addresse }}</td>
                  @if(Auth::user()->status_admin == 1)
                  <td>
                    <form id="delete-form-{{$admin_ad->id}}" action="{{ route('admin.admin.destroy',$admin_ad->id) }}" method="post" style="display:none;">
                      @csrf
                      {{ method_field('DELETE') }}
                    </form>
                    <a href="{{ route('admin.admin.edit',$admin_ad->id) }}"><span> <i class=" glyphicon glyphicon-edit"></i> </span></a>
                    <a href="" onClick=" if(confirm('Etes vous sure de Supprimer cet administrateur')){ event.preventDefault();document.getElementById('delete-form-{{$admin_ad->id}}').submit();}else{event.preventDefault();}" href="{{ route('admin.admin.update',$admin_ad->id) }}" style="margin-right:20px;"><i class=" glyphicon glyphicon-trash"></i></a>
                  </td>
                 @endif
                </tr>
                @endforeach
                </tbody>

                <tfoot>
                <tr>
                <th>Image</th>
                  <th>Prenom et Nom</th>
                  <th>Email</th>
                  <th>Telephone</th>
                  <th>Addresse</th>
                  @if(Auth::user()->status_admin == 1)
                  <th>Option</th>
                  @endif
                </tr>
                </tfoot>
              </table>
              <span class="pull-right">{{ $admin->links() }}</span>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



@endsection