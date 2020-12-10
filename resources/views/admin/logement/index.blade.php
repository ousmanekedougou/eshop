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
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Editors</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
        
        <!-- la partie des  communes-->

          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Enregistrement des communes</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover text-center">
                <thead>
                <tr>
                  <th>Communes</th>
                  <th>Departements</th>
                  <th class="text-success">Option</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>kedougou</td>
                  <td>kedougou</td>
                  <td class="text-center">   
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_commune">
                    A
                    </button>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit_commune">
                    M
                    </button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delet_commune">
                    S
                    </button>
                  </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Communes</th>
                  <th>Departements</th>
                  <th class="text-success">Option</th>
                </tr>
                </tfoot>
              </table>
            </div>


          </div>
          <!-- /.box -->
          <!-- fin de la partie des communes -->



        
        <!-- la partie des  immeubles-->

          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Enregistrement des immeubles</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover text-center">
                <thead>
                <tr>
                  <th>image</th>
                  <th>Nom</th>
                  <th>Adresse</th>
                  <th class="text-success">Option</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>image</td>
                  <td>zone A</td>
                  <td>grand dakar</td>
                  <td class="text-center">   
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_immeuble">
                    A
                    </button>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit_immeuble">
                    M
                    </button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="">
                    S
                    </button>
                  </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                <th>image</th>
                  <th>Nom</th>
                  <th>Adresse</th>
                  <th class="text-success">Option</th>
                </tr>
                </tfoot>
              </table>
            </div>


          </div>
          <!-- /.box -->
          <!-- fin de la partie des immeubles -->
        

           <!-- la partie des cambres-->

          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Enregistrement des chambres</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover text-center">
                <thead>
                <tr>
                  <th>Nom</th>
                  <th>immeubles</th>
                  <th class="text-success">Option</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>4D1</td>
                  <td>immeuble 39</td>
                  <td class="text-center">   
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_chambre">
                    A
                    </button>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#edit_chambre">
                    M
                    </button>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#">
                    S
                    </button>
                  </td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Nom</th>
                  <th>immeubles</th>
                  <th class="text-success">Option</th>
                </tr>
                </tfoot>
              </table>
            </div>


          </div>
          <!-- /.box -->
          <!-- fin de la partie des chambres -->



  




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