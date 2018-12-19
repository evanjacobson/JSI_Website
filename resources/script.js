$(document).ready(function(){
    
    $(document).on('click','.msg', function(){
        event.preventDefault(); //prevent actually following a link
        
        var message = decodeURIComponent($(this).attr("message"));
        var email = decodeURIComponent($(this).attr("email"));
        var sender = decodeURIComponent($(this).attr("fullname"));
        var subject = decodeURIComponent($(this).attr("subject"));
        
        $(".msg-preview").dialog("option","title", subject);
        $(".msg-preview").attr("placeholder", "");
        $(".msg-preview").attr("message", $(this).attr("message"));
        $(".msg-preview").attr("email", $(this).attr("email"));
        $(".msg-preview").attr("sender", $(this).attr("sender"));
        $(".msg-preview").attr("subject", $(this).attr("subject"));
        
        
        
        var modal_body = "<strong>From:</strong> " + sender + "<br>" + 
            "<strong>Subject:</strong> " + subject + "<br><hr><br>" + message;
            
        
        
        $(".msg-preview-msg").html(modal_body);
        $(this).parent().parent().addClass("modaaal");
        $(".msg-preview").dialog("open");
    });
    
    var one_break = "%0D%0A";
    var two_break = "%0D%0A%0D%0A";
        var hr = "%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F%5F";
    
    $( function() {
        
        
        var msg_break = two_break + two_break + hr + two_break;
        
        // https://api.jqueryui.com/dialog/
    $( ".msg-preview" ).dialog({
        maxWidth: 450,
        overflowY: "auto",
      autoOpen: false,
      resizable: false,
      height: "auto",
      width: 400,
      modal: true,
      buttons: {
        "Open as Email": function() {                
          window.location.href="mailto:" + $(this).attr("email") + "?subject=" + $(this).attr("subject") + "&body=" + msg_break + $(this).attr("message");
            $("table").find(".modaaal").removeClass("modaaal");
        },
//        "Close": function() {
//          $( this ).dialog( "close" );
//            $("#modal").removeAttr("id");
//        },
        "Delete": function(){
            $( this ).dialog( "close" );
            
            var row = $("table").find(".modaaal").first();
            var sender = row.attr("fullname")
            var email = row.attr("email");
            var subject = row.attr("subject");
            
            
            var item = {fullname: sender, email: email, subject: subject};
            
            deleteMessage(item);
            
            row.remove();
           
        }
      }
    });
        
  } );
    
    $(document).on('click','.trash', function(){
            $(this).parent().parent().parent().parent().remove();
            
            var item = $(this);
            var fullname = item.attr("fullname");
            var email = item.attr("email");
            var subject = item.attr("subject");
            item = {fullname: fullname, email: email, subject: subject};
            deleteMessage(item);
                 
    });
    
    function deleteMessage(item){
        $.ajax({
               type: "POST",
                dataType: "text",
                url: "../admin-panel/delete.php", 
                data: item,
                beforeSend: function() {
            $('#loading_icon').html(
            '<img class="img-responsive" src="../media/ajax_load.gif" height="40" width="40">');
           }, success: function( data ) {
               if(data == 1){
               $("#loading_icon").html("<div class='bg-danger text-light'>Message Deleted</div>");
               $("table").find(".modaaal").removeClass("modaaal");
               }
               else{
                   var str = "<div class='bg-danger text-light'>Error</div>";
                   $("#loading_icon").html(str); $("table").find(".modaaal").removeClass("modaaal");
               }
           }, fail: function(){
               $("#loading_icon").html("<div class='bg-danger text-light'>ERROR</div>");
           }
        });    
    }
    
    $("#refresh_messages").click(function(){

        $.ajax({
              type: "GET",
              url: "../admin-panel/refresh.php",
             data: type,
             beforeSend: function() {
            $('#loading_icon').html(
            '<img class="img-responsive" src="../media/ajax_load.gif" height="40" width="40">');
           }, success: function( data ) {
               if(data != null){
                   $("#tbody").html(data);
                   var date = new Date($.now());
                   var hours = date.getHours();
                   var minutes = date.getMinutes();
                   var seconds = date.getSeconds();
                   
                   var date = "<div class='text-dark'>" + hours + ":" + minutes + ":" + seconds + "</div>";
                   $("#loading_icon").html("<div class='bg-primary text-light'>Messages are up to date.</div>");
               }
               else{
                   $("#loading_icon").html("<div class='bg-danger text-light'>An error occured.</div>");
               }
               
              
             }, fail: function(){
               $("#loading_icon").html("<div class='bg-danger text-light'>ERROR</div>");
           }
        });    
    });
    
    
    $("#form").submit(function(event){
        event.preventDefault(); //prevent switching pages
        
        var inputData = $("#form").serialize(); //serialize for json
        
        var json = JSON.stringify(inputData); //json for ajax
        $.ajax
        ({
           type: "POST",
           url: "../contact-us/contact.php",
            dataType: "text",
           data: json,
            beforeSend: function() {
            $('#loading_icon').html(
            '<img class="img-responsive" src="../media/ajax_load.gif" height="40" width="40">');
           },		 
           success: function(data)
           {
               if(data == 1){
                   $('#loading_icon').html("<div class='bg-primary text-light'>Your Contact Form Was Successfully Submitted. We Will Be In Contact Shortly.</div>");
               }
               else{
                   if(data != 1){
                       console.log(data);
                   $('#loading_icon').html("<div class='bg-danger text-info'>Something Went Wrong. Please Contact <a class='text-light' href='mailto:connect@jacobsonstaffing.com'><u>connect@jacobsonstaffing.com</u></a> to report this error.</div>");

                   }
               }
               
               
               //clear the form
               $("#name_contact").val("");
               $("#email_contact").val("");
               $("#subject_contact").val("");
               $("#message_contact").val("");
           }/*, fail: function(){
               $("#").html("<div class='bg-danger text-light'>ERROR</div>");
           }*/
        });
    });
    
   
    var type;
    type = JSON.stringify(type);
    //for GET --- encodeURIComponent()
    
    $(".sort").click(function(){
        event.preventDefault(); //prevent switching pages
        
        $("#sort-menu").html($(this).html());
        $(".sort").removeClass("d-none");
        $(this).addClass("d-none");
        type = {sort: $(this).attr("sorttype"), order: $(this).attr("sortorder")};
        $.ajax({
              type: "GET",
              url: "../admin-panel/refresh.php",
              data: type,
             beforeSend: function() {
            $('#loading_icon').html(
            '<img class="img-responsive" src="../media/ajax_load.gif" height="40" width="40">');
           }, success: function( data ) {
               if(data != null){
                   $("#tbody").html(data);
                   $("#loading_icon").html("<div class='bg-primary text-light'>Messages are up to date and sorted. </div>");
               }
               else{
                   $('#loading_icon').html("<div class='bg-danger text-info'>Something Went Wrong. Please Contact <a class='text-light' href='mailto:connect@jacobsonstaffing.com'><u>connect@jacobsonstaffing.com</u></a> to report this error.</div>");
               }
               
              
             },  fail: function(){
                    $('#loading_icon').html("<div class='bg-danger text-info'>Something Went Wrong. Please Contact <a class='text-light' href='mailto:connect@jacobsonstaffing.com'><u>connect@jacobsonstaffing.com</u></a> to report this error.</div>");
               }
        });
    });
    
    
             
    
    
    
});

window.onload = function(){
    var path = document.URL;   
    if(!path.includes("admin-panel")){return;}
    
    /*if(path.endsWith("?sort=date&order=new")){
        document.getElementById("sort-date-new").classList.add("d-none");
        document.getElementById("sort-menu").innerHTML = "Sort: Date (Newest)";
    }
    else*/ 
    if(path.endsWith("?sort=date&order=old")){
        document.getElementById("sort-date-old").classList.add("d-none");
        document.getElementById("sort-menu").innerHTML = "Sort: Date (Oldest)";
    }   
    else if(path.endsWith("?sort=name&order=asc")){
        document.getElementById("sort-name-asc").classList.add("d-none");
        document.getElementById("sort-menu").innerHTML = "Sort: Name (Asc)";
    }
    else if(path.endsWith("?sort=name&order=asc")){
        document.getElementById("sort-name-desc").classList.add("d-none");
        document.getElementById("sort-menu").innerHTML = "Sort: Name (Desc)";
    }
    else if(path.endsWith("?sort=date&order=new")){
        document.getElementById("sort-date-new").classList.add("d-none");
        document.getElementById("sort-menu").innerHTML = "Sort: Date (Newest)";
        }
    }
    
