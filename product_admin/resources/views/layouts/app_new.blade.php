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
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@4.1.1/animate.min.css">
    {{--axios--}}
    <script src="https://cdn.bootcss.com/axios/0.19.0-beta.1/axios.min.js"></script>
    <title>
        @yield('title', 'Laravel')
    </title>
{{--vite--}}
    @vite('resources/css/home.index.css')
</head>

<body>
<div class="header">
    <!-- 两个大盒子header-left、header-right，header-left里面放logo、搜索框（div包含左边选框、搜索框、搜索按钮，
      header-right里面放下拉中英文、购物车、消息、登录、注册最后是|隔开在放用户头像，这里间隔开一点，用flex布局 -->
    <div class="header-left">
        <a class="logo" href="{{ route('home.index') }}">
                <box-icon type='logo' name='graphql' color="#ea732e" size="45px"></box-icon>
                <span>Sanbu</span>
        </a>
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
                    CH
                </option>
                <option value="">
                    EN
                </option>
                <option value="">
                    JP
                </option>
            </select>
            <div class="cart">
                <box-icon name='cart' color="#bcbcbc"></box-icon>
                <span class="badge rounded-pill bg-warning text-light">1</span>
                {{--            <span>购物车</span>--}}
            </div>
            <script>
                //cart
                const cart = document.querySelector('.cart');
                cart.addEventListener('click', function () {
                    window.location.href = '{{ route('cart') }}';
                })
            </script>
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
            @vite('resources/js/render.js')
    </div>
</div>
<main style="min-height: 100vh;">
    @yield('content')
</main>
</body>
</html>
