<?php
    session_start();
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_POST['Add_To_Cart'])){
                //if cart is having at least one item
                if(isset($_SESSION['cart'])){
                    //array=> list of itemsName (pasta,maggie,...)
                    $myItems = array_column($_SESSION['cart'],'Item_name');
    
                    //check if currently added item is already in the cart
                    if(in_array($_POST['Item_name'],$myItems)){
                        echo '<script>
                            alert("Item Already Added");
                            window.location.href="menu.php";
                        </script>';
                    }
                    else{
                        $count = count($_SESSION['cart']);
                    $_SESSION['cart'][$count] = array('Item_name'=>$_POST['Item_name'], 'Price'=>$_POST['Price'], 'Quantity'=>1);
                    echo '<script>
                            alert("Item Added");
                            window.location.href="menu.php";
                        </script>';
                    }
                    
                    // print_r($_SESSION['cart']);
                }
                //if cart is empty
                else{
                    $_SESSION['cart'][0] = array('Item_name'=>$_POST['Item_name'], 'Price'=>$_POST['Price'], 'Quantity'=>1);
                    echo '<script>
                            alert("Item Added");
                            window.location.href="menu.php";
                        </script>';
                    // print_r($_SESSION['cart']);
                }
            }
    
            if(isset($_POST['Remove_Item'])){
                foreach($_SESSION['cart'] as $key=>$value){
                    //remove index
                    if($value['Item_name'] == $_POST['Item_name']){
                        unset($_SESSION['cart'][$key]);
    
                        //array ki indexing ko maintain krne ke liye, rearrange the array.
                        $_SESSION['cart'] = array_values($_SESSION['cart']);
                        echo '
                            <script>alert("Item Removed");
                            window.location.href = "cart.php";
                            </script>
                        ';
                    }
                }
            }
    
            if(isset($_POST['Mod_Quantity'])){
                foreach($_SESSION['cart'] as $key=>$value){
                    //remove index
                    if($value['Item_name'] == $_POST['Item_name']){
                        $_SESSION['cart'][$key]['Quantity'] = $_POST['Mod_Quantity'];
    
                        echo '
                            <script>
                            window.location.href = "cart.php";
                            </script>
                        ';
                    }
                }
            }
        }
    }
    else{
        echo '<script>
        alert("You need to log in before buying");
        window.location.href="login.php";
        </script>';
    }
?>