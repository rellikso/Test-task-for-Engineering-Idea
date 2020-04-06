@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bulletin board</div>

                <div class="card-body">
                    @foreach ($bulletins as $bulletin)
                        <div class="row">
                            <div class="col-12">
                                <a href="{{ route('view', $bulletin->id) }}">{{ $bulletin->header }}</a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-12">
                                @if ($bulletin->src != '')
                                    <img src="{{ $bulletin->src }}" width="100%" />
                                @else
                                    &nbsp;
                                @endif
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-12">
                                <div class="row">
                                    <div class="col-lg-4 col-md-4 col-sm-12">
                                        {{ $bulletin->first_name }} {{ $bulletin->last_name }}
                                    </div>
                                    <div class="col-lg-8 col-md-8 col-sm-12">
                                        {{ $bulletin->created_at }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        {!!  \Illuminate\Support\Str::limit($bulletin->text, 50, $end='...') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                {{ $bulletins->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
