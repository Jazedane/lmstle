<script>
$(function() {
    // Easy pie charts
    $('.chart').easyPieChart({
        animate: 1000
    });
});
</script>

<script>
$(function() {
    $('.tooltip').tooltip();
    $('.tooltip-left').tooltip({
        placement: 'left'
    });
    $('.tooltip-right').tooltip({
        placement: 'right'
    });
    $('.tooltip-top').tooltip({
        placement: 'top'
    });
    $('.tooltip-bottom').tooltip({
        placement: 'bottom'
    });
    $('.popover-left').popover({
        placement: 'left',
        trigger: 'hover'
    });
    $('.popover-right').popover({
        placement: 'right',
        trigger: 'hover'
    });
    $('.popover-top').popover({
        placement: 'top',
        trigger: 'hover'
    });
    $('.popover-bottom').popover({
        placement: 'bottom',
        trigger: 'hover'
    });
    $('.notification').click(function() {
        var $id = $(this).attr('id');
        switch ($id) {
            case 'notification-sticky':
                $.jGrowl("Stick this!", {
                    sticky: true
                });
                break;
            case 'notification-header':
                $.jGrowl("A message with a header", {
                    header: 'Important'
                });
                break;
            default:
                $.jGrowl("Hello world!");
                break;
        }
    });
});
</script>

<script>
$(function() {
    // Ckeditor standard
    $('textarea#ckeditor_standard').ckeditor({
        width: '98%',
        height: '150px',
        toolbar: [{
                name: 'document',
                items: ['Source', '-', 'NewPage', 'Preview', '-', 'Templates']
            }, // Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
            ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo',
                'Redo'
            ], // Defines toolbar group without name.
            {
                name: 'basicstyles',
                items: ['Bold', 'Italic']
            }
        ]
    });
    $('textarea#ckeditor_full').ckeditor({
        width: '98%',
        height: '150px'
    });
});
</script>

<script type="text/javascript">
$(function() {
    $('#da-thumbs > li').hoverdir();
});
</script>
<script>
$(function() {
    $(".datepicker").datepicker();
    $(".uniform_on").uniform();
    $(".chzn-select").chosen();
    $('#rootwizard .finish').click(function() {
        alert('Finished!, Starting over!');
        $('#rootwizard').find("a[href*='tab1']").trigger('click');
    });
});
</script>