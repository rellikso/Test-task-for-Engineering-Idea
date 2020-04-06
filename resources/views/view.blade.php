@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $bulletin->header }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <a href="{{ route('home') }}">Back to bulletin board</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            @if ($bulletin->src != '')
                                <img src="{{ $bulletin->src }}" width="100%" />
                            @else
                                &nbsp;
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-12">
                                    {{ $bulletin->first_name }}  {{ $bulletin->last_name }}
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    {{ $bulletin->created_at }}
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    {!!  $bulletin->text !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
