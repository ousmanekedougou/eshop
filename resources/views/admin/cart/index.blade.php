@extends('admin.layouts.app')

@section('main-content')




     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Votre Panier
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin.produit.index') }}"> <span class="btn btn-success" >Retoure</span></a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    @include('includes.message')
      <!-- Default box -->
         @if(Cart::count() > 0)
      <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Image</th>
                  <th>Designation</th>
                  <th>Prix</th>
                  <th class="text-success">Option</th>
                </tr>
                </thead>
                <tbody>
         @foreach(Cart::content() as $panier)
                <tr>
                  <td><img class="img-thumnail " style="width:60px;height:auto;" src="{{ Storage::url($panier->model->image) }}" alt="" srcset=""></td>
                  <td>{{ $panier->model->nom }}</td>
                  <td>{{ $panier->model->getPrice() }}</td>
                  <td class="">   
                  <form id="delete-form-{{$panier->rowId}}" action="{{ route('admin.cart.destroy',$panier->rowId) }}" method="post" style="display:none;">
                      @csrf
                      {{ method_field('DELETE') }}
                    </form>
                    <a href="" onClick=" if(confirm('Etes vous sure de Supprimer ce produit')){ event.preventDefault();document.getElementById('delete-form-{{$panier->rowId}}').submit();}else{event.preventDefault();}" href="" style="margin-right:20px;"><i class=" glyphicon glyphicon-trash"></i></a>
                  </td>
                  
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                <tr>
                <th>Image</th>
                  <th>Designation</th>
                  <th>Prix</th>
                  <th class="text-success">Option</th>
                </tr>
                </tfoot>
              </table>
            </div>
         @else
         <p>Votre panier est vide</p>
         @endif


  <br><hr>
      
      <div class="row">
        <div class="col-lg-6 col-xs-6">
          <p>Coupon de code</p>
          <!-- small box -->
        <p>
        <div class=" bg-default">
            <form action="#" method="post">
                <div class="input-group input-group-sm" style="border-radius:100px;">
                    <input type="text" placeholder="Votre Coupon" class="form-control">
                    <span class="input-group-btn">
                      <button type="submit"  class="btn btn-info btn-flat">Envoyer le Coupon</button>
                    </span>
                </div>
            </form>
          </div>
        </p>
        <p>
            <div class="box-body pad">
                <p>Des instructions</p>
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero fuga necessitatibus dicta eum odio at quod
                </p>
                  <form>
                        <textarea style="border-radius:100px;" id="editor1" class="form-control" name="editor1" rows="" cols="40">
                        </textarea>
                  </form>
            </div>
        </p>
        </div>
        <!-- ./col -->
        <div class="col-lg-6 col-xs-6">
          <!-- small box -->
          <p>Detail de la commande</p>
          <div class=" bg-default">
          <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                  <tr>
                    <td class="mailbox-name"><a href="read-mail.html">Sous-total</a></td>
                   <td></td>
                   <td></td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date"><span>{{ getPrice(Cart::subtotal()) }}</span></td>
                  </tr>
                  <!-- <tr>
                    <td class="mailbox-name"><a href="read-mail.html">Shopping and Hadling</a></td>
                   <td></td>
                   <td></td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date">5 mins ago</td>
                  </tr> -->
                  <tr>
                    <td class="mailbox-name"><a href="read-mail.html">Taxe</a></td>
                   <td></td>
                   <td></td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date">{{ getPrice(Cart::tax()) }}</td>
                  </tr>
                  <tr>
                    <td class="mailbox-name"><a href="read-mail.html">TOTAL</a></td>
                   <td></td>
                   <td></td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date">{{ getPrice(Cart::total()) }}</td>
                  </tr>
                  </tbody>
                </table>
              </div>
              <br>
                <!-- /.table -->
                <a href="#" class="btn btn-warning btn-block" style="border-radius:100px;">Passre a la caisse </a>
              <!-- /.mail-box-messages -->
          </div>
        </div>
        <!-- ./col -->
     
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



@endsection