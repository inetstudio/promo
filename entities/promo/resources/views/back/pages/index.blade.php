@extends('admin::back.layouts.app')

@php
    $title = 'Промо';
@endphp

@section('title', $title)

@section('content')

    @push('breadcrumbs')
        @include('admin.module.promo::back.partials.breadcrumbs.index')
    @endpush

    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <div class="btn-group">
                            <button data-toggle="dropdown" class="btn btn-sm btn-primary btn-lg dropdown-toggle">Добавить</button>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('back.promo.create') }}">Акцию</a></li>
                                <li><a href="{{ route('back.promo.create', ['type' => 'sale']) }}">Скидку</a></li>
                                <li><a href="{{ route('back.promo.create', ['type' => 'promocode']) }}">Промокод</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="table-responsive">
                            {{ $table->table(['class' => 'table table-striped table-bordered table-hover dataTable']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@pushonce('scripts:datatables_promo_index')
{!! $table->scripts() !!}
@endpushonce
