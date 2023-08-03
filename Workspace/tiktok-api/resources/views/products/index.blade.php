@extends('layouts.app')

@section('content')
<div class="main-content">
    <div class="container-fluid">
        <h3 class="page-title">{{__('Products')}}</h3>
        <div class="row">
            <div class="panel">
                <div class="panel-body">
                    @include('layouts.message')
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered nowrap" id="table" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($products as $key=>$values)
                                        <tr>
                                            <td>{{ $values->name }}</td>
                                            <td><img src="{{ asset('public/storage/products/'.$values->image) }}" width="70px"></td>
                                            <td>
                                                <a href="{{ route('products.edit', $values->id) }}"><span class='btn btn-sm btn-info'> Edit</span></a>
                                                <div style="height: 5px;"></div>
                                                <form action="{{ route('products.destroy', $values->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" onclick="return confirm('Do you really want to delete products!')" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $products->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection