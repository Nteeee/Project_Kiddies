<?php
class MainController
{
    function  __construct()
    {
        if($server= mysql_connect("localhost","root","")){
        }
        else
            echo 'not connected';
        if($database=  mysql_select_db("kiddiescompany")){
        }
        else
            echo 'database error';
    }
    function RegisterUser($firstname,$lastname,$id,$email,$password)
    {
       $sql="INSERT INTO users values(NULL,'$firstname','$lastname','$id','$email','$password','user');";
       if(!$query=mysql_query(mysql_query($sql)))
       {
          $msg="Registration successful,you may proceed to login";
       }
       else
       {
          $msg="Error occured,please try again later";
       }
       return $msg;
    }
    function Login($email,$password)
    {
        $sql="select email,user_type,password from users where email like '$email'";
        if($query=mysql_query($sql))
        {
            while($Info = mysql_fetch_array($query))
            {
                    if($Info['email']==$email && $Info['password']==$password)
                    {
                        echo $Info['email'];
                        if($Info['user_type']=="admin")
                        {
                            $data="You have been verified as valid admin<a href='Addproducts.php' ></a><br/> ";
                        }
                        else
                        {
                            $data="You have been verified as valid user<a href ='products.php'>Order here!</a><br/> ";
                        }
                        
                    }
            }
        }
        else
        {
            $data="Please register first or contact <a href'mailto:booshhof@gmail.com'>administration</a> if you already have.";
        }
        return $data;
    }
     function addProduct($name,$desc,$cat,$price,$quantity)
     {
       $sql="INSERT INTO products values(NULL,'$name','$desc','$cat','$price','$quantity');";
       if(!$query=mysql_query(mysql_query($sql)))
       {
          $msg="Product added,Thank you!";
       }
       else
       {
          $msg="Error occured,please try again later";
       }
       return $msg;
     }
     function SearchProducts($name,$category)
     {
        $sql="SELECT  prod_id,prod_name,prod_description,prod_category,prod_price,quantity from products where prod_name like '".$name."' or prod_category like '$category';";
        if($query=mysql_query($sql))
        {
            while($Info = mysql_fetch_array($query))
            {
                for($a=0;$a<=$Info.length;$a++)
                {
                    $data.= "Product name : ".$Info['prod_name']."<br/>"."Description : ".$Info['prod_description']."<br/>"."Category : ".$Info['prod_category']."<br/>"."Price per item : R".$Info['prod_price']."<input type='checkbox' name='cart' value='".$Info['prod_id']."' /><hr/>";
                }
            }
        }
        else
        {
            $data="Out of stock,please try again later";
        }
        $data.="<input type='submit' name ='submit' value='Add To Cart' id='subscribe_button'/>";
        return $data;
     }
     function GetProduct($prod_id)
     {
        $sql="SELECT  prod_id,prod_name,prod_price from products where prod_id like '$prod_id'";
        if($query=mysql_query($sql))
        {
            $data="<h3>Products added to cart</h3>";
            while($Info = mysql_fetch_array($query))
            {
                    $data.=$Info['prod_id'].$Info['prod_name'].$price=$Info['prod_price'];
            }
        }
        else
        {
            $data="";
        }
        return $data;
     }
    
	 function writeShoppingCart($cart) 
	 {
			$cart = $_SESSION['cart'];
			if (!$cart) {
				return '<p>You have no items in your shopping cart</p>';
			} else {
				// Parse the cart session variable
			$products = explode(',',$cart);
			$s = (count($products) > 1) ? 's':'';
			return '<p>You have <a href="cart.php">'.count($products).' products'.$s.' in your shopping cart</a></p>';
	}
}
    function showCart() {
	
	$cart = $_SESSION['cart'];
	if ($cart) {
		$products = explode(',',$cart);
		$contents = array();
		foreach ($products as $products) {
			$contents[$products] = (isset($contents[$products])) ? $contents[$products] + 1 : 1;
		}
		
		foreach ($contents as $id=>$qty) {
			$sql = 'SELECT * FROM products WHERE prod_id = '.$prod_id;
			$result = $db->query($sql);
			$row = $result->fetch();
			extract($row);
			$output[] = '<br />';
			$output[] = $prod_id;
			$output[] = $prod_name;
			$output[] = $prod_price;
			$output[] = $prod_id + $qty;
			$output[] = $price * $qty;
			$total += $price * $qty;
			
		}
		
		$output[] = 'Grand total: &pound;'.$total;

	
	} else {
		$output[] = 'You shopping cart is empty.';
	}
	return join('',$output);
}
}
