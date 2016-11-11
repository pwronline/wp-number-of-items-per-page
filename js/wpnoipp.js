(function($) {
        
    $(document).ready(function() { 

        //view
        var zonaTop = $("#posts-filter .tablenav.top .tablenav-pages");
        var zonaBottom = $("#posts-filter .tablenav.bottom .tablenav-pages");
        var texto = options.texto;
        
        var html = '<span style="margin-left:10px;">' + texto + ' </span>' +
                    '<select class="select-noipp">' +
                            '<option value="5">5</option>' +
                            '<option value="10">10</option>' +
                            '<option value="20">20</option>' +
                            '<option value="50">50</option>' +
                            '<option value="100">100</option>' +
                            '<option value="200">200</option>' +
                            '<option value="300">300</option>' +
                            '<option value="400">400</option>' +
                            '<option value="500">500</option>' +
                            '<option value="999">999</option>' +
                    '</select>';
        
        zonaTop.append(html);
        zonaBottom.append(html);
        
        //Var Default
        var selectores = $(".select-noipp");
        var valorPrincipal = $(".screen-options input.screen-per-page").attr("value");
        
        selectores.each(function(){
            $(this).find("option").each(function() {
                if($(this).attr("value") == valorPrincipal){
                    $(this).attr("selected" , "selected");
                    return false;
                }
            });
        });
        
        
        //Events
        selectores.each(function(){
            $(this).change(function(){
                $(".screen-options input.screen-per-page").attr("value" , $(this).val());
                setTimeout( function () { 
                    $("#adv-settings").submit();
                }, 300);
            });
        })
        
    });
    
}(jQuery));