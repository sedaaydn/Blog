@extends('layout')
@section('content')
@if ($postCount==0)
<div class="container-fluid">
    <div class="row justify-content-md-center">
        <div class="col-lg-6">
            <div class="card shadow mb-12">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">{{ __('translate.no_post') }}</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <a href="{{ route('post.create') }}" class="btn btn-outline-primary btn-sm">{{ __('translate.create') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@else
@foreach ($user->posts as $post)
<div class="container-fluid">
    <div class="row justify-content-md-center">
        <div class="col-lg-6">
            <div class="card shadow mb-12">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">{{ $post->title }}</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                    </div>
                </div>

                <div class="card-body">
                    <h6>{{ $post->description }}</h6>
                    <a class="btn btn-outline-primary btn-sm" href="{{ route('post.edit',$post->id) }}">{{ __('translate.edit_post') }}</a>
                    <button class="btn btn-outline-primary btn-sm" type="submit" data-toggle="modal"
                        data-target="#logoutModal">{{ __('translate.delete_post') }}</button>


                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{ __('translate.delete_warning') }}</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">{{ __('translate.delete_post_warning_text') }}</div>
                                <div class="modal-footer">
                                    <form method="POST" action="{{ route('post.destroy',$post->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-secondary" type="button"
                                            data-dismiss="modal">Cancel</button>
                                        <form action="{{ route('user.destroy',$user->id )}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-primary">{{ __('translate.delete') }}</button>
                                        </form>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="card shadow mb-4">
                        <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                            role="button" aria-expanded="true" aria-controls="collapseCardExample">
                            <h6 class="m-0 font-weight-bold text-primary">{{ __('translate.comments') }}</h6>
                        </a>
                        <!-- Yorumlar -->
                        <div class="collapse show" id="collapseCardExample">
                            <div class="card-body">
                                @foreach ($post->comments as $comment)
                                <li>{{ $comment->comment }}</li>
                                @if (auth()->user()->id == $comment->user_id)
                                <button class="btn btn-outline-primary btn-sm" type="submit" data-toggle="modal"
                                    data-target="#logoutModal2">{{ __('translate.delete_comment') }}</button>


                                <div class="modal fade" id="logoutModal2" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ __('translate.delete_warning') }}</h5>
                                                <button class="close" type="button" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">{{ __('translate.delete_comment_warning_text') }}</div>
                                            <div class="modal-footer">
                                                <form method="POST"
                                                    action="{{ route('comment.destroy',$comment->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-secondary" type="button"
                                                        data-dismiss="modal">Cancel</button>
                                                    <form action="{{ route('user.destroy',$user->id )}}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="btn btn-primary">{{ __('translate.delete') }}</button>
                                                    </form>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                @endif
                                @endforeach
                                <form class="col-8" action="{{ route('commentStore',$post->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <textarea name="comment" class="form-control" id="exampleFormControlTextarea1"
                                            rows="3" placeholder="Yorum yazınız"></textarea>
                                    </div>

                                    <button type="submit" class="btn btn-primary">{{ __('translate.share') }}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
@endforeach
@endif
@endsection
