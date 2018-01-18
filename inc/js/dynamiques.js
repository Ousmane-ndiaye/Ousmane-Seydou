$(function() {
    $("#alertI, #alertC, #infoI").hide();
    $(".menu-icon").on("click", function() {
        alert("apres tu comprendras");
    });

    $(window).on("scroll", function() {
        if ($(window).scrollTop()) {
            $("header nav").addClass("black");
        } else {
            $("header nav").removeClass("black");
        }
    });
    $(".openI").on("click", function() {
        $(".popupI").fadeIn("slow");
        return false;
    });
    $(".closeI").on("click", function() {
        $(".popupI").fadeOut("slow");
    });
    $(".openR").on("click", function() {
        $(".popupR").fadeIn("slow");
        return false;
    });
    $(".closeR").on("click", function() {
        $(".popupR").fadeOut("slow");
    });

    function champObl(champs) {
        if (champs.val() == "" || champs.val().length < 3 && champs.attr('nomChamp') != "profil") {
            return "Veuillez remplir le champ " + champs.attr('nomChamp');
        } else if (champs.attr('nomChamp') == "login" && !champs.val().match(/^[a-zA-Z0-9]+$/i)) {
            return "Veillez rentrer un login valide";
        } else if (champs.attr('nomChamp') == "prenom et nom" && !champs.val().match(/^[a-z A-Z]+$/i)) {
            return "Veillez remplir votre prenom et nom correctement";
        } else {
            return "";
        }
    }

    $("form").each(function() {
        var idAlert = $(this).children("div.verif").attr("id");
        var idform = $(this).attr("id");
        $(this).children("input[type='submit']").each(function() {
            $(this).click(function() {
                var controle = 0;
                $('#' + idAlert + ' ul').children("li").remove();
                valid = true;
                $(this).prevAll().each(function() {
                    if ($(this).attr("type") == "text" || $(this).attr("type") == "password" || $(this).attr("nomChamp") == "profil") {
                        if (champObl($(this)) == "") {
                            controle++;
                        } else {
                            li = "<li>" + champObl($(this)) + "</li>";
                            controle--;
                            $('#' + idAlert + '').show();
                            $('#' + idAlert + ' ul').append(li);
                        }
                    }
                });
                if (controle == 4 && idform == "formInscript") {
                    valid = true;
                    $('#infoI').show();
                } else if (controle == 3 && idform == "formConnect") {
                    valid = true;
                    ('#infoI').hide();
                } else {
                    valid = false;
                }
                return valid;
            });
        });
    });
})