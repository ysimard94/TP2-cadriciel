@extends('layout')
@section('title', 'City list')
@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        @lang('lang.city_list')
                    </div>
                    <div class="card-body">
                        <ul>
                            @foreach($cities as $city)
                                <li>{{ $city->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection