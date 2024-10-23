
function responsive(){
    let change = screen.width;
    if(change > 852){
        $('#myForm').removeClass('col-6');
        $('#myForm').addClass('col-5');
    }
    else if(change > 1000){
        $('#myForm').removeClass('col-4');
        $('#myForm').addClass('col-2');
    }
    else if(change < 500){
        $('#myForm').removeClass('col-4');
        $('#myForm').addClass('col-9');
    }
    else if(change < 852){
        $('#myForm').removeClass('col-4');
        $('#myForm').addClass('col-6');
    }
}