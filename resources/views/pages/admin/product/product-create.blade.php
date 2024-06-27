@extends('layouts.admin.admin')

@section('contents')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3 text-end">
                <a href="{{ route('admin.product') }}">Back</a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3">
                        <img id="preview" src="{{ url('/assets/uploadyourown.png') }}" alt="" class="w-100">
                    </div>
                    <div class="col-md-9">
                        <form id="form-submit" method="POST" action="{{ route('admin.product.store') }}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                       id="name" name="name" placeholder="Enter product name" required>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="price">Price</label>
                                <input type="number" class="form-control @error('price') is-invalid @enderror"
                                       id="price" name="price" placeholder="Enter product price" required>
                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="desc">Description</label>
                                <input type="text" class="form-control @error('desc') is-invalid @enderror"
                                       id="desc" name="desc" placeholder="Enter product description" required>
                                @error('desc')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="category">Category</label>
                                <select class="form-control @error('category') is-invalid @enderror" id="category"
                                        name="category" required>
                                    <option value="pizza">Pizza</option>
                                    <option value="side">Side</option>
                                    <option value="dessert">Dessert</option>
                                    <option value="drink">Drink</option>
                                </select>
                                @error('category')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div id="additional-pizza">
                                <div class="form-group">
                                    <label for="pizza-variant">Variant</label>
                                    <select
                                        class="form-control @error('additionalProperties[variant]') is-invalid @enderror"
                                        id="pizza-variant" name="additionalProperties[variant]"
                                        required>
                                        <option value="flavors of the world">
                                            Flavors Of The World
                                        </option>
                                        <option value="supper topping">
                                            Supper Topping
                                        </option>
                                        <option value="seafood cravers">
                                            Seafood Cravers
                                        </option>
                                        <option value="traditional & meatlovers">
                                            Traditional & Meatlovers
                                        </option>
                                        <option value="kid favors">
                                            Kid Favors
                                        </option>
                                    </select>
                                    @error('additionalProperties[variant]')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="pizza-topping">Topping</label>
                                    <select
                                        class="form-control @error('additionalProperties[topping]') is-invalid @enderror"
                                        id="pizza-topping" name="additionalProperties[topping]"
                                        required>
                                        <option value="Seafood">
                                            Seafood
                                        </option>
                                        <option value="Beef">
                                            Beef
                                        </option>
                                        <option value="Chicken">
                                            Chicken
                                        </option>
                                        <option value="Pork">
                                            Pork
                                        </option>
                                        <option value="Vegetarian">
                                            Vegetarian
                                        </option>
                                    </select>
                                    @error('additionalProperties[topping]')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div id="additional-side" style="display: none">
                                <div class="form-group">
                                    <label for="side-variant">Variant</label>
                                    <select
                                        class="form-control @error('additionalProperties[variant]') is-invalid @enderror"
                                        id="side-variant"
                                        required>
                                        <option value="Potato">
                                            Potato
                                        </option>
                                        <option value="Chicken">
                                            Chicken
                                        </option>
                                        <option value="Spaghetti">
                                            Spaghetti
                                        </option>
                                        <option value="Sausage">
                                            Sausage
                                        </option>
                                        <option value="Bread">
                                            Bread
                                        </option>
                                    </select>
                                    @error('additionalProperties[variant]')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="side-topping">Topping</label>
                                    <select
                                        class="form-control @error('additionalProperties[topping]') is-invalid @enderror"
                                        id="side-topping"
                                        required>
                                        <option value="Seafood">
                                            Seafood
                                        </option>
                                        <option value="Beef">
                                            Beef
                                        </option>
                                        <option value="Chicken">
                                            Chicken
                                        </option>
                                        <option value="Pork">
                                            Pork
                                        </option>
                                        <option value="Vegetarian">
                                            Vegetarian
                                        </option>
                                    </select>
                                    @error('additionalProperties[topping]')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="image">Product Image</label>
                                <input type="file" class="form-control-file @error('imgURL') is-invalid @enderror"
                                       id="image" name="imgURL" accept="image/png, image/jpeg, image/jpg" required>
                                @error('imgURL')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div>
                                <button type="submit" class="btn btn-success">Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custome-scripts')
    <script>
        $('#category').change(function () {
            const selectedValue = $(this).val();

            if (selectedValue === 'pizza') {
                $('#additional-side').hide();
                $('#additional-pizza').show();

                $('#side-variant, #side-topping').removeAttr('name');

                $('#pizza-variant').attr('name', 'additionalProperties[variant]');
                $('#pizza-topping').attr('name', 'additionalProperties[topping]');
            } else if (selectedValue === 'side') {
                $('#additional-pizza').hide();
                $('#additional-side').show();

                $('#pizza-variant, #pizza-topping').removeAttr('name');

                $('#side-variant').attr('name', 'additionalProperties[variant]');
                $('#side-topping').attr('name', 'additionalProperties[topping]');
            } else {
                $('#additional-pizza').hide();
                $('#additional-side').hide();
            }
        });

        $('#image').change(function (event) {
            const input = event.target;

            if (input.files && input.files[0]) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    document.getElementById('preview').src = e.target.result;
                };

                reader.readAsDataURL(input.files[0]);
            }
        });
    </script>
@endsection
