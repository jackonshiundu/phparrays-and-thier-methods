<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
        #movies{
            background-color: color #000;
            color:#fff;
            font-family:cursive;
        }
        tr.header{
            background-color: #111f4e;
            color:#fff;
            font:bold 11pt ;
        }
        tr.odd{
            background-color: #18182b;
        }
        tr.even{
            background-color: #141423;
        }
        img{
            padding:10px;
            width: 10rem;
            height:20rem;
            object-fit:cover;
        }
        td{
            text-align:center;
        }
        span.year{
            color:#ccc;
            font-size:18px;
        }
        span.name{
            font-size:18px;
            font-weight:bold;
        }
        body{
            padding:0;
            margin:0;
        }
    </style>
    <?php
    $dir='images';
    //scandir returns an array of files and directory in a spacified file
    $files=scandir($dir);
    function pre_r($array){
        echo '<pre>';
        print_r($array);
        echo '</pre>'; 
    }
    //array_diff compares the array in the two array and return the difrence
    $files=array_diff($files,array('.','..'));
    //return an array value with numeric values starting form zero
    $files=array_values($files);
    $movies=array();

    for($i=0;$i<count($files);$i++){
        //preg_match returns wether a match was met or not
        preg_match("!(.*?)\((.*?)\)!",$files[$i],$results);
        print_r($results);
        //str_replace replaces a string with the word spacifies in the parameters
        $movie_name=str_replace('_',' ',$results[1]);
        //ucwords capitalizes the words
        $movie_name=ucwords($movie_name);
        $movies[$movie_name]['image']=$files[$i];
        $movies[$movie_name]['year']=$results[2];
    }
    echo "<table id='movies' cellpdding=50>";
    echo "<tr class='odd'>";
    foreach($movies as $movie_name=> $info){
        $content="<td><span class='name'>$movie_name</span> <br/>"."<img src='images/$info[image]'> <br/>"."<span class='year'>($info[year])</span></td>";
        echo $content;
    }
    echo "</tr>";
    echo "</table>";
    ?>

</body> 
</html>