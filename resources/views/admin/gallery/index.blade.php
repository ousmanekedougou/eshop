@extends('admin.layouts.app')

@section('main-content')




     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Image Gallery
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route ('admin.gallery.create') }}"> <span class="btn btn-success" >Ajouter</span></a></li>
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
                  <th>image</th>
                  <th class="text-success">Option</th>
                </tr>
                </thead>
                <tbody>
              @foreach($gallery_show as $gallery)
                <tr>
                  <td><img style="width:90px;height:auto;" src="{{ asset('storage/'.$gallery->image) }}" alt="" srcset=""></td>
                  <td class="">   
                  <form id="delete-form-{{$gallery->id}}" action="{{ route('admin.gallery.destroy',$gallery->id) }}" method="post" style="display:none;">
                      @csrf
                      {{ method_field('DELETE') }}
                    </form>
                    <a href="{{ route('admin.gallery.edit',$gallery->id) }}"><span> <i class=" glyphicon glyphicon-edit"></i> </span></a>
                    <a href="" onClick=" if(confirm('Etes vous sure de Supprimer ce gallery')){ event.preventDefault();document.getElementById('delete-form-{{$gallery->id}}').submit();}else{event.preventDefault();}" href="{{ route('admin.gallery.update',$gallery->id) }}" style="margin-right:20px;"><i class=" glyphicon glyphicon-trash"></i></a>
                  </td>
                </tr>
              @endforeach
                </tbody>
                <tfoot>
                <tr>
                <tr>
                <th>image</th>
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