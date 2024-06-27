@extends('layouts.admin.admin')

@section('contents')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible mb-4" role="alert">
            <strong>Success!</strong>
            <span>{{ session('success') }}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 text-end">
                <a href="{{ route('admin.product') }}">Back</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{ asset($product->imgURL) }}" alt="{{ $product->name }}" class="w-100">
                    </div>
                    <div class="col-md-9">
                        <h3 class="font-weight-bold text-primary">{{ $product->name }}</h3>
                        <p>Price:
                            <span class="font-weight-bold">{{ number_format($product->price, 0, ',', ',') }} VNĐ
                            </span>
                        </p>
                        <p>Category:
                            <span class="font-weight-bold">{{ $product->category }}
                            </span>
                        </p>
                        @if ($product->category == 'pizza' || $product->category == 'side')
                            <p>Variant:
                                <span class="font-weight-bold">{{ $product->additionalProperties['variant'] }}
                                </span>
                            </p>
                            <p>Topping:
                                <span class="font-weight-bold">{{ $product->additionalProperties['topping'] }}
                                </span>
                            </p>
                        @endif
                        <p>Description:
                            <span class="font-weight-bold">{{ $product->desc }}
                            </span>
                        </p>
                        <div>
                            <a href="{{ route('admin.product.edit', ['id' => $product->_id]) }}"
                                class="btn btn-warning">Edit</a>
                            <a data-toggle="modal" data-target="#confirmModal" class="btn btn-danger">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModal">Are you sure to delete?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Delete" below if you want to do this action.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <form action="{{ route('admin.product.delete', ['id' => $product->_id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" id="btn-submit" class="btn btn-primary">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
