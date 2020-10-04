@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Product List</a></li>
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
                    <button class="btn btn-xs btn-primary"><i class="fas fa-plus-circle"></i> ADD NEW</button>
                    </a>
                </div>
                
                </div>
            </div>
            <div class="card-body">
            <table id="product_list" class="table">
            <thead>
                <tr>
                    <th class="wd-20p">S.L.</th>
                    <th class="wd-20p">Supplier_id</th>
                    <th class="wd-20p">Title</th>
                    <th class="wd-20p">Subtitle</th>
                    <th class="wd-20p">Description</th>
                    <th class="wd-20p">Price</th>
                    <th class="wd-20p">Brand_id</th>
                    <th class="wd-20p">Subcategory_id</th>
                    <th class="wd-20p">Date</th>
                    <th class="wd-20p">Image</th>

                    <th class="wd-20p">Action</th>
                </tr>
            </thead>
            <tbody>
            @if(isset($products) || !empty($products))
                  @foreach($products as $item)
                      <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $item->supplier_id}}</td>
                          <td>{{ $item->title }}</td>
                          <td>{{ $item->subtitle }}</td>
                          <td>{{ $item->description }}</td>
                          <td>{{ $item->price }}</td>
                          <td>{{ $item->brand_id }}</td>
                          <td>{{ $item->subcategory_id }}</td>
                          <td>{{ $item->created_at }}</td>
                          <td>
                                <img src="{{env('APP_URL').'images/products/'.$item->image }}" width="50px">
                          </td>
                          <td>
                          <a href="{{ url('edit-product-'.$item->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                          <a href="{{ url('delete-product-'.$item->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>

                          </td>
                      </tr>
                  @endforeach
              @endif
           
            </tbody>
        </table>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
$('#product_list').DataTable({
  language: {
    searchPlaceholder: 'Search...',
    sSearch: '',
    lengthMenu: '_MENU_ items/page',
  }
});

</script>
@endsection
