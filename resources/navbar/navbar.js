$(document).ready(function(){
    
    var path = window.location.pathname.replace("/Final/","");
    path = path.replace("index.php","");
    
    
    if(path.endsWith(".php")){
        removeActive();
        path = path.replace(".php", "");
        var split = path.split('/');
        
        split[0] = "#" + split[0];
        split[1] = "#" + split[1];
        $("#mainNav").find(split[0]).addClass("active");
        $("#mainNav").find(split[1]).addClass("active");
        
        }
        
    else{
        if(path != ""){
            removeActive();
        path = path.replace('/','');
        pat = "#" + path;
        $("#mainNav").find(pat).addClass("active");
        }
        else{
            $("#index").addClass("active");
        }
    }
    
    $("#logout").click(function(){
        removeActive();
        $("#login").addClass("active");
    });
    
/*      HANDLES CHANGING COLOR WHEN MENU-BAR IS HOVERED     */
    $(".nl, .di").hover(
        function(){
            navFocusHoverIn($(this));
        },
        function(){
            navFocusHoverOut($(this));
        });       
    $(".nl, .di").focusin(function(){
        navFocusHoverIn($(this))
    });
    $(".nl, .di").focusout(function(){
        navFocusHoverOut($(this))
    });

    
/*      DYNAMIC APPLICATION OF THE "ACTIVE" CLASS FOR MENU BAR      */
    $(".nl, .di").click(function(){
        /*      make the previously active header-item inactive     */
        removeActive();
        
        if($(this).hasClass("di")){
            
            //figure out which it belongs to
            if($(this).hasClass("employers")){
                //employers_dropdown
                var parent = $("#employers_dropdown");
            }
            else if($(this).hasClass("candidates")){
                //candidates_dropdown
                var parent = $("#candidates_dropdown");
            }
            else if($(this).hasClass("about-us")){
                //about_us_dropdown
                var parent = $("#about_us_dropdown");
            }
            
                
            parent.addClass("active");
            
            parent.html(parent.html() + '<span class="sr-only">(current)</span>');
            $(this).addClass("active");
        }
        else{
            $(this).html($(this).html() + '<span class="sr-only">(current)</span>');
            $(this).addClass("active");
        }
        
    });

    function removeActive(){
        $(".dropdown-menu").children().removeClass("menuHover");
        $("#mainNav").find(".sr-only").remove();
        removeMenuHoverStyle($("#mainNav").find(".active"));
        $("#mainNav").find(".active").removeClass("active");
        $(".dropdown-menu").find(".active").removeClass("active");
    }
    
    var isCollapsed = true;
    
    
/*     DIFFERENT STYLE ON COLLAPSE      */
        $("#mainNav").on('show.bs.collapse', function(){
            $(".nl").addClass("collapsedNav");
            $('#nav-separator').html("<hr class='separator'/>");
            $("#nav-separator").addClass("separator");
            
//            $(".dropdown-toggle").removeAttr("href");
            isCollapsed = false;
            
        });
        
        $("#mainNav").on('hide.bs.collapse', function(){
            $(".nl").removeClass("divider");
            $("#nav-separator").html("");
            $("#nav-separator").removeClass("separator");
            isCollapsed = true;
        });
    
/*     NAVBAR HIGHLIGHT FUNCTIONS    */
    
    /*      called on focus or hover in/on menu-item  */
    function navFocusHoverIn(menuItem){
        if(!(menuItem.hasClass("active"))){
            if(!(menuItem.hasClass("drop-item"))){
                menuHoverStyle(menuItem);
            }
            else{
                menuHoverStyle(menuItem);
                var tog = menuItem.parents().find(".dropdown-toggle");
                menuHoverStyle(tog);
            }
        }
    }
    /*      called on remove focus or hover from menu-item    */
    function navFocusHoverOut(menuItem){
        
        if(!(menuItem.hasClass("active"))){
            if(!(menuItem.hasClass("active")))
            {
                removeMenuHoverStyle(menuItem);
                var tog = menuItem.parents().find(".dropdown-toggle");
                removeMenuHoverStyle(tog);
            }
            else
            {
                removeMenuHoverStyle(menuItem);
            }
        }
    }
    
/*      ABSTRACTION FOR CHANGING THE MENU COLOR    */
    function menuHoverStyle(item){
        item.addClass("menuHover");
    }
    function removeMenuHoverStyle(item){
        item.removeClass("menuHover");
    }
    
    
/*      ROUTING     */
    
    var d = window.location.pathname.replace("index.php","");
    
    $("#about-us").click(function(){
        if(path == ""){
            window.location.href = d + "about-us";
        }
        else{
        window.location.href = "../about-us";
        }
    });
    
    $("#candidates").click(function(){
        if(path == ""){
            window.location.href = d + "candidates";
        }
        else{
            window.location.href = "../candidates";
        }
    });
    
    $("#employers").click(function(){
        if(path == ""){
            window.location.href = d + "employers";
        }
        else{
             window.location.href = "../employers";
        }
    });   
               
});