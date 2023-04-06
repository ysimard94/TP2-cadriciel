@extends('layout')
@section('content')
    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4 pt-4">
                    <div class="card">
                        <h3 class="card-header text-center">
                            @lang('lang.register_user')
                        </h3>
                        <div class="card-body">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <form action="{{ route('user.store') }}" method="post">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="email" placeholder="@lang('lang.email')" class="form-control"
                                        name="email" value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <div class="text-danger mt-2">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="@lang('lang.password')" class="form-control"
                                        name="password">
                                    @if ($errors->has('password'))
                                        <div class="text-danger mt-2">
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="d-grid mx-auto">
                                    <input type="submit" value="@lang('lang.register')" class="btn btn-dark btn-block">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
