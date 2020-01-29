<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
    <title>click</title>

    <script type="text/javascript">
        $(function() {
            $('#clickme').on('click', function(event) {
                $('#siteloader').show().load('jquery_divajax.htm');
                event.preventDefault();
            });

            $('#siteloader').on('click', '#chiudi', function(event) {
                $('#siteloader').hide();
                event.preventDefault();
            });
        });
    </script>
</head>

<body>
    <a id="clickme" href="">click</a>
    <div id="siteloader"></div>
</body>
</html>
