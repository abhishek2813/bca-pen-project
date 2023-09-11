<?php

    session_start();
    if(!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in']!=true||isset($_SESSION['loggedin']) ){
        session_unset();    
        session_destroy(); 
        header("Location: login.php?Admin_login_by_proper_ways");
        exit;
    }
    else{ 
         
    $dbHost="localhost";
    $dbUser="root";
    $dbPass="";
    $database="ecom";

    $conn= mysqli_connect($dbHost, $dbUser, $dbPass,$database);
    }



    function get_safe_value($conn,$str)
    {
          return mysqli_real_escape_string($conn,$str);
    }
  

    
  #------All products
  function get_product($conn,$type='')
  {
    $sql="SELECT * FROM `product`";
    if($type=='latest')
    {
      $sql.='order by p_id';
    }
    $data=array();
    $result= mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result))
    {
      $data[]=$row;   
    }
    return $data;
  } 


    #------Random products
    function get_rand_product($conn,$limit='')
    {
      $sql="SELECT * FROM `product` order by count desc limit $limit";
      
      $data=array();
      $result= mysqli_query($conn,$sql);
      while($row=mysqli_fetch_assoc($result))
      {
        $data[]=$row;   
      }
      return $data;
    }

  #-------New arrivals waale

  function get_product_limit($conn ,$limit='')
  {
    $sql="SELECT * FROM `product`";
    
   
    if($limit!='')
    {
      $sql.="order by p_id desc limit $limit";
    }
    $data=array();
    $result= mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result))
    {
      $data[]=$row;   
    }
    return $data;
  } 


  #-----Best sellers
  function get_best_product($conn)
  {
    $sql="SELECT * FROM `product` WHERE count>3 order by count desc";
    
    $data=array();
    $result= mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result))
    {
      $data[]=$row;   
    }
    return $data;
  } 




  function get_brand($conn,$type='')
  {
    $sql="SELECT * FROM `brand`";
    if($type=='latest')
    {
      $sql.='order by id desc';
    }
    $data=array();
    $result= mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result))
    {
      $data[]=$row;   
    }
    return $data;
  } 


  

  function get_all_products($conn,$id)
  {
    $sql="SELECT * FROM `product` where brand_id=$id";
    $data=array();
    $result= mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result))
    {
      $data[]=$row;   
    }
    return $data;
  }



  function find_brand($conn,$id)
  {
    $sql="SELECT brand from brand where id=$id";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    return $row['brand'];
  }


?>