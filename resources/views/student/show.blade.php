@extends('layout')
@section('title', 'Mettre à jour')
@section('content')
<div class="container">
        <div class="row">
            <div class="col-12 text-center pt-2">
                <h1 class="display-5">
                    @lang('lang.student_info')
                </h1>
            </div> <!--/col-12-->
        </div><!--/row-->
                <hr>
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <form  method="post">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                                <p>@lang('lang.name') : {{ $student->name }}</p>
                                <p>@lang('lang.address') : {{ $student->address }}</p>
                                <p>@lang('lang.city') : {{ $student->city }}</p>
                                <p>@lang('lang.phone') : {{ $student->phone }}</p>

                                <a href="{{ route('student.edit', $student->id)}}" class="btn btn-outline-success">@lang('lang.edit')</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div><!--/container-->

@endsection