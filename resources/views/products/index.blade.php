@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Kurslar ro'yxati</div>
    <div class="card-body">
        @can('create-product')
            <a href="{{ route('products.create') }}" class="btn btn-success btn-sm my-2">
                <i class="bi bi-plus-circle"></i> Yangi kurs qo'shish
            </a>
        @endcan

        @forelse ($products as $product)
            <div class="mb-4 border rounded p-3">
                <h5>{{ $product->name }}</h5>
                <p>{{ $product->description }}</p>

                @if($product->video)
                    <div class="mb-3">
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
                @endif

                <div>
                    <form action="{{ route('products.destroy', $product->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')

                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-warning btn-sm">
                            <i class="bi bi-eye"></i> Ko'rish
                        </a>

                        @can('edit-product')
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">
                                <i class="bi bi-pencil-square"></i> Tahrirlash
                            </a>
                        @endcan

                        @can('delete-product')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this product?');">
                                <i class="bi bi-trash"></i> O'chirish
                            </button>
                        @endcan
                    </form>
                </div>
            </div>
        @empty
            <div>
                <span class="text-danger">
                    <strong>Kurs topilmadi!</strong>
                </span>
            </div>
        @endforelse

        {{ $products->links() }}
    </div>
</div>
@endsection
