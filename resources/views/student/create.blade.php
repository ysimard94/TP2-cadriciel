@extends('layout')
@section('title', 'Become a student')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center pt-2">
                <h1 class="display-5">
                    @lang('lang.create_student')
                </h1>
            </div>
        </div>
        <hr>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <form action="{{ route('student.create') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="col-12">
                                <label for="name">@lang('lang.name')</label>
                                <input type="text" id="name" name="name" class="form-control">
                                @if ($errors->has('name'))
                                    <div class="text-danger mt-2">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-12 mt-3">
                                <label for="address">@lang('lang.address')</label>
                                <input type="text" id="address" name="address" class="form-control">
                                @if ($errors->has('address'))
                                    <div class="text-danger mt-2">
                                        {{ $errors->first('address') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-12 mt-3">
                                <label for="phone">@lang('lang.phone')</label>
                                <input type="text" id="phone" name="phone" class="form-control">
                                @if ($errors->has('phone'))
                                    <div class="text-danger mt-2">
                                        {{ $errors->first('phone') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-12 mt-3">
                                <label for="city_id">@lang('lang.city')</label>
                                <br>
                                <select name="city_id" id="city_id" class="form-select">
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
                            <input type="submit" class="btn btn-outline-success w-100 mt-3" value="@lang('lang.submit')">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
