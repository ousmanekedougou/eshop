@extends('admin.layouts.app')

@section('main-content')




     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Modifier votre produit
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route ('admin.produit.index') }}"> <span class="btn btn-success" >Home</span></a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header ">

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          
      <div class="row">
        <div class="col-lg-offset-2 col-lg-8">
        <div class=" box-primary">
            <!-- /.box-header -->
            <!-- form start -->
              <div class="box-body">
              @include('includes.message')
             <div class="row form-group">
            <form role="form" action="{{ route('admin.produit.update',$edit->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{ method_field('PUT') }}
            <label for="" style="margin-left:15px;">Genre</label>
            <div class="form-group row">

                <div class="col-lg-offset-0 col-lg-4">
                  <div class="col-lg-6 ">
                      <div class="radio">
                          <label>
                            <input type="radio" name="genre" id="optionsRadios1" value="1"
                            @if($edit->genre == '1')
                             checked
                             @endif
                            >
                            Homme
                          </label>
                        </div>
                  </div>

                  <div class="col-lg-6">
                    <div class="radio">
                        <label>
                          <input type="radio" name="genre" id="optionsRadios2" value="2"
                          @if($edit->genre == '2')
                             checked
                             @endif
                          >
                        Femme
                        </label>
                      </div>
                 </div>
               </div>

              </div>

              <div class="col-lg-6">

                  <div class="form-group">
                      <label for="exampleInputEmail1">Nom de votre produit</label>
                      <input type="text" value="{{ $edit->nom }}" name="nom" class="form-control" id="exampleInputEmail1" placeholder="">
                    </div>

                    <div class="form-group">
                    <label>Age</label>
                    <select class="form-control" name="age" style="width: 100%;">
                      <option value="1">Adulte</option>
                      <option value="2">Adollecent</option>
                      <option value="3">Enfants</option>
                    </select>
                  </div>

                  <div class="form-group">
                  <label for="exampleInputPassword1">Image</label>
                  <input type="file" name="image" id="exampleInputFile" placeholder="">
                </div>

                <div class="checkbox" style="margin-top:45px;">
                  <label>
                    <input type="checkbox"> Check me out
                  </label>
                </div>

            
              </div>

               <div class="col-lg-6">
               <div class="form-group">
                <label>Cetegorie de votre produit</label>
                <select class=" select2" name="category[]" multiple="multiple" data-placeholder=""
                  style="width: 100%;">
                
                  @foreach($category as $category)
                  <option value="{{ $category->id }}"
                  
                  
                  @foreach($edit->categories as $editCategory)
                        @if($editCategory->id == $category->id)
                        selected
                        @endif
                  @endforeach
                  
                  > {{ $category->nom }} </option>
                 @endforeach
                </select>
              </div>

              <div class="form-group">
                <label>Tag de votre produit</label>
                <select class="form-control select2" name="tag[]" multiple="multiple" data-placeholder=""
                        style="width: 100%;">
                  @foreach($tag as $tag)
                  <option value="{{ $tag->id }}"
                  

                  @foreach($edit->tags as $editTag)
                        @if($editTag->id == $tag->id)
                        selected
                        @endif
                  @endforeach
                  

                  > {{ $tag->nom }} </option>
                 @endforeach
                </select>
              </div>

            
                <div class="form-group">
                      <label for="exampleInputEmail1">Prix du produit</label>
                      <input type="number" value="{{ $edit->prix }}" name="prix" class="form-control" id="exampleInputEmail1" placeholder="">
                    </div>

            </div>
              
              
            </div>
            <div class="box-body pad">
              
                <textarea name="detail" class="textarea" placeholder=""
                  style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $edit->detail }}</textarea>
              
            </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Modifier</button>
                <button type="reset" class="btn btn-info">Annuler</button>
              </div>


            </form>
               </div>
          </div>

        </div>
        </div>
      </div>
      
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



@endsection