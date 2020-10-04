@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Subcategory List</a></li>
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
                    <a href="{{url ('subcategory-create')}}">
                    <button class="btn btn-xs btn-primary"><i class="fas fa-plus-circle"></i> ADD NEW</button>
                    </a>
                </div>
                
                </div>
            </div>
            <div class="card-body">
            <table id="subcategory_list" class="table">
            <thead>
                <tr>
                    <th class="wd-20p">S.L.</th>
                    <th class="wd-20p">Category</th>
                    <th class="wd-20p">Sub Category</th>
                    <th class="wd-20p">Date</th>
                    <th class="wd-20p">Action</th>
                </tr>
            </thead>
            <tbody>
            @if(isset($subcategories) || !empty($subcategories))
                  @foreach($subcategories as $item)
                      <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $item->cname}}</td>
                          <td>{{ $item->name }}</td>
                          <td>{{ $item->created_at }}</td>
                          <td>
                          <a href="{{ url('edit-subcategory-'.$item->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                          <a href="{{ url('delete-subcategory-'.$item->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>


                          
                          
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
$('#subcategory_list').DataTable({
  language: {
    searchPlaceholder: 'Search...',
    sSearch: '',
    lengthMenu: '_MENU_ items/page',
  }
});

</script>
@endsection
