<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>默认方式显示和隐藏动画</title>
    <script type="text/javascript" src="https://cdn.bootcdn.net/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        function hideFn() {
            // 隐藏div
            /*$("#showDiv").hide("slow","swing",function () {
                alert("隐藏了...")
            });*/

            // 滑动隐藏div
            $("#showDiv").slideUp("fetch");

            // 淡出隐藏div
            // $("#showDiv").fadeOut("fetch");

        }

        function showFn() {
            // 显示div
            // $("#showDiv").show("slow","swing");
            // linear 匀速

            // 滑动显示div
            // $("#showDiv").slideDown("slow");

            // 淡出显示div
            $("#showDiv").fadeIn("slow")
        }

        function toggleFn() {
            // 能显示能隐藏
            // $("#showDiv").toggle("slow","linear");

            // 滑动能显示能隐藏
            $("#showDiv").slideToggle("slow");

            // 淡入淡出显示和隐藏div
            // $("#showDiv").fadeToggle("fetch")
        }

    </script>

</head>
<body>
<input type="button" value="点击按钮隐藏div" onclick="hideFn()">
<input type="button" value="点击按钮显示div" onclick="showFn()">
<input type="button" value="点击按钮切换div显示和隐藏" onclick="toggleFn()">

<div id="showDiv" style="width:300px;height:300px;background:pink">
    div显示和隐藏
</div>
</body>
</html>
