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

            $('.operation').click(function(){
                console.log("clicked operation");
                console.log($(this).attr('action'));
                $('#desired_op').val($(this).attr('action'));
                $('#mathForm').submit();
            });
            $('#mathForm').submit(function(){

                $.post($(this).attr('action'),
                    $(this).serialize(),
                    function(data){
                        console.log(data);
                        $('#answer').text(data['answer']);
                        $('#process').text("Process: " + data['process']);

                    },
                    "json"
                );

                // prevent redirect to process.php
                return false;
             });    //   end ('mathForm').submit

        });    //  end (document).ready
    </script>
    </head>

<body>
  <div id="wrapper">
    <form id="mathForm" action="process.php" method="post">
      Enter a number: <input id="x" type="text" name="x"/>
      Another number: <input id="y" type="text" name="y"/>
      <input type="button" class="operation" action="Add" value="Sum"/>
      <input type="button" class="operation" action="Multiply" value="Multiply"/>
      <input type="button" class="operation" action="Less_Than" value="Less than"/>
      <input type="button" class="operation" action="Greater_Than" value="Greater than"/>
      <input id="desired_op" type="hidden" name="desired_op" value=""/>
    </form>
    <div id="results">Results:</br></br></br>
        <p id="answer">0.0</p></br>
        <p id="process">Process: </p>
    </div>

  </div>   <!-- end of wrapper-->    

</body>

</html>