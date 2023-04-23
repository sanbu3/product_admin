<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>
        @hasSection('title')
            @yield('title') - {{ config('app.name') }}
        @else
            {{ config('app.name') }}
        @endif
    </title>
    @vite('resources/css/admin/index.css')
</head>
<body>
<header class="page-header">
    <!-- 使用可配置变量定义页面标题 -->
    <h1>{{ $pageTitle }}</h1>
    <nav>
        <ul class="navigation-menu">
            <li><a href="#">功能1</a></li>
            <li><a href="#">功能2</a></li>
            <li><a href="#">功能3</a></li>
            <li><a href="#">功能4</a></li>
        </ul>
    </nav>
    <!-- 使用常量定义欢迎信息 -->
    <p class="welcome-message">欢迎管理员<a href="#">
            {{ Auth::user()->name}}
        </a>登录</p>
</header>
</body>
</html>
