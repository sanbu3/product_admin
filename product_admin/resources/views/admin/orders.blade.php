<!-- 在页面中引入 Bootstrap 和 jQuery 库 -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
@vite('resources/css/admin/index.css')
<style>

    /* 定义表格样式 */
    .table {
        width: 100%;
        max-width: 100%;
        margin-bottom: 1rem;
        background-color: var(--secondary-color);
        border-collapse: collapse;
    }

    .table th,
    .table td {
        padding: 0.75rem;
        vertical-align: top;
        border-top: 1px solid #dee2e6;
    }

    .table th {
        font-weight: bold;
        text-align: center;
        border-bottom: 2px solid #dee2e6;
    }

    .table td {
        text-align: center;
    }

    /* 定义按钮样式 */
    .btn {
        display: inline-block;
        font-weight: 400;
        color: #fff;
        text-align: center;
        vertical-align: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        background-color: var(--primary-color);
        border: 1px solid var(--primary-color);
        border-radius: var(--border-radius);
        padding: 0.5rem 1rem;
        font-size: 1rem;
        line-height: 1.5;
        cursor: pointer;
        transition: var(--transition);
        font-family: var(--font-family);
    }

    .btn:hover {
        background-color: #c34f1a;
        border-color: #c34f1a;
    }

    .btn-primary {
        background-color: var(--primary-color);
        border-color: var(--primary-color);
    }

    .btn-primary:hover {
        background-color: #c34f1a;
        border-color: #c34f1a;
    }

    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }

    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }

    /* 定义编辑按钮样式 */
    .edit-btn {
        margin-right: 5px;
    }

    /* 定义删除按钮样式 */
    .delete-btn {
        margin-left: 5px;
    }

    /* 定义表单样式 */
    form {
        margin: 20px 0;
    }

    label {
        display: inline-block;
        margin-bottom: 0.5rem;
        font-weight: bold;
    }

    input[type="text"],
    select {
        display: block;
        width: 100%;
        padding: 0.375rem 0.75rem;
        font-size: 1rem;
        line-height: 1.5;
        color: #495057;
        background-color: #fff;
        background-image: none;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        border-radius: var(--border-radius);
        transition: var(--transition);
        font-family: var(--font-family);
    }

    input[type="text"]:focus,
    select:focus {
        border-color: #80bdff;
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        outline: none;
    }

    /* 定义不重要的文本样式 */
    .not-important {
        font-size: 0.8em;
        color: #c4c4c4;
    }
</style>
<header class="page-header">
    <!-- 使用常量定义页面标题 -->
    <h1>后台管理</h1>
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
</header><!-- 在页面中添加一个页面头部 -->

<!-- 在页面中添加一个表格，用于显示订单列表 -->
<table class="table">
    <thead>
    <tr>
        <th>订单号</th>
        <th>客户姓名</th>
        <th>订单金额</th>
        <th>订单状态</th>
        <th>付款状态</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td>201901010001</td>
        <td>张三</td>
        <td>10000</td>
        <td>已发货</td>
        <td>已付款</td>
        <td>
            <button type="button" class="btn btn-primary edit-btn" data-toggle="modal" data-target="#editModal">修改
            </button>
            <button type="button" class="btn btn-danger delete-btn">删除</button>
        </td>
    </tr>
    <tr>
        <td>201901010002</td>
        <td>李四</td>
        <td>20000</td>
        <td>已完成</td>
        <td>已付款</td>
        <td>
            <button type="button" class="btn btn-primary edit-btn" data-toggle="modal" data-target="#editModal">修改
            </button>
            <button type="button" class="btn btn-danger delete-btn">删除</button>
        </td>
    </tr>
    <!-- 其他订单行 -->
    </tbody>
</table>

<!-- 添加一个弹出式的编辑订单表单 -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">编辑订单</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- 编辑订单表单 -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-primary">保存</button>
            </div>
        </div>
    </div>
</div>
