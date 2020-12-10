@extends('admin.layouts.app')

@section('main-content')




     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Social
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route ('admin.social.create') }}"> <span class="btn btn-success" >Ajouter</span></a></li>
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
                  <th>Nom</th>
                  <th>Lien</th>
                  <th class="text-success">Option</th>
                </tr>
                </thead>
                <tbody>
              @foreach($social_show as $social)
                <tr>
                  <td><img style="width:90px;height:auto;" src="{{ asset('storage/'.$social->image) }}" alt="" srcset=""></td>
                  <td>{{ $social->nom }}</td>
                  <td>{{ $social->lien }}</td>
                  <td class="">   
                  <form id="delete-form-{{$social->id}}" action="{{ route('admin.social.destroy',$social->id) }}" method="post" style="display:none;">
                      @csrf
                      {{ method_field('DELETE') }}
                    </form>
                    <a href="{{ route('admin.social.edit',$social->id) }}"><span> <i class=" glyphicon glyphicon-edit"></i> </span></a>
                    <a href="" onClick=" if(confirm('Etes vous sure de Supprimer ce reseau')){ event.preventDefault();document.getElementById('delete-form-{{$social->id}}').submit();}else{event.preventDefault();}" href="{{ route('admin.social.update',$social->id) }}" style="margin-right:20px;"><i class=" glyphicon glyphicon-trash"></i></a>
                  </td>
                </tr>
              @endforeach
                </tbody>
                <tfoot>
                <tr>
                <tr>
                <th>image</th>
                  <th>Nom</th>
                  <th>Lien</th>
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