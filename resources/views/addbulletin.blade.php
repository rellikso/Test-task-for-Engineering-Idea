@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-2 ml-auto">
                @if (url()->current() != route('account'))
                    <a class="nav-link" href="{{ route('account') }}">{{ __('Account info') }}</a>
                @else
                    <span class="nav-link">{{ __('Account info') }}</span>
                @endif
            </div>
            <div class="col-2">
                @if (url()->current() != route('add'))
                    <a class="nav-link" href="{{ route('add') }}">{{ __('Add a buletin') }}</a>
                @else
                    <span class="nav-link">{{ __('Add a buletin') }}</span>
                @endif
            </div>
        </div>
    </div>

    <div class="container">
    @if ( Session::has('flash_message') )
    <div class="row alert {{ Session::get('flash_type') }}">
        <h3>{{ Session::get('flash_message') }}</h3>
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add bulletin') }}</div>

                <div class="card-body">
                    <form enctype="multipart/form-data" method="POST" action="{{ route('add') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="header" class="col-md-4 col-form-label text-md-right">{{ __('Header') }}</label>

                            <div class="col-md-6">
                                <input id="user_id" type="hidden" name="user_id" value="{{ $user->id }}">
                                <input id="header" type="text" class="form-control @error('header') is-invalid @enderror" name="header" value="" required autocomplete="header" autofocus>

                                @error('header')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" autocomplete="image" autofocus>

                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="text" class="col-md-4 col-form-label text-md-right">{{ __('Text') }}</label>

                            <div class="col-md-6">
                                <textarea id="text" class="form-control @error('text') is-invalid @enderror" name="text" required autocomplete="text" autofocus></textarea>

                                @error('text')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add bulletin') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
