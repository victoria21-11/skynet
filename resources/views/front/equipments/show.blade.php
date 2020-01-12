@extends('front.layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-8">
        <div class="card mb-3">
            <div class="card-header">
                {{ $equipment->title }}
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="">
                            tags
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="row mb-3">
                            <div class="col-lg-6">
                                <div class="">
                                    {{ $equipment->period }}
                                </div>
                                <div class="">
                                    {{ $equipment->description }}
                                </div>
                            </div>
                            <div class="col-lg-6 text-right">
                                <div class="">
                                    {{ $equipment->price }}
                                </div>
                                <div class="">
                                    <button type="button" name="button" class="btn btn-success">Купить</button>
                                </div>
                            </div>
                        </div>
                        @if($equipment->installment)
                        <div class="card">
                            <div class="card-header">
                                Рассрочка
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="">
                                            {{ $equipment->installment_period }}
                                        </div>
                                    </div>
                                    <div class="col-lg-6 text-right">
                                        <div class="">
                                            {{ $equipment->getInstallmentPrice() }}
                                        </div>
                                        <div class="">
                                            <button type="button" name="button" class="btn btn-success">Взять в рассрочку</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="">
                            {{ $equipment->description }}
                        </div>
                    </div>
                </div>
            </div>
            @component('front.components.likes', [
                'item' => $equipment
            ])
                @slot('url')
                    #
                @endslot
            @endcomponent
        </div>
        <div class="card mb-3">
            <div class="card-body">
                {{ $equipment->extra }}
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
            </div>
        </div>
    </div>
</div>

@endsection
