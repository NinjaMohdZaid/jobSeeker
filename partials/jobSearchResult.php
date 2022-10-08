<?php
      $phoneNumber=$_SESSION['phoneNumber'];
      if($_GET['search'])
       {
           //working on the search result
           $Location=$_GET['Location'];
           $SkillsDesignationCompanies=$_GET['SkillsDesignationCompanies'];
        require 'dbmsConnection.php';
    if(($_GET['SkillsDesignationCompanies'] AND $_GET['Location']))
    {   
        $sql="SELECT * FROM `accounts`,`jobs` where ((jobs.city LIKE '%$Location%' OR jobs.state LIKE '%$Location%' OR jobs.country LIKE '%$Location%' OR nearbyPlace LIKE '%$Location%' OR pinCode LIKE '%$Location') AND (jobs.typeOfJob LIKE '%$SkillsDesignationCompanies%' OR jobs.jobTitle LIKE '%$SkillsDesignationCompanies%' OR jobs.jobDescription LIKE '%$SkillsDesignationCompanies%' OR accounts.fullName LIKE '%$SkillsDesignationCompanies%')) AND (jobs.phoneNumber=accounts.phoneNumber AND InRecycleBin='')";
        //store the last search
        $valueStatus='both';//gives the value which is searches both or one of these
        include '../partials/storeSearchJobs.php';
    }
    else{
         if($_GET['Location'])
         {
            $sql="SELECT * FROM `accounts`,`jobs` where (jobs.city LIKE '%$Location%' OR jobs.state LIKE '%$Location%' OR jobs.country LIKE '%$Location%' OR nearbyPlace LIKE '%$Location%' OR pinCode LIKE '%$Location') AND (jobs.phoneNumber=accounts.phoneNumber AND InRecycleBin='')";
        //store the last search
        $valueStatus='onlyLocation';//gives the value which is searches both or one of these
        include '../partials/storeSearchJobs.php';
        }
         else
         {
             //store the last search
        $valueStatus='onlySkillsDesignationCompanies';//gives the value which is searches both or one of these
        include '../partials/storeSearchJobs.php';
            $sql="SELECT * FROM `accounts`,`jobs` where (jobs.typeOfJob LIKE '%$SkillsDesignationCompanies%' OR jobs.jobTitle LIKE '%$SkillsDesignationCompanies%' OR jobs.jobDescription LIKE '%$SkillsDesignationCompanies%' OR accounts.fullName LIKE '%$SkillsDesignationCompanies%') AND (jobs.phoneNumber=accounts.phoneNumber AND InRecycleBin='')";
         }
    }
        $result=mysqli_query($connect,$sql);
        $num = mysqli_num_rows($result);
        if($num>0){
            echo '<div id="jobResult">';
        while($row=mysqli_fetch_assoc($result)){
            //check job is saved or not
            $snoC=$row['sno'];
            $sqlC="SELECT * FROM `usersavedjob` WHERE phoneNumber='$phoneNumber' AND sno='$snoC'";
            $resultC=mysqli_query($connect,$sqlC);
            $numC=mysqli_num_rows($resultC);
            if($numC!=1)
            {
                //$c for showing which heart mark has to show with link
               $c='<a href="../partials/saveJob.php?sno='.$row['sno'].'"><img src="../icons/makeFav.png"></a>';
            }
            else{
                 $c='<a href="../partials/unsaveJob.php?sno='.$row['sno'].'"><img src="../icons/favourite.png"></a>';
            }
          echo '<div class="jobs"><img src="https://source.unsplash.com/weekly?'.$row['typeOfJob'].'" alt="image Not Loaded"><h3>'.$row['jobTitle'].'</h3><p>'.mb_strimwidth($row['jobDescription'], 0, 80, ".....").'</p><div id="action">'.$c.'<a href="../php/viewDetailsAndApplyForJob.php?s='.$row['sno'].'"><img src="../icons/view.png"></a></div></div>';
        }
        echo '</div>';
        }
        else{
            echo '<img src="../icons/noResult.png" alt="Image Not Loaded" id="noResultImage">';
        }
        
        }
       else{
           header('Location:../partials/error504.php');
       }
?>