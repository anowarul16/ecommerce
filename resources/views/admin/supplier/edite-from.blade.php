@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Supplier List</a></li>
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
                    <a href="{{url ('supplier-create')}}">
                    <button class="btn btn-xs btn-primary"><i class="fas fa-plus-circle"></i> Back</button>
                    </a>
                </div>
                
                </div>
            </div>
            <div class="card-body">
            <form action="{{ url('submit-supplier-edit-form') }}" method="POST">
                @csrf
                  <div class="form-group">
                    <label for="name">Supplier Name</label>
                    <input type="hidden" class="form-control" name="id" value="{{ $suppliers->id }}">
                    <input type="text" class="form-control" name="name" value="{{ $suppliers->name }}">
                    <input type="text" class="form-control" name="email" value="{{ $suppliers->email }}">
                    <input type="text" class="form-control" name="contuct_no" value="{{ $suppliers->contuct_no }}">
                    <input type="text" class="form-control" name="address" value="{{ $suppliers->address }}">

                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
