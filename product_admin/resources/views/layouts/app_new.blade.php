<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    {{--bootstrap5css&js,boxiconjs&css,jquery--}}
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/5.0.2/css/bootstrap.min.css"/>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.staticfile.org/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    {{--axios--}}
    <script src="https://cdn.bootcss.com/axios/0.19.0-beta.1/axios.min.js"></script>
    <title>
        @yield('title', 'Laravel')
    </title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;700&display=swap');

        {{--        谷歌字体--}}
        body {
            font-family: 'Poppins', sans-serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            user-select: none;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            padding: 10px;
            /*background-color: #fff;*/
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            /*首字母大写*/
            text-transform: capitalize;
            user-select: none;
        }

        .header-left {
            width: 60%;
            display: flex;
            align-items: center;
            justify-content: start;
        }

        .logo {
            flex: 0.4;
            display: flex;
            align-items: center;
            font-weight: 600;
            font-size: 20px;
            color: #333;
        }

        .logo box-icon {
            margin-right: 10px;
        }

        .search-box {
            flex: 2;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-left: 20px;
            /*border: none; !* 去掉原有的边框 *!*/
            border-radius: 30px; /* 调整搜索框的圆角 */
            /*background-color: #f5f5f5;*/
            border: 1px solid #ddd; /* 添加边框 */
            overflow: hidden; /* 防止溢出 */
            padding: 2px;
            height: 34px;
        }

        .search-box-left {
            display: flex;
            align-items: center;
            padding: 10px;
            /*background-color: #f5f5f5;*/
            border-radius: 4px 0 0 4px;
            border-right: none; /* 去掉左边框 */
            width: 100%; /* 调整searchbox左边区域的宽度 */
        }

        .search-box-left {
            display: flex;
            align-items: center;
            padding: 10px;
            /*border-right: 1px solid #ddd; !* 添加边框 *!*/
            width: 100%;
            border-radius: inherit;
            /*border-radius: 30px;*/
        }

        .search-box-left select {
            margin-right: 10px;
            border: none;
            outline: none;
            background-color: transparent;
            font-size: 14px;
            color: #ccc;
        }

        .search-box-left input {
            border: none;
            border-left: 1px solid #ddd; /* 添加边框 */
            padding-left: 10px;
            outline: none;
            background-color: transparent;
            font-size: 14px;
            color: #333;
            width: 100%;
        }

        .search-box-left input::placeholder {
            font-size: 10px;
            color: #999;
        }

        .search-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 5px 10px; /* 调整按钮的内边距 */
            background-color: #ea732e;
            /*文字缩小*/
            font-size: 12px;
            color: #fff;
            border: none;
            border-radius: inherit; /* 调整按钮的圆角 */
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-btn:hover {
            background-color: #d15c1f;
        }

        .search-btn box-icon {
            margin-right: 5px;
        }

        .header-right {
            display: flex;
            align-items: center;
        }

        .header-right box-icon {
            margin-right: 10px;
            font-size: 20px;
        }

        .header-right select {
            margin-right: 20px;
            border: none;
            outline: none;
            background-color: transparent;
            font-size: 14px;
            color: #666;
        }

        .cart,
        .message,
        .user,
        .login,
        .logout,
        .register {
            display: flex;
            align-items: center;
            margin-right: 10px;
            font-size: 14px;
            color: #666;
            cursor: pointer;
        }

        .cart box-icon,
        .message box-icon,
        .user box-icon,
        .login box-icon,
        .register box-icon {
            margin-right: 5px;
        }

        .user-center img {
            width: 35px;
            height: auto;
            border-radius: 50%;
            margin-right: 10px;
            border: 2px solid #ddd;
        }

        /*products-index*/
        .grid-container {
            background-color: #f6f6f6;
            display: grid;
            min-height: 100vh;
            /*分成两列*/
            grid-template-columns: 25% 75%;
            grid-template-areas: 'filter products';
        }

        .filter {
            grid-area: filter;
            background-color: #fff;
            border: 1px solid #ddd;
            margin: 20px;
            border-radius: 5px;
        }

        .filter {
            padding: 20px;
            border: 1px solid #ccc;
        }

        .filter-title {
            margin-bottom: 20px;
            font-size: 25px;
            font-weight: 500;
        }

        .filter-title span {
            font-size: 16px;
            font-weight: 700;
        }

        .supplier-type-item,
        .condition-item,
        .range-of-price-item {
            margin-bottom: 20px;
        }


        /* Set the font-weight of category text to bold */
        .filter .supplier-type span,
        .filter .condition span,
        .filter .range-of-price span {
            font-size: 14px;
            font-weight: bold;
        }

        /* Set the font-size of label text to smaller and color to #ddd */
        .filter label {
            font-size: smaller;
            color: #919191;
            font-weight: 500;
        }

        /* Add spacing between category and label */
        .filter .supplier-type span,
        .filter .condition span,
        .filter .range-of-price span {
            margin-bottom: 2px;
        }

        /* 定制range滑块 */
        /* 拉过的颜色为橙色 */
        /* 未拉过的颜色为灰色 */
        /* 滑块有白色边框 */
        input[type="range"] {
            -webkit-appearance: none;
            width: 100%;
            height: 8px;
            background-color: #ddd;
            border-radius: 4px;
            outline: none;
        }

        /* 用于Webkit浏览器 */
        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            width: 20px;
            height: 20px;
            background-color: #FFA500;
            border: 2px solid #fff;
            border-radius: 50%;
            margin-top: -6px;
        }

        input[type="range"]::-webkit-slider-runnable-track {
            height: 8px;
            background-color: #ddd;
            border-radius: 4px;
        }

        input[type="range"]::-webkit-progress-value {
            background-color: #FFA500;
            border-radius: 4px;
        }

        /* 用于Mozilla Firefox浏览器 */
        input[type="range"]::-moz-range-thumb {
            width: 20px;
            height: 20px;
            background-color: #FFA500;
            border: 2px solid #fff;
            border-radius: 50%;
            margin-top: -6px;
        }

        input[type="range"]::-moz-range-track {
            height: 8px;
            background-color: #ddd;
            border-radius: 4px;
        }

        input[type="range"]::-moz-range-progress {
            background-color: #FFA500;
            border-radius: 4px;
        }

        /* 用于IE浏览器 */
        input[type="range"]::-ms-thumb {
            width: 20px;
            height: 20px;
            background-color: #FFA500;
            border: 2px solid #fff;
            border-radius: 50%;
            margin-top: -6px;
        }

        input[type="range"]::-ms-track {
            height: 8px;
            background-color: #ddd;
            border-radius: 4px;
        }

        input[type="range"]::-ms-fill-lower,
        input[type="range"]::-ms-fill-upper {
            background-color: #FFA500;
            border-radius: 4px;
        }

        .range-of-price-item .range-box {
            display: flex;
            /*    垂直*/
            flex-direction: column;
            /*    水平*/
            /*    flex-direction: row;*/
        }

        .range-of-price-item .range-box .min-max {
            margin-top: 10px;
            display: flex;
            justify-content: space-between;
        }

        .input-of-price {
            margin-top: 10px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            justify-content: space-between;
        }


        .input-price-item {
            margin: 0 auto;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: row;
            width: 100%;
            /* background: #f5f5f5; */
            border-radius: 5px;
            border: 1px solid #e5e5e5;
        }

        .input-price-item .money-symbol {
            font-size: 20px;
            color: #000;
            font-weight: 500;
            margin-right: 5px;
            /* border: 1px solid #e5e5e5; */
            background-color: #f5f5f5;
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px;
            padding: 2px 15px;
        }

        .input-price-item input {
            width: 100%;
            height: 100%;
            border: none;
            outline: none;
            background: transparent;
            font-size: 15px;
            font-weight: 500;
            color: #000;
            padding: 0 5px;
        }

        .input-price-item input::placeholder {
            /* color: #000; */
            font-weight: 500;
            font-size: 14px;
        }

        .under-price input {
            width: 100%;
            height: 100%;
            border: 1px solid #e5e5e5;
            outline: none;
            border-radius: 5px;
            padding: 5px 10px;
        }

        .under-price:nth-last-child(1) input {
            border-bottom-right-radius: 10px;
        }

        .under-price input::placeholder {
            font-weight: 500;
            font-size: 14px;
        }


        .products {
            grid-area: products;
            margin: 20px;
            border-radius: 5px;
            display: grid;
            /*分3行，前两行等高，最后一行用来显示商品，占比较多*/
            grid-template-rows: 0.1fr 0.1fr 3fr;
            grid-template-areas: 'search-result' 'category' 'products';
        }

        .search-result {
            grid-area: search-result;
            padding: 10px;
            font-weight: 500;
            /*font-weight: 500;*/
        }

        .category {
            grid-area: category;
            padding: 10px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .category-item {
            /*margin: 5px;*/
            padding: 5px 10px;
            border: 1px solid #ddd;
            border-radius: 30px;
            /*垂直居中*/
            display: flex;
            gap: 10px;
            /*两端对齐*/
            justify-content: space-between;
            align-items: center;
            font-size: 10px;
        }

        .category-item a {
            text-decoration: none;
            color: #000;
        }

        @media (max-width: 768px) {
            .products-item-wrapper {
                padding: 10px;
                display: flex;
                flex-wrap: wrap;
            }

            /*    小屏不显示filter*/
            .filter {
                display: none;
            }
        }

        /* 在较大的屏幕上，以网格的形式展示商品 */
        @media (min-width: 769px) {
            .products-item-wrapper {
                padding: 10px;
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                grid-gap: 10px;
            }
        }

        /*    商品card*/
        .product-item {
            display: flex;
            flex-direction: column;
            /* justify-content: space-between; */
            /* align-items: center; */
            /*padding-bottom: 10px;*/
            /*width: 100%;*/
            border-radius: 5px;
            box-shadow: 0 0 5px #ccc;
            overflow: hidden;
            /* padding: 10px; */
            width: 200px;
            height: 263px;
        }

        .product-item img {
            width: 100%;
            height: 150px;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .product-item .price {
            padding: 0 10px;
            font-size: 16px;
            font-weight: 600;
            color: #f24b4b;
            /* margin-bottom: 5px; */
        }

        .product-item .description {
            padding: 0 10px;
            font-size: 12px;
            font-weight: 300;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical; /* 设置元素为垂直方向排列 */
            text-overflow: ellipsis;
        }

        .product-item .sold {
            padding: 0 10px;
            /*font-size: 14px;*/
            color: #666;
            font-size: 10px;
            margin-top: 5px;
            display: flex;
            flex-direction: row;
            gap: 10px;
            /* justify-content: space-around; */
            align-items: center;
        }

        .product-item .sold .star {
            padding: 2px 10px;
            border-radius: 15px;
            background-color: #f5c242;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5px;
        }

        .product-item .sold .buy {
            /*    自己贴右 */
            margin-left: auto; /*自己贴右*/
        }

        .product-item .sold .buy {
            padding: 3px 8px;
            border: none;
            border-radius: 15px;
            background-color: #f24b4b;
            color: white;
            font-size: 12px;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .product-item .sold .buy:hover {
            background-color: #f24b4b;
            color: white;
        }
    </style>
</head>

<body>
<div class="header">
    <!-- 两个大盒子header-left、header-right，header-left里面放logo、搜索框（div包含左边选框、搜索框、搜索按钮，
      header-right里面放下拉中英文、购物车、消息、登录、注册最后是|隔开在放用户头像，这里间隔开一点，用flex布局 -->
    <div class="header-left">
        <div class="logo">
            <box-icon type='logo' name='graphql' color="#ea732e" size="45px"></box-icon>
            <span>Sanbu</span>
        </div>
        <div class="search-box">
            <div class="search-box-left">
                <select name="city" id="select-city">
                    <option value="">
                        <box-icon name='location-plus' color="#bcbcbc" title="Location icon failed to load."></box-icon>
                        <span>全国</span>
                    </option>
                    <option value="1">
                        <span>北京</span>
                    </option>
                    <option value="2">
                        <span>成都</span>
                    </option>
                </select>

                <input
                    type="text"
                    placeholder="iPhone 12 Pro Max 512GB 金色"
                    class="search-input"
                    id="search-input"
                    autocomplete="off"
                />
            </div>
            <button class="search-btn" id="search-btn">
                <box-icon name='search' color="white" size="20px"></box-icon>
                Search
            </button>
        </div>
    </div>
    <div class="header-right">
        @auth
            <box-icon name='globe' color="#ddd"></box-icon>
            <select name="" id="">
                <option value=""
                        selected="selected"
                >
                    <span>CH</span>
                </option>
                <option value="">
                    <span>EN</span>
                </option>
                <option value="">
                    <span>JP</span>
                </option>
            </select>
            <div class="cart">
                <box-icon name='cart' color="#bcbcbc"></box-icon>
                {{--            <span>购物车</span>--}}
            </div>
            <div class="message">
                <box-icon name='bell'
                          color="#bcbcbc"
                          animation="tada-hover"
                ></box-icon>
                {{--            <span>通知</span>--}}
            </div>
            <div class="message">
                <box-icon name='envelope' color="#bcbcbc"></box-icon>
                {{--            <span>消息</span>--}}
            </div>
            <span style="color: #eaedf1">
                &nbsp;|&nbsp;&nbsp;
            </span>
            <div class="user-center">

            </div>
            <script>
                fetch('https://randomuser.me/api/?results=10&inc=name,email,picture')
                    .then(response => response.json())
                    .then(data => {
                        const users = data.results;
                        users.forEach(user => {
                            const name = `${user.name.first} ${user.name.last}`;
                            const email = user.email;
                            const picture = user.picture.medium;
                            // 处理用户数据
                            const userCenter = document.querySelector('.user-center');
                            userCenter.innerHTML = `
                            <div class="user-center">
                                <img src="${picture}" alt="${name}">
                            </div>
                        `
                        });
                    });
            </script>
        @endauth
        @guest
            <div class="login"
                 onclick="window.location.href='{{ route('login') }}'"
            >
                <box-icon name='user' color="#bcbcbc"></box-icon>
                {{--            <span>登录</span>--}}
            </div>
            <div class="register"
                 onclick="window.location.href='{{ route('register') }}'"
            >
                <box-icon name='user-plus' color="#bcbcbc" size="30px"></box-icon>
                {{--            <span>注册</span>--}}
            </div>
        @endguest
    </div>
    <script>
        const searchBtn = document.querySelector('#search-btn');
        const searchInput = document.querySelector('#search-input');
        searchBtn.addEventListener('click', () => {
            const searchValue = searchInput.value;
            axios.get(`products/search/${searchValue}`)
                .then(res => {
                    const products = res.data
                    renderResults(products)
                })
        });// 搜索按钮点击事件,逻辑：点击搜索按钮，获取搜索框的值，如果有值，就跳转到商品列表页，把搜索框的值传递过去

        function renderResults(products) {
            let childView = document.getElementById('products')
            childView.dataset.products = JSON.stringify(products)   // 把数据存到子视图的data-products属性上
        }
    </script>
</div>
<main style="min-height: 100vh;">
    @yield('content')
</main>
</body>
</html>
