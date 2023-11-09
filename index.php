<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../doan1/src/css/user/user-header.css">
    <link rel="stylesheet" href="../doan1/src/css/user/user-homepage.css">
    <link rel="stylesheet" href="../doan1/src/css/user/user-footer.css">
    <link rel="stylesheet" href="../doan1/src/css/login/login.css">
    <link rel="stylesheet" href="../doan1/src/css/index.css">
    <link rel="stylesheet" href="../doan1/src/css/admin/admin-header.css">
    <link rel="stylesheet" href="../doan1/src/css/admin/admin-content.css">
    <link rel="stylesheet" href="../doan1/src/css/login/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <title>Web anh Chấn bán đạo máy tính</title>
</head>

<body>
    <?php
        session_start();
        // session_destroy();
        include("./src/model/connect.php");
        include("./src/model/account.php");
        include("./src/model/product.php");
        include("./src/views/admin/admin-header.php");
        $limitPage = 5;

        if (isset($_GET['page'])) {
        $page = $_GET['page'];
        switch ($page) {
            case 'listaccounts':
                if (isset($_POST['search-submit-account'])) {
                    $_SESSION['search-account'] = $_POST['search-input-account'];
                }
                if (isset($_POST['sort-submit-account'])) {
                    $_SESSION['sort-account'] = $_POST['sort-select-account'];
                }
                /* Lấy ra giá trị từ bộ lọc đưa vào cho biến session */
                $_SESSION['search-account'] = isset($_SESSION['search-account']) ? $_SESSION['search-account'] : '';
                $_SESSION['sort-account'] = isset($_SESSION['sort-account']) ? $_SESSION['sort-account'] : 'asc';
                // Lấy ra số trong trên url
                $countAccount = getAllAccount($conn, $_SESSION['search-account'], $_SESSION['sort-account'], '', ''); //Lấy ra tổng số dòng có trong CSDL
                $total_page = ceil(mysqli_num_rows($countAccount) / $limitPage); // Tính tổng số trang cần có để hiển thị hết các dòng, mỗi trang 5 dòng dữ liệu
                // 
                if ($total_page == 0) { //Kiểm tra trường hợp không có bất cứ hàng dữ liệu nào trong điều kiện query => 1
                    $total_page = 1;
                }
                $current_page = isset($_GET['pageNumber']) ? $_GET['pageNumber'] : '1';
                if ($current_page < 1) { //Kiểm tra nếu người dùng nhập số lượng page trên url có giá trị nhỏ hơn trang đầu tiền
                    $current_page = 1;
                }
                if ($current_page > $total_page) { //Kiểm tra nếu người dùng nhập số lượng page trên url có giá trị lớn hơn trang cuối cùng
                    $current_page = $total_page;
                }   
                $start = ($current_page - 1) * $limitPage; // Tính vị trí bắt đầu cho dữ liệu
                $dataAccount = getAllAccount($conn, $_SESSION['search-account'], $_SESSION['sort-account'], $start, $limitPage); //Lấy dữ liệu từ vị trí của start với số dòng dữ liệu là limitPage
                include('./src/views/admin/account/list-account.php');
                break;
            case 'listproducts':
                $dataAccount = getAllProduct($conn);
                include('./src/views/admin/product/list-product.php');
                break;
            case 'listbills':
                include('./src/views/admin/bill/list-bill.php');
                break;
        }
    } 
    ?>
</body>

</html>