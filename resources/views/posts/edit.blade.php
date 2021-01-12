@extends('layout')

@section('content')


<div class="container-fluid">
    <div class="row justify-content-md-center">
        <div class="col-lg-6">
            <div class="card shadow mb-12">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">{{ __('translate.edit_post') }}</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form class="container col-8" action="{{ route('post.update',$post->id) }}" method="POST">
                        @method('put')
                        @csrf
                        <div class="form-group">
                          <label for="exampleInputEmail1">{{ __('translate.title') }}</label>
                          <input name="title" value="{{ $post->title }}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">

                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">{{ __('translate.post') }}</label>
                            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $post->description }}</textarea>
                          </div>

                        <button type="submit" class="btn btn-primary">{{ __('translate.save') }}</button>
                      </form>
                </div>
            </div>
        </div>

    </div>

</div>





@endsection
