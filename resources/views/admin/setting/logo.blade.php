@extends('layouts.app')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mg-b-20 mg-lg-b-25 mg-xl-b-30">
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Logo</a></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-6 text-center">
                            Image
                            @if(!empty($settings))
                                @foreach($settings as $item)
                                    {{ $loop->iteration }}
                                    {{ $item->created_at }}
                                    <img src="{{env('APP_URL').'images/logo/'.$item->value }}"
                                         width="50px">
                                @endforeach
                            @endif

                        </div>
                    </div>
                    <form action="{{ url('submit-logo-setting') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row justify-content-center">
                            <div class="col-md-3 text-right">

                                <input type="file" name="logo">
                            </div>
                            <div class="col-md-2 text-left">
                                <button type="submit" class="btn btn-success">Save</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection


