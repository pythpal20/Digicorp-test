<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Soal No 3</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <style>
        #callFunctionBtn {
            color: white;
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 10px;
            cursor: pointer;
        }
    </style>
    <div class="container" style="margin-top: 20px;">
        <div class="card">
            <div class="card-body">
                <h1>Rambu lalu lintas </h1>
                <p>Jumlah pemanggilan/ click: <span id="counter"></span></p>
                <p>Warna: <span id="color"></span></p>
                <button id="callFunctionBtn" onclick="callFunction()">Panggil Function</button>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
        let counter = 0;

        function callFunction() {
            counter++;
            document.getElementById("counter").textContent = counter;

            let xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    let color = xhr.responseText;

                    if (color == 'merah') {
                        var newcolor = 'red';
                    } else if (color == 'hijau') {
                        var newcolor = 'green';
                    } else if (color == 'kuning') {
                        var newcolor = 'yellow';
                    }
                    document.getElementById("color").textContent = color;
                    document.getElementById("callFunctionBtn").style.backgroundColor = newcolor;
                }
            };
            xhr.open('GET', "functionsoal3.php?counter=" + counter, true);
            xhr.send();
        }
    </script>
</body>

</html>