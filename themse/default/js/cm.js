function addcomment(){  
    
    
}
function checkcomment(item_comment){
           // $('#addcomment').show(); 
           selector = "form.cm." + item_comment;
           selector2 = "dd.product_comment."+item_comment
           var $form = $(selector).find("input");
           var datas = $form.serialize();
           $form.prop("disable", true);
           //alert(selector);
           $.ajax({
                url : "http://localhost/web/libs/modules/comment.php",
                type : "post",
                data : datas,
                success: function(response,status,jqXHR){
                        
                        $(response).insertBefore($(selector)).end().focus();                        
                    },
                error : function(msg){
                    $(selector2).append(msg+"1");
                    
                }
           });
           /*request.done(function(response , status , jqXHR){
                alert(response);
               // $(selector).appendChild('<dd class="comment_body">'+item_comment+'</dd>');
                
           });*/
           
           
           
           
           
    
}
function checkReg(){
    
}

function myFunction()
{
    x=document.getElementById("username");
    x.value=x.value.toUpperCase();
}
function checkuser(){
    username = document.getElementById('username');
    if(username.value == ""){
        username.focus;
        username.style.border.color="";
        alert('null');
    }
}