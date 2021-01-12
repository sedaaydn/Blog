
@extends('layout')

@section('content')
    <div class="row justify-content-md-center">

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                {{ __('translate.posts_count') }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $post_count }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-lg-6 mb-4">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">{{ __('translate.statistics') }}</h6>
                    </div>
                    <div class="card-body">
                        <h4 class="small font-weight-bold">{{ __('translate.post_rate') }}<span
                                class="float-right">{{ $post_orani }}%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar" role="progressbar" style="width: {{ $post_orani }}%"aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <h4 class="small font-weight-bold">{{ __('translate.comment_rate') }}<span
                                class="float-right">{{ $yorum_oran }}%</span></h4>
                        <div class="progress mb-4">
                            <div class="progress-bar bg-info" role="progressbar" style="width: {{ $yorum_oran }}%"
                                aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

@endsection
