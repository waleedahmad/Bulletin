let gridster;
let $new_block = $('#new-block'),
    $serialize = $('#serialize');

gridster = $(".gridster > ul").gridster({
    widget_margins: [10, 10],
    widget_base_dimensions: [140, 140],
    min_cols: 6,
    ie8compatmode: true,
    resize: {
        enabled : true,
        stop: function(e, ui, $widget){
            console.log($widget, ui);
        }
    }
}).data('gridster');

$($new_block).on('click', function(e){
    gridster.add_widget('<li></li>');
});

$($serialize).on('click', function(e){
    console.log(gridster.serialize());
});




