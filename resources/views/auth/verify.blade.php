@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Emailni tasdiqlash') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Emailni tasdiqlash xabari emailingizga yuborildi!') }}
                        </div>
                    @endif

                    {{ __("Agar tasdiqlash xabari olmagan bo'lsangiz") }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Tasdiqlash xabarini qayta yuborish') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
