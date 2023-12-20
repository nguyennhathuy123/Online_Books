<?php
    session_start();
    if(!isset($_SESSION['giohang'])) $_SESSION['giohang']=[];
    //làm rỗng giỏ hàng
    if(isset($_GET['delcart'])&&($_GET['delcart']==1)) unset($_SESSION['giohang']);
    //xóa sp trong giỏ hàng
    if(isset($_GET['delid'])&&($_GET['delid']>=0)){
       array_splice($_SESSION['giohang'],$_GET['delid'],1);
    }
    //lấy dữ liệu từ form
    if(isset($_POST['addcart'])&&($_POST['addcart'])){
        $hinh=$_POST['hinh'];
        $tensp=$_POST['tensp'];
        $gia=$_POST['gia'];
        $soluong=$_POST['soluong'];

        //kiem tra sp co trong gio hang hay khong?

        $fl=0; //kiem tra sp co trung trong gio hang khong?

        for ($i=0; $i < sizeof($_SESSION['giohang']); $i++) { 
            
            if($_SESSION['giohang'][$i][1]==$tensp){
                $fl=1;
                $soluongnew=$soluong+$_SESSION['giohang'][$i][3];
                $_SESSION['giohang'][$i][3]=$soluongnew;
                break;

            }
            
        }
        //neu khong trung sp trong gio hang thi them moi
        if($fl==0){
            //them moi sp vao gio hang
            $sp=[$hinh,$tensp,$gia,$soluong];
            $_SESSION['giohang'][]=$sp;
        }

       // var_dump($_SESSION['giohang']);
    }

    function showgiohang(){
        if(isset($_SESSION['giohang'])&&(is_array($_SESSION['giohang']))){
            if(sizeof($_SESSION['giohang'])>0){
                $tong=0;
                for ($i=0; $i < sizeof($_SESSION['giohang']); $i++) { 
                    $tt=$_SESSION['giohang'][$i][2] * $_SESSION['giohang'][$i][3];
                    $tong+=$tt;
                    echo '<tr>
                            <td>'.($i+1).'</td>
                            <td><img src="images/'.$_SESSION['giohang'][$i][0].'" alt=""></td>
                            <td>'.$_SESSION['giohang'][$i][1].'</td>
                            <td>'.$_SESSION['giohang'][$i][2].'</td>
                            <td>'.$_SESSION['giohang'][$i][3].'</td>
                            <td>
                                <div>'.$tt.'</div>
                            </td>
                            <td>
                                <a href="cart.php?delid='.$i.'">Xóa</a>
                            </td>
                        </tr>';
                }
                echo '<tr>
                        <th colspan="5">Total orders</th>
                        <th>
                            <div>'.$tong.'</div>
                        </th>
    
                    </tr>';
            }else{
                echo "Empty cart!";
            }    
        }
    }
    


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart | View Cart</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="boxcenter">
        <div class="row mb header">
            <h1>Online Books</h1>
        </div>
        <div class="row mb menu">
            <ul>
                <li><a href="index.php">Store</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="#">Contact</a></li>
                <li><a href="#">Feedback</a></li>
                <li><a href="#">FAQ</a></li>
            </ul>
        </div>
        <div class="row mb ">
            <div class="boxtrai mr" id="bill">
                <div class="row" >
                    <h1>DELIVERY INFORMATION</h1>
                    <table class="thongtinnhanhang">
                        <tr>
                            <td width="20%">Name</td>
                            <td><input type="text" name="name" required></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td><input type="text" name="address" required></td>
                        </tr>
                        <tr>
                            <td>Telephone</td>
                            <td><input type="text" name="telephone" required></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><input type="text" name="email" required></td>
                        </tr>
                    </table>
                </div>
                <div class="row mb">
                    <h1>CART</h1>
                    <table>
                        <tr>
                            <th>STT</th>
                            <th>IMG</th>
                            <th>Product name</th>
                            <th>Price</th>
                            <th>Total</th>
                            <th>Into Money ($)</th>
                            <th>Delete</th>
                        </tr>
                        <?php showgiohang(); ?>
                        <!-- <tr>
                            <td>1</td>
                            <td><img src="images/1.jpg" alt=""></td>
                            <td>Đồng hồ</td>
                            <td>10</td>
                            <td>1</td>
                            <td>
                                <div>10</div>
                            </td>
                        </tr> -->
                        <!-- <tr>
                            <th colspan="5">Tổng đơn hàng</th>
                            <th>
                                <div>10</div>
                            </th>

                        </tr> -->
                    </table>
                </div>
                <div class="row mb">
                    <input type="submit" value="AGREE TO ORDER" name="dongydathang">
                    <a href="cart.php?delcart=1"><input type="button" value="DELETE CART"></a>
                    <a href="index.php"><input type="button" value="CONTINUE ORDERING"></a>
                </div>
            </div>
            <div class="boxphai">
                <div class="row mb ">
                    <div class="boxtitle">ACCOUNT</div>
                    <div class="boxcontent formtaikhoan">
                        <form action="#" method="post">
                            <div class="row mb10">
                                Username<br>
                                <input type="text" name="user">
                            </div>
                            <div class="row mb10">
                                Password<br>

                                <input type="password" name="pass">
                            </div>
                            <div class="row mb10">
                                <input type="checkbox" name=""> Remember the account?</div>
                            <div class="row mb10">
                                <input type="submit" value="login">
                            </div>
                        </form>
                        <li>
                            <a href="#">Forgot password</a>
                        </li>
                        <li>
                            <a href="#">Membership Registration</a>
                        </li>
                    </div>
                </div>
                <div class="row mb">
                    <div class="boxtitle">DIRECTORY</div>
                    <div class="boxcontent2 menudoc">
                        <ul>
                            <li>
                                <a href="#">IT</a>
                            </li>
                            <li>
                                <a href="#">English</a>
                            </li>
                            <li>
                                <a href="#">science-technology</a>
                            </li>
                           
                        </ul>
                    </div>
                    <div class="boxfooter searbox">
                        <form action="#" method="post">
                            <input type="text" name="" id="">
                        </form>
                    </div>
                </div>
                
            </div>
        </div>
        
    </div>

</body>

</html>