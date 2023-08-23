@extends('main')

@section('head')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/template/admin/js/main.js"></script>
@endsection

@section('content')

    <table class='table'>
        <thead>
            <tr>
                <th style="width: 50px">ID</th>
                <th>Name</th>
                <th>Active</th> 
                <th>Update</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            {!! \App\Helpers\Helper::product($products) !!}       
        </tbody>
    </table>

@endsection
