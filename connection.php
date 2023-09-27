<?php
  session_start();

    $dbHost="localhost";
    $dbUser="root";
    $dbPass="";
    $database="ecom";
    
    $conn= mysqli_connect($dbHost, $dbUser, $dbPass,$database);
    #-------New arrivals waale
  
    function get_product_limit($conn ,$limit='')
    {
      $sql="SELECT * FROM `product` where status=1 ";
      
     
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
      $sql="SELECT * FROM `product` WHERE count>3 and status=1 order by count desc";
      
      $data=array();
      $result= mysqli_query($conn,$sql);
      while($row=mysqli_fetch_assoc($result))
      {
        $data[]=$row;   
      }
      return $data;
    } 


    #------All products
    function get_product($conn,$type='')
    {
      $sql="SELECT * FROM `product` WHERE  status = 1 ";
      if($type=='latest')
      {
        $sql.='order by p_id desc';
      }
      $data=array();
      $result= mysqli_query($conn,$sql);
      while($row=mysqli_fetch_assoc($result))
      {
        $data[]=$row;   
      }
      return $data;
    } 


    #------------Find brand in Product description
    function find_brand($conn,$id)
    {
      $sql="SELECT brand from brand where id=$id";
      $result=mysqli_query($conn,$sql);
      $row=mysqli_fetch_assoc($result);
      return $row['brand'];
    }



    #--------Return data in string
    function get_safe_value($conn,$str)
    {
          return mysqli_real_escape_string($conn,$str);
    }





    #------Random products
    function get_rand_product($conn,$limit='')
    {
      $sql="SELECT * FROM `product` WHERE  status = 1 order by count desc limit $limit";
      
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

    $sql.="where status='1'";
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
    $sql="SELECT * FROM `product` where brand_id=$id and `status`=1";
    $data=array();
    $result= mysqli_query($conn,$sql);
    while($row=mysqli_fetch_assoc($result))
    {
      $data[]=$row;   
    }
    return $data;
  }



?>