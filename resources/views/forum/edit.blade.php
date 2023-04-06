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
            <!--/col-12-->
        </div>
        <!--/row-->
        <hr>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    @if (session()->has('success'))
                        <div class="alert alert-success">
                            @lang('lang.success_update')
                        </div>
                    @endif
                    <form method="post">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="col-12">
                                <label for="title">@lang('lang.title')</label>
                                <input type="text" id="title" name="title" class="form-control"
                                    value="{{ $article->title }}">
                                @if ($errors->has('title'))
                                    <div class="text-danger mt-2">
                                        {{ $errors->first('title') }}
                                    </div>
                                @endif
                            </div>
                            <div class="col-12 mt-3">
                                <label for="body">@lang('lang.body')</label>
                                <input type="text" id="body" name="body" class="form-control"
                                    value="{{ $article->body }}">
                                @if ($errors->has('body'))
                                    <div class="text-danger mt-2">
                                        {{ $errors->first('body') }}
                                    </div>
                                @endif
                            </div>
                            <input type="submit" class="btn btn-outline-success w-100 mt-3" value="@lang('lang.submit')">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/container-->

@endsection
