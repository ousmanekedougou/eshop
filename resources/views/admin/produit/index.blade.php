@extends('admin.layouts.app')

@section('main-content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Tout vos produit
        <small>  @include('includes.message')</small>
      </h1>
      <ol class="breadcrumb">
        <li><a  href="{{ route('admin.produit.create') }}"> <span class="btn btn-success" >Ajouter un Produit</span> </a></li>
       
      </ol>
<br>
    </section>
    <!-- Main content -->
    <section class="content">


      <!-- =========================================================== -->

      <div class="row">
        @foreach($produit_show as $produit)
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-default">
            <span class="info-box-icon"><img class="img-thumnail" style="width:70px;height:auto;" src="{{ Storage::url($produit->image) }}" alt="" srcset=""></span>

            <div class="info-box-content">
              <span class="info-box-text">{{ $produit->nom }}</span>
              <span class="info-box-number">41,410</span>

              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
                  <span>
                    <form id="delete-form-{{$produit->id}}" action="{{ route('admin.produit.destroy',$produit->id) }}" method="post" style="display:none;">
                      @csrf
                      {{ method_field('DELETE') }}
                    </form>

                    <form id="add_panier-{{$produit->id}}" action="{{ route('admin.cart.store') }}" method="post" style="display:flex;">
                      @csrf
                      <!-- {{ method_field('DELETE') }} -->
                      <input type="hidden" name="produit_id" value="{{ $produit->id }}">
                      <!-- <button type="submit"><i title="Ajouter au Panier" class="glyphicon glyphicon-shopping-cart"></i></button> -->
                    </form>

                     <a href="{{ route('admin.produit.edit',$produit->id) }}" style="margin-right:20px;"><i class=" glyphicon glyphicon-edit"></i></a>

                     <a href="#" onClick="event.preventDefault();document.getElementById('add_panier-{{$produit->id}}').submit();" style="margin-right:20px;"><i title="Ajouter au Panier" class="glyphicon glyphicon-shopping-cart"></i></a>

                    <a onClick=" if(confirm('Etes vous sure de Supprimer ce produit')){ event.preventDefault();document.getElementById('delete-form-{{$produit->id}}').submit();}else{event.preventDefault();}" href="{{ route('admin.produit.update',$produit->id) }}" style="margin-right:20px;"><i class=" glyphicon glyphicon-trash"></i></a>
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        @endforeach
        <!-- /.col -->


      </div>
      <!-- /.row -->

      <!-- =========================================================== -->

   


   

  

   


    </section>
    <!-- /.content -->
  </div>



@endsection