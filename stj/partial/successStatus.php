<?php
echo '<style>
#success{
    background: #229cb74d;
    font-size: 1.5vh;
    border-radius: .5vh;
    padding: .5vh;
    border: 1px solid #2279a2;
    margin: .3vh;
    color:#0f00f7;
    display: flex;
    justify-content: space-between;
}
#crossButton{
    border: none;
    background: none;
}
</style><div id="success"><h1>'.$placeholder.' | Successfully</h1><button id="crossButton" onclick="hide()"><img src="../icons/cross.svg"></button></div><script>
function hide()
{
   document.getElementById("success").style.display="none";
}
</script>';

?>