<?php
//this page shows the last result after checking that the cookies are set or not
if(isset($_COOKIE["LocationCookie"]) OR isset($_COOKIE["SkillsDesignationCompaniesCookie"])){
    $L_Cookie=$_COOKIE["LocationCookie"]; //stores the location cookie value
    $SDCC_Cookie=$_COOKIE["SkillsDesignationCompaniesCookie"]; //stores the skill,designation,companies cookies
if($L_Cookie AND $SDCC_Cookie) {
  echo '<a href="../php/userInterface.php?SkillsDesignationCompanies='.$SDCC_Cookie.'&Location='.$L_Cookie.'&search=true"><img src="../icons/recentSearch.png" alt="Image Not Loaded">'.$_COOKIE["SkillsDesignationCompaniesCookie"].' Vaccancies At '.$_COOKIE["LocationCookie"].'</a>';
}
else{
    if($L_Cookie)
    {
        echo '<a href="../php/userInterface.php?SkillsDesignationCompanies=&Location='.$L_Cookie.'&search=true"><img src="../icons/recentSearch.png" alt="Image Not Loaded"> Vaccancies In '.$L_Cookie.'</a>';
    }
    else
    {
        echo '<a href="../php/userInterface.php?SkillsDesignationCompanies='.$SDCC_Cookie.'&Location=&search=true"><img src="../icons/recentSearch.png" alt="Image Not Loaded"> Vaccancies In '.$SDCC_Cookie.'</a>';
    }
}
}
?>