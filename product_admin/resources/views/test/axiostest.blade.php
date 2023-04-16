<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.bootcss.com/axios/0.19.0-beta.1/axios.min.js"></script>
    <title>
        @yield('title', 'Laravel')
    </title>
</head>
<body>
<button
    onclick='sendRequest()'
>
    发送请求
</button>
<p>

</p>
<script>
    function sendRequest() {
        axios.get('/test/axios')
            .then(function (response) {
                console.log(response);
                document.querySelector('p').innerHTML = response.data;
            })
            .catch(function (error) {
                console.log(error);
            });
    }
</script>
<button>

</button>
</body>
</html>
