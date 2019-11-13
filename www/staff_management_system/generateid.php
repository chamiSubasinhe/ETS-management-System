<?php

 
//database connection
include 'includes/dbh.php';




                $query = "select staffID from staff order by staffID DESC LIMIT 1";
                $result = mysqli_query($conn, $query);


                if(mysqli_num_rows($result) > 0)
                 {
                    while ($row = mysqli_fetch_array($result))
                    {
                        $empid = $row['staffID'];
                    }
                }



                $part1 = substr($empid, 0, 6);
                $part2 = intval(substr($empid, 6))+1;
                $part2 = str_pad($part2, 6, '0', STR_PAD_LEFT);
                $newstaffID = $part1.$part2;


                echo $newstaffID;

            




?>
