<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>Bulletin</title>
    <link rel="stylesheet" href="/lib/jquery-ui/themes/base/jquery-ui.min.css/">
    <link rel="stylesheet" href="/lib/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/lib/gridster.js/dist/jquery.gridster.css">
    <link rel="stylesheet" href="/assets/css/app.min.css">
</head>
<body>

<button id="new-block">Add New Block</button> <button id="serialize">Serialize</button>


<div class="canvas">
    <div class="gridster">
        <ul>
            <li data-row="1" data-col="1" data-sizex="6" data-name="lorde" data-sizey="1">Announcements</li>
            <li data-row="1" data-col="2" data-sizex="6" data-sizey="1">Notices</li>
        </ul>
    </div>
</div>

{{--
<div class="contained">
    <div class="layout">
        <div class="block">
            Announcements
        </div>

        <div class="block">
            Announcements
        </div>

        <div class="block">
            Announcements
        </div>
    </div>
</div>--}}

<script src="/lib/jquery/dist/jquery.min.js"></script>
<script src="/lib/jquery-ui/jquery-ui.min.js"></script>
<script src="/lib/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/lib/gridster.js/dist/jquery.gridster.js"></script>
<script src="/assets/js/app.js"></script>
</body>
</html>