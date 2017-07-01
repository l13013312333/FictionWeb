document.getElementById("Gsign").style.visibility="hidden";
var bar = 0;
count();
function count(){
    bar = bar + 4;
    document.getElementById("progressbar").style.width = bar+"%";
    if(bar < 101){
        setTimeout("count()", 100);
    }
    else{
        //正式進入網站內容
        document.getElementById("Gsign").style.visibility="visible";
        document.getElementById("progress").style.visibility="hidden";
        document.getElementById("progressbar").style.visibility="hidden";
    }
}