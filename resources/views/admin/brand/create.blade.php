@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Brand List</a></li>
                    <li class="breadcrumb-item"><a href="#">Create</a></li>
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
                    <a href="{{url ('brand-create')}}">
                    <button class="btn btn-xs btn-primary"><i class="fas fa-plus-circle"></i> ADD NEW</button>
                    </a>
                </div>
                
                </div>
            </div>
            <div class="card-body">
            <form action="{{ url('submit-brand-form') }}" method="POST">
            @csrf

            <div class="form-group">
                    <label for="name">Category Name</label>
                    <select class="form-control" name="category_id">
                        <option value="">Select Category</option>
                        @if(!$categorys->isEmpty())
                            @foreach($categorys as $categorys)
                            <option value="{{ $categorys->id }}">{{ $categorys->name }}</option>
                            @endforeach
                        @endif
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="name">SubCategory Name</label>
                    <select class="form-control" name="subCategory_id">
                        <option value="">Select SubCategory</option>
                        @if(!$subcategories->isEmpty())
                            @foreach($subcategories as $SubCategory)
                            <option value="{{ $SubCategory->id }}">{{ $SubCategory->name }}</option>
                            @endforeach
                        @endif
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="name">Brand Name</label>
                    <input type="text" class="form-control" name="name">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
