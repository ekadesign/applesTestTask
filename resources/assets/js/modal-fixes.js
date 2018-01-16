
var modalZIndex = 1000;

$('body').on( 'shown.bs.modal', function( e ) {
    var $thisModal = $(e.target);

    $thisModal.css('z-index', modalZIndex );
    $thisModal.data('bs.modal').$backdrop.css('z-index', modalZIndex - 5);

    modalZIndex += 10;

});

$('body').on( 'hidden.bs.modal', function( e ) {
    if($('.modal:visible').length) {
        $('body').addClass('modal-open');
    }
});


$(".modal-content").hover(
    function() {
        $(".modal-backdrop").css("opacity","1");
        $(".modal").css("cursor","url('/images/cursor-close.png'), -webkit-zoom-out");
    }, function () {
        $(".modal-backdrop").css("opacity",".94");
    }
);
