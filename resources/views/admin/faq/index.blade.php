@extends('admin.layout.app')
@section('content')
    <div class="container">
        <nav aria-label="breadcrumb m-0 p-0">
            <ol class="breadcrumb m-0 pl-0 bg-transparent">
                <li class="breadcrumb-item active p-0 pl-1" aria-current="page">
                    Product / {{ $faq[0]->product->name ?? '' }}( {{ $properties[0]->product->title ?? '' }})
                </li>
            </ol>
        </nav>
        @include('admin.validation-error-alert')
        <a class="btn btn-secondary btn-sm  px-2" href="{{ url()->previous() }}">
            <i class="bi bi-arrow-left-square text-white"></i>
        </a>
        <a href="{{ route('admin.faq.new', ['product_id' => $product_id]) }}" class="btn btn-sm btn-secondary">
            <i class="bi bi-plus-square pr-2"></i> Add New FAQ
        </a>
        <div class="bg-light mt-3 mb-5">
            <div class="row" id='content'>
                @foreach ($faqs as $faq)
                    <div class="col-md-6">
                        <div class="card pb-0 pt-3 px-3">
                            <div>
                                <h6 class="mb-2">{{ $faq->title }}</h6>
                            </div>
                            <div class="text-muted">
                                @markdown{{ $faq->desc }}@endmarkdown
                            </div>
                            <div class="card-body pt-0 pl-0">
                                
                                <a href="{{ route('admin.faq.edit', $faq->id) }}" class="card-link btn p-0">
                                    <i title="edit" class="bi bi-pencil-square"></i>
                                </a>

                                <form class="d-inline" action="{{ route('admin.faq.destroy', $faq->id) }}" method="post">
                                    @method('delete') @csrf
                                    <button class="btn p-0">
                                        <i title="Delete" class="bi bi-trash mx-2"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
