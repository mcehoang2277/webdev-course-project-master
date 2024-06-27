@extends('layouts.admin.admin')

@section('contents')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 text-end">
                <a href="{{ route('admin.product.detail', ['id' => $product->_id]) }}">Back</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <img src="{{ asset($product->imgURL) }}" alt="{{ $product->name }}" class="w-100">
                    </div>
                    <div class="col-md-9">
                        <form id="form-submit" action="{{ route('admin.product.update', ['id' => $product->_id]) }}"
                            method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter product name" value="{{ $product->name }}" required>
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control" id="price" name="price"
                                    placeholder="Enter product price" value="{{ $product->price }}" required>
                            </div>
                            <div class="form-group">
                                <label for="desc">Description</label>
                                <input type="text" class="form-control" id="desc" name="desc"
                                    placeholder="Enter product description" value="{{ $product->desc }}" required>
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="form-control" id="category" name="category" required disabled>
                                    <option {{ $product->category === 'pizza' ? 'selected' : '' }} value="pizza">Pizza
                                    </option>
                                    <option {{ $product->category === 'side' ? 'selected' : '' }} value="side">Side
                                    </option>
                                    <option {{ $product->category === 'dessert' ? 'selected' : '' }} value="dessert">
                                        Dessert
                                    </option>
                                    <option {{ $product->category === 'drink' ? 'selected' : '' }} value="drink">Drink
                                    </option>
                                </select>
                            </div>
                            @if ($product->category == 'pizza')
                                <div class="form-group">
                                    <label for="additionalProperties[variant]">Variant</label>
                                    <select class="form-control" id="additionalProperties[variant]"
                                        name="additionalProperties[variant]" required>
                                        <option
                                            {{ $product->additionalProperties['variant'] === 'flavors of the world' ? 'selected' : '' }}
                                            value="flavors of the world">
                                            Flavors Of The World
                                        </option>
                                        <option
                                            {{ $product->additionalProperties['variant'] === 'supper topping' ? 'selected' : '' }}
                                            value="supper topping">
                                            Supper Topping
                                        </option>
                                        <option
                                            {{ $product->additionalProperties['variant'] === 'seafood cravers' ? 'selected' : '' }}
                                            value="seafood cravers">
                                            Seafood Cravers
                                        </option>
                                        <option
                                            {{ $product->additionalProperties['variant'] === 'traditional & meatlovers' ? 'selected' : '' }}
                                            value="traditional & meatlovers">
                                            Traditional & Meatlovers
                                        </option>
                                        <option
                                            {{ $product->additionalProperties['variant'] === 'kid favors' ? 'selected' : '' }}
                                            value="kid favors">
                                            Kid Favors
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="additionalProperties[topping]">Topping</label>
                                    <select class="form-control" id="additionalProperties[topping]"
                                        name="additionalProperties[topping]" required>
                                        <option
                                            {{ $product->additionalProperties['topping'] === 'Seafood' ? 'selected' : '' }}
                                            value="Seafood">
                                            Seafood
                                        </option>
                                        <option {{ $product->additionalProperties['topping'] === 'Beef' ? 'selected' : '' }}
                                            value="Beef">
                                            Beef
                                        </option>
                                        <option
                                            {{ $product->additionalProperties['topping'] === 'Chicken' ? 'selected' : '' }}
                                            value="Chicken">
                                            Chicken
                                        </option>
                                        <option {{ $product->additionalProperties['topping'] === 'Pork' ? 'selected' : '' }}
                                            value="Pork">
                                            Pork
                                        </option>
                                        <option
                                            {{ $product->additionalProperties['topping'] === 'Vegetarian' ? 'selected' : '' }}
                                            value="Vegetarian">
                                            Vegetarian
                                        </option>
                                    </select>
                                </div>
                            @endif
                            @if ($product->category == 'side')
                                <div class="form-group">
                                    <label for="additionalProperties[variant]">Variant</label>
                                    <select class="form-control" id="additionalProperties[variant]"
                                        name="additionalProperties[variant]" required>
                                        <option
                                            {{ $product->additionalProperties['variant'] === 'Potato' ? 'selected' : '' }}
                                            value="Potato">
                                            Potato
                                        </option>
                                        <option
                                            {{ $product->additionalProperties['variant'] === 'Chicken' ? 'selected' : '' }}
                                            value="Chicken">
                                            Chicken
                                        </option>
                                        <option
                                            {{ $product->additionalProperties['variant'] === 'Spaghetti' ? 'selected' : '' }}
                                            value="Spaghetti">
                                            Spaghetti
                                        </option>
                                        <option
                                            {{ $product->additionalProperties['variant'] === 'Sausage' ? 'selected' : '' }}
                                            value="Sausage">
                                            Sausage
                                        </option>
                                        <option
                                            {{ $product->additionalProperties['variant'] === 'Bread' ? 'selected' : '' }}
                                            value="Bread">
                                            Bread
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="additionalProperties[topping]">Topping</label>
                                    <select class="form-control" id="additionalProperties[topping]"
                                        name="additionalProperties[topping]" required>
                                        <option
                                            {{ $product->additionalProperties['topping'] === 'Seafood' ? 'selected' : '' }}
                                            value="Seafood">
                                            Seafood
                                        </option>
                                        <option {{ $product->additionalProperties['topping'] === 'Beef' ? 'selected' : '' }}
                                            value="Beef">
                                            Beef
                                        </option>
                                        <option
                                            {{ $product->additionalProperties['topping'] === 'Chicken' ? 'selected' : '' }}
                                            value="Chicken">
                                            Chicken
                                        </option>
                                        <option {{ $product->additionalProperties['topping'] === 'Pork' ? 'selected' : '' }}
                                            value="Pork">
                                            Pork
                                        </option>
                                        <option
                                            {{ $product->additionalProperties['topping'] === 'Vegetarian' ? 'selected' : '' }}
                                            value="Vegetarian">
                                            Vegetarian
                                        </option>
                                    </select>
                                </div>
                            @endif
                            <div>
                                <button type="button" data-toggle="modal" data-target="#confirmModal"
                                    class="btn btn-success">Submit
                                </button>
                            </div>
                        </form>
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
                    <h5 class="modal-title" id="confirmModal">Are you sure to update?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Update" below if you want to make this change.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="btn-submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custome-scripts')
    <script>
        $(document).ready(function() {
            $('#btn-submit').click(function() {
                $('#form-submit').submit();
            });
        });
    </script>
@endsection
