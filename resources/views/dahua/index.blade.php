<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('websdk/css/style.css') }}">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <div class="parent">
            <div class="div1">
                <div class="container-fluid">
                    <video class="videoPlayer" style="width: 500px; height:auto ;display:none;" controls></video>
                    <canvas class="canvasPlayer" style="display:none;" hidden></canvas>
                </div>
            </div>
            <div class="div2">2</div>
            <div class="div3">3</div>
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <script src="{{ asset('websdk/module/PlayerControl.js') }}"></script>
    <script>
        
        addEventListener('keypress', function(event){
            console.log(`Key pressed: ${event.key}, Code: ${event.code}`);
        });

        var options = {
            wsURL: 'ws://10.90.111.37:80/rtspoverwebsocket',
            rtspURL: 'rtsp://10.90.111.37:80/cam/realmonitor?channel=1&subtype=0&proto=Private3',
            username: 'admin',
            password: 'admin1234.',
        }

        var videoObj = document.getElementById('videoPlayer');
        var canvasObj = document.getElementById('canvasPlayer');

        var player = new PlayerControl(options);

        player.on('WorkerReady', function() {
            player.connect();
        });
        player.init(canvasObj, videoObj);
        
        // videoObj.style.display('block');
        // canvasObj.style.display('block');
    </script>
</body>

</html>
