@extends('admin.layouts.app')

@section('main-content')




     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Liste Des Utilisateures
      </h1>
    
    </section>

    <!-- Main content -->
    <section class="content">
    @include('includes.message')
      <!-- Default box -->
      <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Image</th>
                  <th>Prenom</th>
                  <th>Nom</th>
                  <th>Email</th>
                  <th>Telepone</th>
                  <th>Adresse</th>
                  <th>Produits</th>
                  <th class="text-success">Option</th>
                </tr>
                </thead>
                <tbody>
              @foreach($user_show as $user)
                <tr>
                  <td><img class="img-thumbnail" style="width:50px;height:50px;border-radius:100%;" src="{{ asset('storage/'.$user->image) }}" alt="" srcset=""></td>
                  <td>{{ $user->prenom }}</td>
                  <td>{{ $user->nom }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->phone }}</td>
                  <td>{{ $user->addresse }}</td>
                  <td> {{ $user->produits->count() }} </td>
                  <td class="">   
                  <form id="delete-form-{{$user->id}}" action="{{ route('admin.user.destroy',$user->id) }}" method="post" style="display:none;">
                      @csrf
                      {{ method_field('DELETE') }}
                    </form>
                    <!-- <a style="margin-right:5px;" href="{{ route('admin.user.show',$user->id) }}"><span> <i class=" fa fa-eye"></i> </span></a> -->

                    <a style="margin-left:5px;" href="" onClick=" if(confirm('Etes vous sure de Supprimer cet utilisateur')){ event.preventDefault();document.getElementById('delete-form-{{$user->id}}').submit();}else{event.preventDefault();}" href="{{ route('admin.user.update',$user->id) }}" style="margin-right:20px;"><i class=" glyphicon glyphicon-trash"></i></a>
                  </td>
                </tr>
              @endforeach
                </tbody>
                <tfoot>
                <tr>
                <tr>
                  <th>Image</th>
                  <th>Prenom</th>
                  <th>Nom</th>
                  <th>Email</th>
                  <th>Telepone</th>
                  <th>Adresse</th>
                  <th>Produits</th>
                  <th class="text-success">Option</th>
                </tr>
                </tfoot>
              </table>
              <span class="pull-right">{{ $user_show->links() }}</span>
            </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



@endsection