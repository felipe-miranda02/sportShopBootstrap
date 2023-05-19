@extends('layouts.app')

@section('template_title')
    {{ $talle->name ?? "{{ __('Show') Talle" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Talle</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('talles.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $talle->name }}
                        </div>
                        <div class="form-group">
                            <strong>Activo:</strong>
                            {{ $talle->activo }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
