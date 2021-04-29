<?php

namespace zlytz\hw4\Views;

class BaseView extends View
{
    private $picstream;

    function setdata($stream)
    {
        $this->picstream = $stream;
    }

    function render()
    {
        ?>
        <!doctype html>
        <html>
        <head>
        <meta charset='UTF-8'>
        <script>
        function validate()
        {
            var coord = document.forms['coordForm']['coord'].value;
            var coords = coord.split(',');
            for(i = 0; i < coords.length; i++)
            {
                if(coords[i] > 3 || coords[i] < 0)
                {
                    alert('Invalid Coordination !');
                }
            }
        }
        </script>
        </head>
        <body>
        <h1>Simple Tile Server</h1>
        <div>
        <form name = "coordForm" action="./index.php" onsubmit = "return validate();" method = 'post'>
        Coordination : <input type = "text" name = "coord">
        <input type = "hidden" name = "input" value = "gotoCoord">
        <input type = "submit" name = "coordSubm" value = "Go!">
        </form>
        </div>
        <div>
        <table>
            <?php
                $j = 0;
                for($i = 0; $i < 3 ; $i++)
                {
                    echo "<tr>
                            <td><img src= \"";?><?php echo $this->picstream[$i][$j] ?><?php echo"\" /></td>
                            <td><img src=\"";?><?php echo $this->picstream[$i][$j+1] ?><?php echo"\" /></td>
                            <td><img src=\"";?><?php echo $this->picstream[$i][$j+2] ?><?php echo"\" /></td>
                        </tr>";
                }
            ?>
        </table>
        </div>
        </body>
        </html>
        <?php     
    }
}
?>