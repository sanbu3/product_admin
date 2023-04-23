@extends('layouts.app_new')
@section('content')

    @vite('resources/css/cart.css')
    @vite('resources/css/buy.css')
    <div class="container">
        <div class="cart-header">
            <h1 class="cart-header__title"><i class="fas fa-shopping-cart"></i> 购物车</h1>
            <span class="cart-header__item-count" id="cartItemCount">1</span>
        </div>

        <table class="cart-table">
            <thead>
            <tr>
                <th>商品</th>
                <th>单价</th>
                <th>数量</th>
                <th>小计</th>
                <th>操作</th>
            </tr>
            </thead>
            <tbody id="cartItemContainer">
            <tr>
                <td class="cart-table__item"><img src="product.jpg" alt=""></td>
                <td class="cart-table__price">¥99.90</td>
                <td class="cart-table__quantity">
                    <div class="quantity">
                        <button class="quantity__decrease">
                            <box-icon name='minus' type='solid' color='#000'></box-icon>
                        </button>
                        <input class="quantity__input" value="1">
                        <button class="quantity__increase">
                            <box-icon name='plus' type='solid' color='#000'></box-icon>
                        </button>
                    </div>
                </td>
                <td class="cart-table__subtotal">¥99.90</td>
                <td class="cart-table__remove">
                    <button>删除</button>
                </td>
            </tr>
            </tbody>
        </table>

        <div class="cart-checkout">
            <div class="cart-coupon">
                <input type="text" class="cart-coupon__code" placeholder="输入优惠码">
            </div>
            <div class="cart-total">
                <p>商品总计 <span id="cartTotal">¥99.90</span></p>
                <p>优惠 <span id="cartDiscount">- ¥0.00</span></p>
                <p class="cart-total__price">应付总额 <span id="cartPayable">¥99.90</span></p>
            </div>
        </div>

        <button class="cart-checkout__btn">去结算</button>

        <div class="cart-empty">
            <i class="fas fa-shopping-cart fa-3x cart-empty__icon"></i>
            <p class="cart-empty__title">购物车是空的!</p>
            <p class="cart-empty__desc">快去选购一些商品吧~</p>
            <a href="{{ route('products.index') }}"
               class="cart-empty__link">
                去选购
            </a>
        </div>
    </div>
    <script>
        let domObj = {
            products: document.querySelector('#cartItemContainer'),//商品&表格
            price: document.querySelector('.cart-table__price'),//单价
            subtotal: document.querySelector('.cart-table__subtotal'),//小计
            quantity: document.querySelector('.quantity__input'),//数量
            cartTotal: document.querySelector('#cartTotal'),//商品总计
            cartDiscount: document.querySelector('#cartDiscount'),//优惠
            cartPayable: document.querySelector('#cartPayable'),//应付总额
            cartItemCount: document.querySelector('#cartItemCount'),//商品数量
            cartEmpty: document.querySelector('.cart-empty'),//购物车为空
            cartCheckout: document.querySelector('.cart-checkout'),//结算
            cartCheckoutBtn: document.querySelector('.cart-checkout__btn'),//结算按钮
            cartTable: document.querySelector('.cart-table'),//表格
            delProduct: document.querySelector('.cart-table__remove button'),//删除商品

            //设置购物车状态
            setCartStatus: function () {
                console.log(domObj.cartEmpty ,'cartEmpty')
                if (this.cartItemCount.innerText === '0') {
                    this.cartEmpty.classList.remove('d-none')
                    this.cartCheckout.classList.add('d-none')
                    this.cartTable.classList.add('d-none')
                } else {
                    this.cartEmpty.classList.add('d-none')
                    this.cartCheckout.classList.remove('d-none')
                    this.cartTable.classList.remove('d-none')
                }
            },
            //del

            delProduct: function () {
                this.delProduct.addEventListener('click', function () {
                    this.products.removeChild(this.products.childNodes[0])
                    this.cartItemCount.innerText = this.products.childNodes.length
                    this.setCartStatus()
                }.bind(this))
            },
        }

        //判断购物车是否为空
        domObj.setCartStatus()
        //删除商品
        domObj.delProduct()

    </script>

    <div class="checkout-page animate__animated d-none">
        <div class="container">
            <div class="checkout-header">
                <h2>结算页面</h2>
                <button class="close-checkout">&times;</button>
            </div>

            <div class="checkout-content" id="scroll-content">
                <div class="checkout-form">
                    <div class="form-group">
                        <label for="name">收货人:</label>
                        <input type="text" id="name" placeholder="请输入名字">
                    </div>
                    <div class="form-group">
                        <label for="tel">联系电话:</label>
                        <input type="tel" id="tel" placeholder="请输入联系方式">
                    </div>

                    <div class="form-group address">
                        <label for="province">所在省份:</label>
                        <select name="province" id="province">
                            <option value="">请选择</option>
                            <option value="zj">浙江省</option>
                            <option value="sh">上海市</option>
                        </select>
                    </div>
                    <div class="form-group address">
                        <label for="city">所在城市:</label>
                        <select name="city" id="city">
                            <option value="">请选择</option>
                        </select>
                    </div>
                    <div class="form-group address">
                        <label for="district">所在区县:</label>
                        <select name="district" id="district">
                            <option value="">请选择</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="checkout-total">
                <p>商品总计 <span id="cartTotal"></span></p>
                <p>运费 <span id="shippingFee"></span></p>
                <p class="total">应付总额 <span id="payableTotal"></span></p>
            </div>

            <button class="place-order">提交订单</button>
        </div>
        <script>
            //自动执行
            window.onload = function () {
                // 获取元素
                const clearingForm = document.querySelector('.cart-checkout__btn')
                const closeBtn = document.querySelector('.close-checkout')
                const placeOrder = document.querySelector('.place-order')
                const mask = document.createElement('div')
                const checkoutPage = document.querySelector('.checkout-page')


                /*    /!* 打开状态 - 向上滑动 *!/
                    .checkout-page.open {
                    display: flex;
                    animation: slideIn 0.5s ease-in-out;
                }

                /!* 关闭状态 - 向下滑动 *!/
                    .checkout-page.close {
                    animation: slideOut 0.5s ease-in-out;
                }*/

                // 打开结算页
                function openCheckout() {
                    checkoutPage.classList.remove('d-none')
                    checkoutPage.style.display = 'flex'
                    //从下往上滑动
                    checkoutPage.classList.add('animate__fadeInUp') // 添加animate.css动画类
                }

                // 关闭结算页
                function closeCheckout() {
                    checkoutPage.classList.add('animate__fadeOutDown') // 添加animate.css动画类
                    setTimeout(() => {
                        checkoutPage.classList.add('d-none')
                        checkoutPage.classList.remove('animate__fadeInUp', 'animate__fadeOutDown')
                    }, 500)
                }

                // 点击去结算,打开结算页
                clearingForm.addEventListener('click', openCheckout)

                // 点击关闭按钮,关闭结算页
                closeBtn.addEventListener('click', closeCheckout)

                //esc键关闭结算页
                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape') {
                        closeCheckout()
                    }
                })

                // 点击提交订单,提示订单已提交
                placeOrder.addEventListener('click', () => {
                    alert('订单已提交!')
                    closeCheckout()
                })

                /*// mask遮罩层
                mask.classList.add('mask')
                document.body.appendChild(mask)
                mask.addEventListener('click', closeCheckout)*/
            }

        </script>
    </div>

@endsection
