@extends('main')

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
            {!! \App\Helpers\Helpers::menu($menus) !!}       
        </tbody>
    </table>
@endsection