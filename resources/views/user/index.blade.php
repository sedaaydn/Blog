@extends('layout')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-lg-6">
                <div class="card shadow mb-12">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">{{ $user->name }}'{{ __('translate.profile_text') }}</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <h4><b>{{ __('translate.photo') }}:</b></h4>
                        <img src="{{ asset('uploads/'.$user->image) }}" width="100" alt="">
                        <h4><b>{{ __('translate.name') }}: </b>{{ $user->name }}</h4>
                        <h4><b>{{ __('translate.eMail') }}: </b>{{ $user->email }}</h4>
                        <h4><b>{{ __('translate.password') }}: </b>********</h4>
                        <a href="{{ route('user.edit',$user->id )}}" class="btn btn-outline-primary">{{ __('translate.edit') }}</a>
                        <button type="submit" class="btn btn-outline-primary" data-toggle="modal" data-target="#logoutModal">{{ __('translate.delete_profile') }}</button>
                    </div>
                </div>


            </div>

        </div>

    </div>

    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('translate.delete_warning') }}</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">{{ __('translate.delete_profile_warning_text') }}</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">{{ __('translate.cancel') }}</button>
                    <form action="{{ route('user.destroy',$user->id )}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-primary">{{ __('translate.delete') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

