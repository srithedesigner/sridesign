var checky = 0;
function check()
{
    if(checky ==0)
    {
    
    for(var i =0;i<5;i++)
    {
    document.getElementsByClassName("cons")[i].checked = true;
    }
    checky =1;
}
else{
    for(var i =0;i<5;i++)
    {
    document.getElementsByClassName("cons")[i].checked = false;
    }
    checky =0;

}
}
