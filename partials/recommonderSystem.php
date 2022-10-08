  <!-- RECOMMONDER SYSTEM SCRIPT-->
  <?php
        //   script for recommonder system starts from here
        //   made by collaborative based filtering
                            $sql="SELECT * FROM `userbasicdetails` WHERE phoneNumber='$phoneNumber'";
                            $result=mysqli_query($connect,$sql);
                            $num=mysqli_num_rows($result);
                            $row=mysqli_fetch_assoc($result);
                      $digreeOrCertification=$row['digreeOrCertification'];
                      //find the same course people
                      $sql1="SELECT * FROM `userbasicdetails` where digreeOrCertification='$digreeOrCertification' AND phoneNumber NOT LIKE '$phoneNumber'";
                      $result1=mysqli_query($connect,$sql1);
                      $i=0;
                      while($row1=mysqli_fetch_assoc($result1))
                      {
                       //find the persons which have rated minimum 5 jobs
                       $p=$row1['phoneNumber'];//phone number of other user
                       $sql2="SELECT * FROM `ratings` WHERE phoneNumber='$p'";
                       $result2=mysqli_query($connect,$sql2);
                       $row2=mysqli_fetch_assoc($result2);
                       $num2=mysqli_num_rows($result2);
                       if($num2>5)
                       {
                          //this is for ratings giving to which mininmum 5 jobs by which user
                          $arrayOfUser[$i]=$row2['phoneNumber'];
                          $i++;
                       }
                      }
                      if($i>=2)
                      {     
                             echo 'isme aye hai';
                             $numResults=$i;//total number of results
                             $i=0;
                             while($i<=$numResults)
                             {   
                                  $mainIndex=0;
                                 //this check the same type of jobs rated bay five same field persons
                                 $sql3="SELECT * FROM `ratings` WHERE phoneNumber='$arrayOfUser[$i]'";
                                 $result3=mysqli_query($connect,$sql3);
                                 while( $row3=mysqli_fetch_assoc($result3))
                                 {   

                                     $next=$i+1;
                                     $sno=$row3['sno'];
                                     //now check other five user have same 5 jobs ratings or not
                                     $sql4="SELECT * FROM `ratings` WHERE sno='$sno' AND phoneNumber='$arrayOfUser[$next]'";
                                     $result4=mysqli_query($connect,$sql4);
                                     $num4=mysqli_num_rows($result4);
                                     $row4=mysqli_fetch_assoc($result4);
                                     if($num4==1)
                                     {
                                        $finalArray[$mainIndex]=$row4['phoneNumber']; 
                                        $mainIndex++;
                                     }
                                 }
                             }
                             echo $mainIndex;
                      }
                      else
                      {
                          $flagToRecommond=0;
                      }


                      if(isset($flagToRecommond))
                      {
                          if($flagToRecommond==1)

                            echo ' <div id="middleArea5">
                             <h1>Jobs Recomonded For You</h1>
                       
                                </div>';
                      }


            ?> 
            <?php








                 ?>