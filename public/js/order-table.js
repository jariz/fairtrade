/**
 *
 * Author: Dmitri Chebotarev
 * Version: 1.0
 * Date: 7-5-2014
 * ==========================================================
 * Description: This script handles the interaction of
 * the order buttons ('up' and 'down') and also the Ajax call
 * to save the new order.
 *===========================================================
 * Note: This script will not work when some of the elements used
 * are not present on the page!
 *
 */

(function ($) {

 $(function(){
    $(document)
        .on('click', '[data-func="up"]', rowUp)
        .on('click', '[data-func="down"]', rowDown)
        .on('click', '[data-func="save"]', save)
    ;

    function init(){
        $('[data-func="save"]').tooltip({
           trigger: 'manual',
            delay: { show: 500, hide: 100 }
        });
        orderRows();
    }


    function orderRows(){
        var wrapper = $('#table');

        wrapper.find('tbody tr').sort(function(a,b) {
            return a.dataset.order > b.dataset.order;
        }).appendTo( wrapper );

        setButtons();
        wrapper
            .hide()
            .removeClass('hide')
            .fadeIn('fast');

        $('.load-message').hide();

    }

    /**
    *  Disable buttons that cannot be used.
    */
   function setButtons(){
       // Reset buttons
       $('[data-func="up"], [data-func="down"]').removeAttr( 'disabled' );
       // Disable "up" button in the top row
       $('#table tbody tr:first > td').find('[data-func="up"]').attr('disabled', true);
       // Disable "down" button in the bottom row
       $('#table tbody tr:last > td').find('[data-func="down"]').attr('disabled', true);
   }

     /**
      * Move current row up
      */
    function rowUp(){
        var $this = $(this);
        // Get current row
        var row = $this.closest('tr');
        // Insert current row before previous row
        $(row).insertBefore( row.prev() );

        // Update order values
        updateOrderValues();
        // Set buttons correct
        setButtons();
    }

     /**
      * Move current row down
      */
    function rowDown(){
        var $this = $(this);
        // Get current row
        var row = $(this).closest('tr');
        // Insert current row after the next row
        $(row).insertAfter( row.next() );

        // Update order values
        updateOrderValues();
        // Set buttons correct
        setButtons();
    }

    /**
     * Change the order integer values of the table rows
     */
   function updateOrderValues(){

       // Select all rows
       var rows = $('#table tbody tr');

      // Loop trough all rows
      rows.each( function(index) {
          // Change the order value
          $(this).attr('data-order', index);
      });
   }

   function save(){
       $('[data-func="save"]').attr('disabled', true);
      var rows = $('#table tbody tr');
      var data = [];

      rows.each( function() {

        data.push( {
            id: $(this).attr('data-id'),
            order: $(this).attr('data-order')
        } );

      } );

      $.ajax({
        url: '/dashboard/pages/reorder',
        data: {data: data},
        type: 'POST',
        dataType: 'json',
        success: function(data){
            $('[data-func="save"]').removeAttr('disabled')
                .tooltip('show');

            setTimeout(function(){
                $('[data-func="save"]').tooltip('hide');
            }, 3000)

        }
      });
   }

    init();
   });
}(jQuery));