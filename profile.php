<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            font-family: sans-serif;
            background-color: pink;
        }

        .container {
            width: 500px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 20px;
        }

        button {
            padding: 10px 20px;
            background-color: #ed9c9d;
            color: #000000;
            border: none;
            border-radius: 20px;
            cursor: pointer;
        }

        .box {
            display: flex;
            justify-content: center;
            margin-bottom: 15px;
        }

        .box img {
            max-width: 100px;
            height: auto;
            border-radius: 50%;
            overflow: hidden;
            margin-bottom: 10px;
        }

        .back {
            position: fixed;
            top: 5%;
            left: 5%;

        }

        .back a {
            font-size: 50px;
        }
    </style>

</head>

<body>
    <div class="container">
        <h1>Edit Profile</h1>

        <div class="back">
            <a href="playing.php" class="bi bi-arrow-left-circle-fill"></a>
        </div>

        <form action="#" id="profileForm">
            <div class="box">
                <img src="upin comel.jpg" id="profileImage">
                <input type="file" id="imageInput" accept="image/*" onchange="previewImage(event)">
            </div>

            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" placeholder="Enter your username">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email">
            </div>

            <div class="form-group">
                <label for="Nohp">Nohp:</label>
                <input type="tel" id="Nohp" name="Nohp" placeholder="Enter your phone number">
            </div>

            <div class="form-group">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>

            <div class="form-group">
                <label for="Tanggal Lahir">Tanggal Lahir:</label>
                <input type="date" id="Tanggal Lahir" name="Tanggal Lahir">
            </div>

            <button type="submit" id="submitButton">Save</button>
        </form>

    </div>
    <script>
        function previewImage(event) {
            var input = event.target;
            var reader = new FileReader();
            reader.onload = function () {
                var dataURL = reader.result;
                var profileImage = document.getElementById('profileImage');
                profileImage.src = dataURL;
            };
            reader.readAsDataURL(input.files[0]);
        }




    </script>
</body>

</html>