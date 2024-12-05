
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên hệ</title>
    <style>
        .container {
            width: 50%;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        label {
            font-weight: bold;
        }

        input,
        textarea {
            padding: 0.5rem;
            font-size: 1rem;
            border-radius: 0.25rem;
            border: 1px solid #ccc;
        }

        button {
            padding: 0.5rem 1rem;
            font-size: 1rem;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 0.25rem;
            cursor: pointer;
        }
    </style>

</head>

<body>
    <div class="container">
        <h1>Liên hệ với chúng tôi</h1>
        <form action="lienhe.php" method="POST">
            <div class="form-group">
                <label for="name">Tên của bạn:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email của bạn:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="message">Tin nhắn:</label>
                <textarea id="message" name="message" rows="5" required></textarea>
            </div>
            <button type="submit">Gửi</button>
        </form>
    </div>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        // Kết nối cơ sở dữ liệu
        include 'connect_db.php';

        // Chèn dữ liệu vào bảng liên hệ
        $sql = "INSERT INTO contact (name, email, message) VALUES ('$name', '$email', '$message')";
        if (mysqli_query($data, $sql)) {
            echo "<p>Cảm ơn bạn đã liên hệ với chúng tôi!</p>";
        } else {
            echo "<p>Đã xảy ra lỗi: " . mysqli_error($data) . "</p>";
        }

        // Đóng kết nối
        mysqli_close($data);
    }
    ?>
</body>

</html>