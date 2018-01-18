$(function() {
    $("#alertI, #alertC").hide();
    $(".menu-icon").on("click", function() {
        if ($(".util").attr("class") == "util cacher") {
            $(".util").addClass("afficher");
            $(".util").removeClass("cacher");
        } else if ($(".util").attr("class") == "util afficher") {
            $(".util").addClass("cacher");
            $(".util").removeClass("afficher");
        }
    });

    $(window).on("scroll", function() {
        if ($(window).scrollTop()) {
            $("header nav").addClass("black");
        } else {
            $("header nav").removeClass("black");
        }
    });
    $(".open").on("click", function() {
        $(".popup").fadeIn("slow");
        return false;
    });
    $(".close").on("click", function() {
        $(".popup").fadeOut("slow");
    });

    function champObl(champs) {
        if (champs.val() == "" || champs.val().length < 3 && champs.attr('nomChamp') != "profil") {
            return "Veuillez remplir le champ " + champs.attr('nomChamp');
        } else if (champs.attr('nomChamp') == "login" && !champs.val().match(/^[a-zA-Z0-9]+$/i)) {
            return "Veillez rentrer un login valide";
        } else if (champs.attr('nomChamp') == "prenom et nom" && !champs.val().match(/^[a-zA-Z]+{2,} [a-zA-Z]+{2,} [a-zA-Z]+{2,} [a-zA-Z]+$/i)) {
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
                } else if (controle == 3 && idform == "formConnect") {
                    valid = true;
                } else {
                    valid = false;
                }
                return valid;
            });
        });
    });
})