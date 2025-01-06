@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Kurs ma'lumotlari
                </div>
                <div class="float-end">
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">&larr; Orqaga</a>
                </div>
            </div>
            <div class="card-body">

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Nomi</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $product->name }}
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="description" class="col-md-4 col-form-label text-md-end text-start"><strong>Tavsif</strong></label>
                    <div class="col-md-6" style="line-height: 35px;">
                        {{ $product->description }}
                    </div>
                </div>

                @if($product->video)
                    <div class="row mb-3">
                        <label for="video" class="col-md-4 col-form-label text-md-end text-start"><strong>Video</strong></label>
                        <div class="col-md-6">
                                    <video
                                        id="my-video"
                                        class="video-js"
                                        controls
                                        preload="auto"
                                        width="500%"
                                        height="auto"
                                        data-setup="{}">
                                        <source src="{{ asset('storage/' . $product->video) }}" type="video/mp4">
                                        Sizning brauzeringiz videoni qo'llab-quvvatlamaydi.
                                    </video>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
<script src="https://vjs.zencdn.net/8.0.4/video.min.js"></script>
<script>
    var player = videojs('my-video');
</script>

@endsection
