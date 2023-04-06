@extends('layout')
@section('title', 'Mettre à jour')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 text-center pt-2">
                <h1 class="display-5">
                    @lang('lang.edit_informations')
                </h1>
            </div>
        </div>
        <hr>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <form method="post">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="col-12">
                                <label for="name">@lang('lang.name')</label>
                                <input type="text" id="name" name="name" class="form-control"
                                    value="{{ $student->name }}">
                                @if ($errors->has('name'))
                                    <div class="text-danger mt-2">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-12 mt-3">
                                <label for="address">@lang('lang.address')</label>
                                <input type="text" id="address" name="address" class="form-control"
                                    value="{{ $student->address }}">
                                @if ($errors->has('address'))
                                    <div class="text-danger mt-2">
                                        {{ $errors->first('address') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-12 mt-3">
                                <label for="phone">@lang('lang.phone')</label>
                                <input type="text" id="phone" name="phone" class="form-control"
                                    value="{{ $student->phone }}">
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
                                        @if ($student->city_id == $city->id)
                                            <option value="{{ $city->id }}" selected>{{ $city->name }}</option>
                                        @else
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <input type="submit" class="btn btn-outline-success w-100 mt-3" value="@lang('lang.submit')">
                        </div>
                    </form>
                    <form method="post" action="{{ route('student.destroy', $student->id) }}">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger w-100">@lang('lang.delete')</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
