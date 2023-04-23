@extends('layouts.app_new')
@section('content')
    @vite('resources/css/home.index.css')
    @vite('resources/css/products/item.css')
    @vite('resources/js/products/item.js')
    <div class="container">
        <div class="col1">
            <div class="col1__image">
                <img src="https://cdn.cnbj0.fds.api.mi-img.com/b2c-shopapi-pms/pms_1624974787.1548325.jpg" alt="Product Image" class="col1__image-main">
            </div>
            <div class="col1__thumbnails">
                <img style="border-radius: 4px" src="https://cdn.cnbj0.fds.api.mi-img.com/b2c-shopapi-pms/pms_1624974787.1548325.jpg" alt="Thumbnail 1" class="col1__thumbnails-item">
                <img style="border-radius: 4px" src="https://cdn.cnbj0.fds.api.mi-img.com/b2c-shopapi-pms/pms_1624974787.15598713.jpg" alt="Thumbnail 2" class="col1__thumbnails-item">
                <img style="border-radius: 4px" src="https://source.unsplash.com/random/" alt="Thumbnail 3" class="col1__thumbnails-item">
            </div>
        </div>
        <div class="col2">
            <h2 class="col2__title">
                {{ $product->name }}
            </h2>
            <div class="col2__star-description">
                <div class="col2__description">
                    <div class="sold">
                        <div class="star">
                            <box-icon type='solid' name='star' color="white" size="20px"></box-icon>
                            5.0
                        </div>
                        |
                        <span>100 sold</span>
                    </div>
                    {{ $product->particular }}
                </div>
                <div class="col2__processor">
            <span style="font-weight: 500">
                Memory Size
            </span>
                    <div class="col2__processor-item">
                <span class="col2__processor-item-label">
                16GB
            </span>
                        <span class="col2__processor-item-label">
                32GB
            </span>
                    </div>
                </div>
                <script>
                    const processorItem = document.querySelectorAll('.col2__processor-item-label');
                    processorItem.forEach(item => {
                        item.addEventListener('click', () => {
                            processorItem.forEach(item => {
                                item.classList.remove('active');
                            });
                            item.classList.add('active');
                        });
                    });
                </script>
            </div>
            <div class="col2__notes">
                <span class="col2__notes-title">About This Item</span>
                <div class="col2__notes-dropdown">
                    <div class="col2__notes-item">
                        <input type="checkbox" id="refund">
                        <label for="refund">
                            为了确保您的购物体验愉快，请在购买商品前务必仔细阅读商品详情中的描述和注意事项。如果您对商品有任何疑问，请在购买前及时咨询商家，以免产生不必要的麻烦和损失。
                        </label>
                    </div>
                    <div class="col2__notes-item">
                        <input type="checkbox" id="delivery">
                        <label for="delivery">
                            我们承诺为您提供快速可靠的配送服务。我们会及时更新您的订单状态，并为您提供物流追踪信息，以便您随时了解商品的配送情况。如果您有任何关于物流方面的问题，请随时联系我们的客服。
                        </label>
                    </div>
                    <div class="col2__notes-item">
                        <input type="checkbox" id="warranty">
                        <label for="warranty">
                            除非商品存在质量问题，否则我们不接受退换货。如果您收到的商品存在质量问题，请在收到商品后的24小时内联系我们的客服，我们将为您提供退货或换货服务。请注意，商品必须保持原样，未开封、未使用、未损坏。
                        </label>
                    </div>
                </div>
            </div>
            <script>
                const notesTitle = document.querySelector('.col2__notes-title');
                const notesDropdown = document.querySelector('.col2__notes-dropdown');

                // 默认展开
                notesDropdown.classList.add('show');

                notesTitle.addEventListener('click', function() {
                    notesDropdown.classList.toggle('show');
                });

                notesTitle.addEventListener('keydown', function(event) {
                    if (event.keyCode === 13) {
                        notesDropdown.classList.toggle('show');
                    }
                });
            </script>
        </div>
        <div class="col3">
            <div class="col3__card-title">
                To Buy
            </div>
            <div class="col3__card">
                <div class="select-container">
                    <span class="select-label">location</span>
                    <div class="select-box">
                        <box-icon name='location-plus' type='solid' color='#ccc'></box-icon>
                        <input type="text" class="select-input" placeholder="Select location">
                        <box-icon name='chevron-down' type='solid' color='#ccc'></box-icon>
                        <ul class="dropdown-list">
                        </ul>
                    </div>
                </div>
                <div class="box2-container">
                    <span style="font-weight: 500">Quantity</span>
                    <div class="box2">
                        <span>-</span>
                        <input type="text" placeholder="1" value="1">
                        <span>+</span>
                    </div>
                    <script>
                        const quantityInput = document.querySelector('.box2 input');
                        const minusButton = document.querySelector('.box2 span:first-of-type');
                        const plusButton = document.querySelector('.box2 span:last-of-type');

                        function updateQuantity(delta) {    // 更新数量
                            const currentValue = parseInt(quantityInput.value);
                            const newValue = currentValue + delta;

                            if (newValue >= 1) {    // 限制最小值为 1
                                quantityInput.value = newValue;
                                updatePrice();
                            }
                            //限制最大值为 10
                            if (newValue >= 10) {
                                quantityInput.value = 10;
                                updatePrice();
                            }
                        }

                        minusButton.addEventListener('click', () => updateQuantity(-1));
                        plusButton.addEventListener('click', () => updateQuantity(1));

                        quantityInput.addEventListener('input', () => { // 当用户手动输入数量时
                            const newValue = parseInt(quantityInput.value);

                            if (newValue >= 1) {
                                updatePrice();
                            } else {
                                quantityInput.value = 1;
                            }
                        });

                        // 初始化数量和价格
                        updatePrice();
                    </script>
                </div>
                <div class="price-message-box">
                    <div>
                        Price: <span style="color: #FF4D4F; font-weight: 500">￥{{ $product->price }}</span>
                    </div>
                    {{--虚线分割线--}}
                    <div style="border-bottom: 3px dashed #ccc; margin: 10px 0"></div>
                    <div>{{--这里是运费--}}
                        Shipping: <span style="color: #FF4D4F; font-weight: 500">￥0.00</span>
                    </div>
                    <script>
                        const priceMessageBox = document.querySelector('.price-message-box');
                        const priceMessage = priceMessageBox.querySelectorAll('div');

                        function updatePrice() {
                            const quantity = parseInt(quantityInput.value);
                            const price = parseFloat('{{ $product->price }}');
                            const shipping = parseFloat('0.00');

                            priceMessage[0].innerHTML = `Price: <span style="color: #FF4D4F; font-weight: 500">￥${(price * quantity).toFixed(2)}</span>`;
                            priceMessage[2].innerHTML = `Shipping: <span style="color: #FF4D4F; font-weight: 500">￥${(shipping * quantity).toFixed(2)}</span>`;
                        }//toFixed() 方法可把 Number 四舍五入为指定小数位数的数字。
                    </script>
                </div>
                <div class="col3__card-buttons">
                    <button class="col3__card-button" id="add-to-cart">
                        <box-icon name='cart-add' type='solid' color="#fff"></box-icon>
                        Add to cart
                    </button>
                    <button class="col3__card-button" id="buy-now">
                        <box-icon name='credit-card-front' type='solid' color='#ea732e'></box-icon>
                        Buy now
                    </button>
                </div>
                <div class="col3__card-contact">
                    <div class="wt-box" style="color: deepskyblue">
                        <box-icon type='logo' name='twitter' color="deepskyblue"></box-icon>
                        Twitter
                    </div>
                    |
                    <div class="wt-box" style="color: skyblue">
                        <box-icon type='logo' name='facebook' color="skyblue"></box-icon>
                        Facebook
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
