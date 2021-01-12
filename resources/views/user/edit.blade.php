@extends('layout')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-lg-6">
                <div class="card shadow mb-12">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">{{ auth()->user()->name }}{{ __('translate.profile_text') }}</h6>
                        <div class="dropdown no-arrow">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                            </a>
                        </div>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <h4>{{ __('translate.photo') }}:</h4><img src="{{ asset('uploads/'.$user->image) }}" width="100" alt=""><br><br>
                            <input type="file" name="file"><br><br>
                            <h4>{{ __('translate.name') }}: </h4><input type="text" name="name" value="{{ $user->name }}"><br><br>
                            <h4>{{ __('translate.eMail') }}:</h4><input type="text" name="email" value="{{ $user->email }}"><br><br>
                            <h4>{{ __('translate.password') }}:</h4><input type="password" name="password" value="{{ $user->password }}">
                            <br><br>
                            <button type="submit" class="btn btn-outline-primary">{{ __('translate.save') }}</button>
                        </form>
                    </div>
                </div>


            </div>

        </div>

    </div>
    <!-- /.container-fluid -->

@endsection

