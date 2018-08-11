<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="jquery-3.3.1.min.js" type="text/javascript"></script>
    </head>
    <body>
        <style>
            .big{
                font-size: 25px;
            }
            #big{
                font-size: 10px;
            }
            .ubah{
                color: red;
            }
            
        </style>
        
        <script type="text/javascript">
            $(function(){
                $(".ubah").css("color","green");
                $(".ubah").css("font-size","50px");
            });
        </script>
        <button class="big">tombol 1</button>
        <button id="big">tombol 2</button>
        <button class="ubah">tombol 3</button>
        <button class="ubah">tombol 4</button>
        
        
    </body>
</html>
