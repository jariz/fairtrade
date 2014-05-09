(function($){

    $(document).ready(function() {
        setTimeout(function() {
            $(".alert-floating").addClass("in");
        }, 200)
    });

    $(".forgot-password").click(function() {
        $(".form-login").slideUp(function() {
            $(".form-forgot").slideDown();
        })
        return false;
    });

    $(".link-login").click(function() {
        $(".form-forgot").slideUp(function() {
            $(".form-login").slideDown();
        })
        return false;
    });

})(jQuery);
