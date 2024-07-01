<?php session_start(); ?>
<!-- <h5>Order Details</h5>   -->
               <div class="tbl_cart">   
                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                    <div class="tbl_item_list">
                         <div>  
                              <p><?php echo $values["service_name"]; ?></p>
                              <p><?php echo $values["number of customer"]; ?> <i class="fa fa-user"></i></p>
                              <p>&#8377;<?php echo $values["payable amount"]; ?></p> 
                              <a name="del_to_cart" class="del_to_cart" data-id="<?php echo $values['serv_id']; ?>" href="javascript:void(0)">
                                   <span class="text-danger" style="font-size: 25px;">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                   </span>
                              </a>  
                         </div>  
                         <div>
                               <?php echo $values["salon_name"]; ?>
                         </div>
                    </div>  
                          <?php  
                                    $total = $total + $values["payable amount"];  
                                    $_SESSION['total_price'] = $total;
                               }  
                          ?>  
                    <div style="border-bottom: 2px solid #023ead; padding: 5px; font-weight: 500; bottom: 0; position: absolute;">  
                         <td colspan="2" align="right">Payable Amount:</td>  
                         <td align="right">&#8377;<?php echo number_format($total, 2); ?></td>  
                    </div>  
                          <?php  
                          }  
                          ?>  
                          <?php 
                         if(empty($_SESSION['shopping_cart'])) {
                         ?>
                    <div class="cart_empty_img">
                         <img src="images/icons/empty_cart.png">
                    </div>
                         <?php
                         }
                         ?>
               </div>  

<script>

    $(".del_to_cart").click(function(){
        var del_id = $(this).data('id');

        $.ajax({
            url: 'add_to_cart.php',
            type: 'post',
            data: { del_id: del_id },
            success: function(data, status) {
               view_cart();
               view_count();
            }
        });
    });

</script>

<style>

    .tbl_item_list div:nth-child(1) {
         color: green;
         display: flex;
         align-items: center;
    }
    .tbl_item_list div:nth-child(1) p:nth-child(1) {
         width: 55%;
         margin: 0;
    }
    .tbl_item_list div:nth-child(1) p:nth-child(2) {
         width: 15%;
         margin: 0;
    }
    .tbl_item_list div:nth-child(1) p:nth-child(3) {
         width: 15%;
         margin: 0;
    }
    .tbl_item_list div:nth-child(1) a {
         width: 11%;
         margin: 0 2%;
         text-align: right;
    }
    .tbl_item_list {
         background: rgb(241, 241, 241);
         margin: 5px 0;
         padding: 10px 10px;
         border-radius: 5px;
    }
    .tbl_cart {
         min-height: 300px;
    }
    .cart_empty_img {
         display: flex;
         justify-content: space-around;
         align-items: center; 
    }

</style>