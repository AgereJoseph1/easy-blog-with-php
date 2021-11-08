$conn = mysqli_connect('localhost', 'root', '', 'blogdb');

if (!$conn) {
    echo "Error connecting to db";
    exit();
}