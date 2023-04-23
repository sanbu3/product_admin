<!DOCTYPE html>
<html lang="">
<head>
    <title>后台管理</title>
    <!-- 使用常量定义页面标题 -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        /* 全局样式 */
        :root {
            --primary-color: #5ABC68;
            --secondary-color: #F5AE3E;
            --border-color: #E6E6E6;
            --text-color: #333;
            --transition: all 0.3s ease;
        }

        /* 页头样式 */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .page-header h1 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
            color: var(--text-color);
        }

        /* 主体部分样式 */
        main {
            padding: 20px;
            background-color: #f5f5f5;
        }

        .page-header h1 {
            margin: 0;
            font-size: 24px;
            color: var(--text-color);
        }

        /* 表格样式 */
        .user-table {
            width: 100%;
            border-collapse: collapse;
        }

        .user-table thead th {
            padding: 15px;
            background-color: var(--secondary-color);
            color: #fff;
        }

        .user-table tbody td {
            padding: 15px;
            border-bottom: 1px solid var(--border-color);
        }

        .user-table button {
            background-color: var(--primary-color);
            color: #fff;
            padding: 5px 10px;
            border: none;
            border-radius: var(--border-radius);
            cursor: pointer;
            transition: var(--transition);
        }

        .user-table button:hover {
            background-color: #43a355;
        }

        .red-btn {
            background-color: #ea4335;
            border-color: #ea4335;
        }

        .red-btn:hover {
            background-color: #d32f2f;
        }


    </style>
    @vite('resources/css/admin/index.css')
</head>
<body>
<header class="page-header">
    <h1>后台管理</h1>
    <nav>
        <ul class="navigation-menu">
            <li><a href="{{ route('home.index') }}">产品首页</a></li>
            <li><a href="#">待加功能</a></li>
            <li><a href="#">待加功能</a></li>
            <li><a href="{{ route('logout') }}">退出登录</a></li>
        </ul>
    </nav>
</header>
<main>
    <div class="page-header">
        <h1>用户管理</h1>
        <button class="add-user">添加用户</button>
    </div>
    <table class="user-table">
        <thead>
        <tr>
            <th>用户名</th>
            <th>邮箱</th>
            <th>注册时间</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->format('Y-m-d') }}</td>
                <td>
                    <button class="edit-user">修改用户</button>
                    <button class="delete-user" style="background-color: #EA4335; border-color: #EA4335;">删除用户
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</main>
</body>
</html>
