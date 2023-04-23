<!DOCTYPE html>
<html>
<head>
    <title>产品管理</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --primary-color: #ea732e;
            --border-color: #ddd;
            --border-radius: 4px;
            --search-btn-padding: 10px 15px;
            --search-btn-color: #fff;
            --search-btn-bg-color: #ea732e;
            --search-btn-hover-bg-color: #c34f1a;
            --search-btn-transition: all 0.3s ease;
            --rounded-rect-border-radius: 8px; /* 新增圆角矩形常量 */
            --transition: all 0.3s ease;
            --not-imoportant-font-size: 0.8em;
            --not-important-color: #c4c4c4;
            --secondary-color: #f5ae3e;
        }

        main {
            padding: 20px;
            background-color: #f5f5f5;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .page-header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
            color: var(--text-color);
        }

        .navigation-menu {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .navigation-menu li {
            margin-right: 20px;
        }

        .navigation-menu li:last-child {
            margin-right: 0;
        }

        .navigation-menu a {
            display: block;
            padding: var(--search-btn-padding);
            font-size: 16px;
            font-weight: bold;
            color: var(--text-color);
            text-decoration: none;
            border-radius: var(--border-radius);
            transition: background-color var(--transition);
        }

        .navigation-menu a:hover {
            background-color: var(--secondary-color);
        }

        .navigation-menu li:hover a {
            background-color: #f5f5f5;
            color: #333;
        }

        .order-item {
            display: grid;
            grid-template-columns: 1fr 1fr;
            /*区域:两个info为一行,下一行是操作按钮但是在一个块里*/
            grid-template-areas: "info-1 info-2" "operator operator";
            padding: 20px;
            border: 1px solid var(--border-color);
            border-radius: var(--border-radius);
            background: #ffffff;
        }

        .order-col1 {
            grid-area: info-1;
            padding: 10px;
        }

        .order-col2 {
            grid-area: info-2;
            padding: 10px;
        }

        .order-list {
            display: flex;
            flex-direction: column;
        }

        /* 订单状态样式 */
        .paid {
            background-color: #e2f0d9;
        }

        .shipped {
            background-color: #eaeefb;
        }

        .completed {
            background-color: #f2edeb;
        }

        .order-operator {
            grid-area: operator;
            display: flex;
            justify-content: end;
        }

        .order-head-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .edit-order {
            padding: var(--search-btn-padding);
            background-color: var(--search-btn-bg-color);
            border: 1px solid var(--search-btn-bg-color);
            color: var(--search-btn-color);
            border-radius: var(--border-radius);
            cursor: pointer;
        }

        .edit-order:hover {
            padding: var(--search-btn-padding);
            background-color: transparent;
            border: 1px solid var(--search-btn-bg-color);
            color: var(--search-btn-bg-color);
            cursor: pointer;
            margin-left: 10px;
            transition: boxshadow 0.3s ease , var(--search-btn-transition);
        }

        .delete-order {
            border-radius: var(--border-radius);
            padding: var(--search-btn-padding);
            background-color: transparent;
            border: 1px solid #ea4335;
            color: var(--search-btn-bg-color);
            cursor: pointer;
            margin-left: 10px;
            transition: boxshadow 0.3s ease , var(--search-btn-transition);
        }

        .delete-order:hover {
            background-color: #ea4335;
            color: white;
        }

        .order-operator button:active{
            background-color: #ea4335;
            color: white;
            transform: scale(0.9);
        /*    底边多重灰色阴影 ,不偏移,制造出按下四边的层次感*/
            box-shadow: 0 0 0 5px skyblue, 0 0 0 4px deepskyblue, 0 0 0 1px cornflowerblue;
        }

        .search-orders {
            padding: var(--search-btn-padding);
            background-color: var(--search-btn-bg-color);
            border: 1px solid var(--search-btn-bg-color);
            color: var(--search-btn-color);
            border-radius: var(--border-radius);
        }

    </style>
</head>
<body>
<header class="page-header">
    <h1>订单管理</h1>
    <input class="search-orders" type="text" placeholder="搜索订单">
    <nav>
        <ul class="navigation-menu">
            <li><a href="#">首页</a></li>
            <li><a href="#">订单列表</a></li>
            <li><a href="#">添加订单</a></li>
            <li><a href="#">退出</a></li>
        </ul>
    </nav>
</header>
<main>
    <div class="order-head-title">订单信息</div>
    <div class="order-status">订单状态: <span class="status-paid">已付款</span></div>
    <div class="order-item paid">
        {{--        信息--}}
        <div class="order-col1">
            <p><span class="order-no" style="color: var(--primary-color)">订单号:</span>202103231521</p>
            <p><span class="order-time" style="color: var(--primary-color)">下单时间:</span>2021-03-23 15:21:33</p>
            <p><span>收货人:</span>王明明</p>
            <p><span>收货地址:</span>四川省成都市高新区天府软件园10栋502</p>
        </div>
        {{--        状态--}}
        <div class="order-col2">
            <p><span class="order-status" style="color: var(--primary-color)">订单状态:</span><span class="status-paid">已付款</span>
            </p>
            <p><span class="order-amount" style="color: var(--primary-color)">订单金额:</span>¥568.00</p>
            <p><span>联系电话:</span>18523652963</p>
            <p><span>物流公司:</span>顺丰速运</p>
            <p><span>快递单号:</span>666391027721</p>
        </div>
        <div class="order-operator">
            <button class="edit-order">编辑订单</button>
            <button class="delete-order" style="margin-left: 10px;">删除订单</button>
        </div>
    </div>


    <div class="order-status">订单状态: <span class="status-shipped">已发货</span></div>

    <div class="order-item shipped">
        <div class="order-col1">
            <!-- 订单详细信息1 -->
        </div>
        <div class="order-col2">
            <!-- 订单详细信息2 -->
        </div>
    </div>

    <div class="order-status">订单状态: <span class="status-completed">已完成</span></div>

    <div class="order-item completed">
        <div class="order-col1">
            <!-- 订单详细信息1 -->
        </div>
        <div class="order-col2">
            <!-- 订单详细信息2 -->
        </div>
    </div>

    <div class="order-operator">
        <!-- 操作按钮 -->
    </div>

</main>
</body>
</html>
