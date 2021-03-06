@extends('admin.layouts.app')

@section('main-content')




     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tags
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route ('admin.tag.create') }}"><span class="btn btn-success" > Ajouter </span></a></li>
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
                  <th>Nom</th>
                  <th>Slug</th>
                  <th class="text-success">Option</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tag_show as $tag)
                <tr>
                  <td>{{ $tag->nom }}</td>
                  <td>{{ $tag->slug }}</td>
                  <td class="">   
                  <form id="delete-form-{{$tag->id}}" action="{{ route('admin.tag.destroy',$tag->id) }}" method="post" style="display:none;">
                      @csrf
                      {{ method_field('DELETE') }}
                    </form>
                    <a href="{{ route('admin.tag.edit',$tag->id) }}"><span> <i class=" glyphicon glyphicon-edit"></i> </span></a>
                    <a href="" onClick=" if(confirm('Etes vous sure de Supprimer ce tag')){ event.preventDefault();document.getElementById('delete-form-{{$tag->id}}').submit();}else{event.preventDefault();}" href="{{ route('admin.tag.update',$tag->id) }}" style="margin-right:20px;"><i class=" glyphicon glyphicon-trash"></i></a>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                <tr>
                  <th>Nom</th>
                  <th>Slug</th>
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