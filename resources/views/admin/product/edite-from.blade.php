@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Product List</a></li>
                    <li class="breadcrumb-item"><a href="#">Edit</a></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                
                <div class="col-md-10"></div>
                <div class="col-md-2 text-right">
                    <a href="{{url ('product-create')}}">
                    <button class="btn btn-xs btn-primary"><i class="fas fa-plus-circle"></i> Back</button>
                    </a>
                </div>
                
                </div>
            </div>
            <div class="card-body">
            <form action="{{ url('submit-product-edit-form') }}" method="POST" enctype="multipart/form-data">
                @csrf
                  <div class="form-group">
                    <label for="name">Supplier Name</label>
                    <select class="form-control" name="supplier_id">
                        <option value="">Select Supplier</option>
                        @if(!$suppliers->isEmpty())
                            @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->id }}" @if($supplier->id == $products->supplier_id ) selected @endif>{{ $supplier->name }}</option>
                            @endforeach
                        @endif
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="name">Title</label>
                    <input type="hidden" class="form-control" name="id" value="{{ $products->id }}">
                    <input type="text" class="form-control" name="title" value="{{ $products->title }}">

                  </div>
                  <div class="form-group">
                    <label for="name">Subtitle</label>
                    <input type="text" class="form-control" name="subtitle" value="{{ $products->subtitle}}">
                    <input type="hidden" class="form-control" name="id" value="{{ $products->id}}">

                  </div>
                  <div class="form-group">
                    <label for="name">Description</label>
                    <input type="text" class="form-control" name="description" value="{{ $products->description}}">
                    <input type="hidden" class="form-control" name="id" value="{{ $products->id}}">

                  </div>
                  <div class="form-group">
                    <label for="name">Price</label>
                    <input type="text" class="form-control" name="price" value="{{ $products->price}}">
                    <input type="hidden" class="form-control" name="id" value="{{ $products->id}}">

                  </div>

                  <div class="form-group">
                    <label for="name">Brand Name</label>
                    <select class="form-control" name="brand_id">
                        <option value="">Select Brand</option>
                        @if(!$brands->isEmpty())
                            @foreach($brands as $brand)
                            <option value="{{ $brand->id }}"  @if($brand->id == $products->brand_id ) selected @endif>{{ $brand->name }}</option>
                            @endforeach
                        @endif
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="name">Subcategory Name</label>
                    <select class="form-control" name="subcategory_id">
                        <option value="">Select Subcategory</option>
                        @if(!$subcategorys->isEmpty())
                            @foreach($subcategorys as $subcategory)
                            <option value="{{ $subcategory->id }}" @if($subcategory->id == $products->subcategory_id ) selected @endif>{{ $subcategory->name }}</option>
                            @endforeach
                        @endif
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="name">Image</label>
                    <input type="file" class="form-control" name="image"  value="{{ $products->image}}">
                    <input type="hidden" class="form-control" name="id"  value="{{ $products->id}}">

                  </div>


                  
                  <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
