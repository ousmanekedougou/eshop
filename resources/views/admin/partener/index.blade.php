@extends('admin.layouts.app')

@section('main-content')




     <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Les Partenaires
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
              <h2 class="box-title">
                <a href="{{ route('admin.partener.create') }}" class="btn btn-success"> Ajouter un Partenaire </a>
              </h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Image</th>
                  <th>Nom</th>
                  <th>Email</th>
                  <th>Telephone</th>
                  <th>Adresse</th>
                  <th>Lien</th>
                  <th>Option</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($part_affiche as $part)
                <tr>
                  <!-- <td> <img src="{{ $part->image }}" alt="" srcset=""></td> -->
                  <td><img style="width:90px;height:auto;" src="{{ asset('storage/'.$part->image) }}" alt="" srcset=""></td>
                  <td>{{ $part->nom }}</td>
                  <td>{{ $part->email }}</td>
                  <td> {{ $part->phone }}</td>
                  <td>{{ $part->lien }}</td>
                  <td>{{ $part->addresse }}</td>
                  <td>
                  <form id="delete-form-{{$part->id}}" action="{{ route('admin.partener.destroy',$part->id) }}" method="post" style="display:none;">
                      @csrf
                      {{ method_field('DELETE') }}
                    </form>
                    <a href="{{ route('admin.partener.edit',$part->id) }}"><span> <i class=" glyphicon glyphicon-edit"></i> </span></a>
                    <a href="" onClick=" if(confirm('Etes vous sure de Supprimer cet Partenaire')){ event.preventDefault();document.getElementById('delete-form-{{$part->id}}').submit();}else{event.preventDefault();}" href="{{ route('admin.partener.update',$part->id) }}" style="margin-right:20px;"><i class=" glyphicon glyphicon-trash"></i></a>
                  </td>
                 
                </tr>
                @endforeach
                </tbody>

                <tfoot>
                <tr>
                <th>Image</th>
                  <th>Nom</th>
                  <th>Email</th>
                  <th>Telephone</th>
                  <th>Adresse</th>
                  <th>Lien</th>
                  <th>Option</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



@endsection