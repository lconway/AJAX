<?php
	require("connection.php");
?>


<!DOCTYPE HTML>
<html lang="en-US">
<head>
    <link rel="stylesheet" type="text/css" href="CSS/style.css"/>
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/ui-lightness/jquery-ui.css" type="text/css" media="all" />  
    <script type="text/javascript" src="jquery/jquery-1.10.2.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script> <script type="text/javascript">
        $(document).ready(function(){
            //alert('hello');

            $('.date').datepicker();

            $('#searchText').keyup(function(){
                $('#leadsForm').submit();
            });

            $('#leadsForm').submit(function(){
 
                $.post(
                    $(this).attr('action'),
                    $(this).serialize(),
                    function(data){
                        $('#results').html(data);

                    },
                    "json"
                ); 

                // prevent redirect to process.php
                return false;
            });    //   end ('leadsForm').submit
            
            $('#leadsForm').submit();

        });    //  end (document).ready
    </script>
    </head>

<body>
  <div id="wrapper">
    <form id="leadsForm" action="process.php" method="post">
      Name: <input id="searchText" type="text" name="name"/>
      From Date: <input class="date" type="text" name="from_date"/>
      To Date: <input class="date" type="text" name="to_date"/>
      <input type="submit" value="Submit"/>
    </form>
    <div id="results"></div>

  </div>   <!-- end of wrapper-->    

</body>

</html>