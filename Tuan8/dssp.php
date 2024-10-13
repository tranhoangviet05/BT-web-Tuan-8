<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web nhà hàng</title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Updock&display=swap" rel="stylesheet">
</head>

<body>
    <div id="wrapper">
        <div id="header">
            <div class="logo">
                <p class="updock-regular">Restaurant</p>
            </div>
            <div id="menu">
                <div class="item">
                    <a href="index.php">Trang chủ</a>
                </div>
                <div class="item">
                    <a href="dssp.php?page=1">Sản phẩm</a>
                </div>
                <div class="item">
                    <a href="">Blog</a>
                </div>
                <div class="item">
                    <a href="">Liên hệ</a>
                </div>
            </div>
            <div id="actions">
                <div class="item">
                    <img src="assets/user.png" alt="">
                </div>
                <div class="item">
                    <img src="assets/cart.png" alt="">
                </div>
            </div>
        </div>

        <div id="wp-products" style="padding-top: 15px;">
            <h2>SẢN PHẨM CỦA CHÚNG TÔI</h2>
            <ul id="list-products" style="padding-bottom: 0px;">
            <?php
            //Kết nối DB
            $conn = mysqli_connect('localhost', 'root', '', 'nhahang');
            //Truy vấn
            $sql = "SELECT count(id) as total FROM sanpham";
            $kq = mysqli_query($conn, $sql);
            $row = mysqli_fetch_array($kq);

            $limit = 3;
            $pagenumber = ceil($row['total']/$limit);
            $start = ($_GET['page'] - 1) * $limit;

            $kq1 = mysqli_query($conn, "SELECT * FROM sanpham LIMIT $start, $limit");
            while ($row1 = mysqli_fetch_array($kq1)){
                echo '<div class="item">
                        <img src="assets/'.$row1['hinh'].'" alt="" style="min-width: 265px; max-height: 174px;">
                        <div class="stars">
                            <span>
                                <img src="assets/star.png" alt="">
                            </span>
                            <span>
                                <img src="assets/star.png" alt="">
                            </span>
                            <span>
                                <img src="assets/star.png" alt="">
                            </span>
                            <span>
                                <img src="assets/star.png" alt="">
                            </span>
                            <span>
                                <img src="assets/star.png" alt="">
                            </span>
                        </div>

                        <div class="name">'.$row1['tensp'].'</div>
                        <div class="desc">'.$row1['mota'].'</div>
                        <div class="price">'.$row1['gia'].'</div>
                    </div>';
                            
            }
            ?>
            </ul>
            
            
            <div class="list-page">
            <?php
            for ($i = 1; $i <= $pagenumber; $i++){
                echo '<div class="item">
                    <a href="dssp.php?page='.$i.'">'.$i.'</a>
                </div>';
            }
            ?>
            </div>
            
        </div>

        <div id="saleoff">
            <div class="box-left">
                <h1>
                    <span>GIẢM GIÁ LÊN ĐẾN</span>
                    <span>45%</span>
                </h1>
            </div>
            <div class="box-right"></div>
        </div>
                
                
        <div id="footer" style="margin-top: 0px;">
            <div class="box">
                <div class="logo" style="margin-left: 0px;">
                    <p class="updock-regular">Restaurant</p>
                </div>
                <p>Cung cấp sản phẩm với chất lượng an toàn cho quý khách</p>
            </div>
            <div class="box">
                <h3>NỘI DUNG</h3>
                <ul class="quick-menu">
                    <div class="item">
                        <a href="index.php">Trang chủ</a>
                    </div>
                    <div class="item">
                        <a href="dssp.php?page=1">Sản phẩm</a>
                    </div>
                    <div class="item">
                        <a href="">Blog</a>
                    </div>
                    <div class="item">
                        <a href="">Liên hệ</a>
                    </div>
                </ul>
            </div>
            <div class="box">
                <h3>LIÊN HỆ</h3>
                <form action="index.php">
                    <input type="text" placeholder="Địa chỉ email">
                    <button>Nhận tin</button>
                </form>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>