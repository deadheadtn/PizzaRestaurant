<?php
/*
* Author: Rohit Kumar
* Website: iamrohit.in
* Date: 09-03-2016
* App Name: Star rating system
* Description: Star rating demo using Jquery, PHP and Mysql
*/
include_once('rating.php')
?>
<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title>Star rating demo using Jquery, PHP and Mysql</title>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">
<link href="css/star-rating.min.css" media="all" rel="stylesheet" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    
    <script src="js/star-rating.min.js" type="text/javascript"></script>
   
</head>

<body>

   <input size ="5" value="<?= getRatingByProductId(connect(), $_GET['productId'] ); ?>" type="number" class="rating" min=0 max=5 step=0.1 data-size="sm" data-stars="5" productId=<?php echo $_GET['productId'] ?>>
        </td>
   <td> 
  

     <script type="text/javascript">
        $(function(){
               $('.rating').on('rating.change', function(event, value, caption) {
                productId = $(this).attr('productId');
                $.ajax({
                  url: "rating.php",
                  dataType: "json",
                  data: {vote:value, productId:productId, type:'save'},
                  success: function( data ) {
                     alert(window.frames['myIFRAME'].myIFRAMEvar);
                  },
              error: function(e) {
                // Handle error here
                console.log(e);
              },
              timeout: 30000  
            });
              });

           


        });
    </script>
    </body>
</html>
