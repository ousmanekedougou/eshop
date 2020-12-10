@extends('admin.layouts.app')

@section('main-content')



 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Liste Des Personnelles
        <small>Votre lieu de travail</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.team.create') }}"><span class="btn btn-success" >Ajouter</span></a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
        
        
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Image</th>
                  <th>Nom</th>
                  <th>Email</th>
                  <th>Telephone</th>
                  <th>Adresse</th>
                  <th>Commission</th>
                  <th>Status</th>
                  <th class="text-success">Option</th>
                </tr>
                </thead>
                <tbody>
                @foreach($personnel_show as $team)
                <tr>
                  <td><img class="img-thumbnail" style="width:60px;heigth:auto;border-radius:100%;" src="{{ asset('storage/'.$team->image) }}" alt=""></td>
                  <td>{{ $team->prenom }}</td>
                  <td>{{ $team->email }}</td>
                  <td>{{ $team->phone }}</td>
                  <td>{{ $team->adresse }}</td>
                  @foreach($team->commissions as $team_com)
                  <td> 
                  {{ $team_com->nom }}
                  </td>
                  @endforeach

                <td>{{ $team->status }}</td>

                  <td>
                    <form id="delete-form-{{$team->id}}" action="{{ route('admin.team.destroy',$team->id) }}" method="post" style="display:none;">
                      @csrf
                      {{ method_field('DELETE') }}
                    </form>
                    <a href="{{ route('admin.team.edit',$team->id) }}"><span> <i class=" glyphicon glyphicon-edit"></i> </span></a>
                    <a href="" onClick=" if(confirm('Etes vous sure de Supprimer cet Personnel')){ event.preventDefault();document.getElementById('delete-form-{{$team->id}}').submit();}else{event.preventDefault();}" href="{{ route('admin.team.update',$team->id) }}" style="margin-right:20px;"><i class=" glyphicon glyphicon-trash"></i></a>
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
                  <th>Commission</th>
                  <th>Status</th>
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