@extends('layouts.app_new')
@vite('resources/js/renderProducts.js')
@vite('resources/js/products/gotoItem.js')
@vite('resources/css/products.index.css')
@section('content')
    <div class="grid-container">
        <div class="filter">
            <div class="filter-title">
                <span>Filter</span>
            </div>
            <div class="supplier-type">
                <span>Supplier Type</span>
                <div class="supplier-type-item">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="supplier-type-1" name="supplier-type-1"
                               value="1" id="supplier-type-1"
                        >
                        <label class="form-check-label" for="supplier-type-1">Supplier Type 1</label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="supplier-type-2" name="supplier-type-2"
                               value="2" id="supplier-type-2"
                        >
                        <label class="form-check-label" for="supplier-type-2">Supplier Type 2</label>
                    </div>
                </div>
            </div>
            <div class="condition">
                <span>Condition</span>
                <div class="condition-item">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="condition-1" name="condition-1" value="1">
                        <label class="form-check-label" for="condition-1">New stuff</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="condition-2" name="condition-2" value="2">
                        <label class="form-check-label" for="condition-2">Second hand</label>
                    </div>
                </div>
            </div>
            <div class="range-of-price">
                <span>Price Range</span>
                <div class="range-of-price-item">
                    <div class="range-box">
                        <input class="" type="range" id="price" name="price" min="0" max="1000" value="500">
                        <div class="min-max">
                            <span>0</span>
                            <span id="price-value">$500</span>
                            <span>1000</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="input-of-price">
                <div class="input-price-item">
                    <div class="money-symbol">$</div>
                    <input type="text" placeholder="Min" id="min-price"/>
                </div>
                <div class="input-price-item">
                    <div class="money-symbol">$</div>
                    <input type="text" placeholder="Max" id="max-price"/>
                </div>
                {{--                under$500--}}
                <div class="under-price">
                    <input type="text" placeholder="Under $500" id="under-price-0">
                </div>
                <div class="under-price">
                    <input type="text" placeholder="$500~$1000" id="under-price-1">
                </div>
                <div class="under-price">
                    <input type="text" placeholder="$1000~$1500" id="under-price-2">
                </div>
            </div>
        </div>

        <script>
            let priceInput = document.getElementById("price");
            let priceValue = document.getElementById("price-value");

            // Update price value when the range input is changed
            priceInput.addEventListener("input", function () {
                priceValue.innerHTML = "$" + this.value;
            });
        </script>

        <div class="products" id="products" data-products="">
            <div class="search-result d-none"
                 id="search-result"
            >
            </div>
            <div class="category d-none"
                 id="category" data-category=""
            >
            </div>
            <div class="products-item-wrapper">
                @foreach($products as $product)
                    <div class="product-item" onclick="gotoItem({{$product->id}})">
                        <img src="{{ $product->image }}" alt="Product Image"/>
                        <div class="price">${{ $product->price }}</div>
                        <div class="description">
                            {{ $product->description }}
                        </div>
                        <div class="sold">
                            <div class="star">
                                <box-icon type='solid' name='star' color="white" size="20px"></box-icon>
                                5.0
                            </div>
                            |
                            <span>100 sold</span>
                            <div class="buy">
                                <box-icon name='cake' type='solid' color="white" size="20px"></box-icon>
                            </div>
                        </div>
                    </div>
                @endforeach
                <script>
                    function gotoItem(id) {
                        //Route::get('/products/item/{id}', [App\Http\Controllers\ProductController::class, 'item'])->name('products.item');
                        window.location.href = `/products/item/${id}`
                    }
                </script>
            </div>
        </div>
    </div>
@endsection
