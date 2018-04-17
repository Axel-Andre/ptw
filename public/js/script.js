function modeRecherche(mode){
    if(mode === "recurrent"){
        $("#recherche_recurrente").css("display","block");
        $("#recherche_recurrente").animate({opacity: '1'});
        $("#recherche_ponctuelle").css("display","none");
         $("#recherche_ponctuelle").animate({opacity: '0'});
        $("#home_recherche_button_pon").css("color","rgba(255,255,255,1)");
         $("#home_recherche_button_rec").css("color","rgba(255,223,0,1)");
    }else if (mode==="ponctuel"){
        $("#recherche_recurrente").css("display","none");
        $("#recherche_recurrente").animate({opacity: '0'});
        $("#recherche_ponctuelle").css("display","block");
         $("#recherche_ponctuelle").animate({opacity: '1'});
        $("#home_recherche_button_rec").css("color","rgba(255,255,255,1)");
         $("#home_recherche_button_pon").css("color","rgba(255,223,0,1)");
    }
}


function trajecttype(type) {
    if(type === "recurrent"){
        $("#displaytags").css("display","none");
        $("#displayheurer").css("display","block");
    } else if (type ==="ponctuel"){
        $("#displaytags").css("display","block");
        $("#displayheurer").css("display","none");
    }
}
