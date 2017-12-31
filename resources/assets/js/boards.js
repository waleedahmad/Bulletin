APP.INIT_BOARDS = () => {
    console.log('Board Init');
    let gridster;

    gridster = $(".gridster ul").gridster({
        widget_base_dimensions: [100, 55],
        widget_margins: [5, 5],
        max_rows: 140,
        extra_rows : 40,
        resize: {
            enabled: false,
        },

    }).data('gridster');

    gridster.disable();
};


APP.BOARD_EDITOR = () => {
    console.log('Board Editor Init');
    let gridster;
    let $new_block = $('#new-block'),
        $colorBtn = $('#bk-change'),
        $dltBtn = $('.remove-board'),
        $editbtn  = $('.edit-board'),
        $editor = $('.board-editor');

    gridster = $(".gridster ul").gridster({
        widget_base_dimensions: [100, 55],
        widget_margins: [5, 5],
        shift_widgets_up: false,
        shift_larger_widgets_down: false,
        max_rows: 140,
        extra_rows : 40,
        resize: {
            enabled: true,
            stop: function (e, ui, $widget) {
                updateBoardInfo($widget);
            },
        },
        draggable : {
            stop : function(event, ui){
                updateBoardInfo(ui.$player);
                $($editor).css({'z-index' : '5000'});
            }
        }
    }).data('gridster');



    $($new_block).on('click', function(e){
        bootbox.prompt("Enter Block Name", function(result){
            if(result){
                let $widget = gridster.add_widget(`
                <li class="card">
                    <div class="actions">
                        <span class="title">${result}</span>
                        <span class="glyphicon glyphicon-edit edit-board"></span>
                        <span class="glyphicon glyphicon-remove"></span>
                    </div>
                </li>
                
            `);
                createNewBoard($widget, result);
            }
        });
    });

    function createNewBoard($widget, name){
        $.ajax({
            type : 'POST',
            url : '/board',
            data : {
                name : name,
            },
            success : function(res){
                if(res.created){
                    createBoardInfo($widget, res.id);
                }else{
                    toastr.error('Unable to create board');
                }

            }
        });
    }

    function createBoardInfo($widget, id){
        $($widget).attr('data-id', id);
        $.ajax({
            type : 'POST',
            url : '/board/info',
            data : getWidgetData($widget),
            success : function(res){
                if(res.created){
                    toastr.success('New board created')
                }else{
                    toastr.error('Unable to create board');
                }
            }
        });
    }

    function updateBoardInfo($widget){
        $.ajax({
            type : 'POST',
            url : '/board/info/update',
            data : getWidgetData($widget),
            success : function(res){
                if(res.updated){
                    /*toastr.success('Board updated')*/
                }else{
                    toastr.error('Unable to update board');
                }
            }
        });
    }

    function getWidgetData($widget){
        return {
            id : $($widget).attr('data-id'),
            col : $($widget).attr('data-col'),
            row : $($widget).attr('data-row'),
            size_x : $($widget).attr('data-sizex'),
            size_y: $($widget).attr('data-sizey'),
        };
    }

    $($dltBtn).on('click', function(e){
        let id = $(this).attr('data-id'),
            $widget = $(this).parents('.card');

        bootbox.confirm({
            message : 'Are you sure you want to delete this board?',
            buttons: {
                cancel: {
                    label: 'Cancel',
                    className: 'btn-default'
                },
                confirm: {
                    label: 'Confirm',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                if(result){
                    $.ajax({
                        type : 'DELETE',
                        url : '/board',
                        data : {
                            id : getWidgetData($widget).id
                        },
                        success : function(res){
                            if(res.deleted){
                                gridster.remove_widget($widget, function(){
                                    window.location.reload();
                                });
                            }
                        }
                    });

                }
            }
        });
    });

    $($editbtn).on('click', function(e){
        let id = $(this).attr('data-id'),
            name = $(this).attr('data-name'),
            $widget = $(this).parents('.card');

        bootbox.prompt({
            title : 'Update Block Name',
            value : name,
            callback : function(result){
                if(result){
                    $.ajax({
                        type : 'POST',
                        url : '/board/update',
                        data : {
                            id : id,
                            name : result,
                        },
                        success : function(res){
                            if(res.updated) {
                                toastr.success('Board updated');
                                $($widget).find('.title').text(result);
                                $(this).attr('data-name', result);
                            }
                        }.bind(this)
                    });
                }
            }.bind(this)
        });
    });


    $($colorBtn).ColorPicker({
        mouseleave : function(e){
            console.log(e);
        },
        color: '#36465d',
        onShow: function (colpkr) {
            $(colpkr).fadeIn(500);
            return false;
        },
        onHide: function (colpkr) {
            console.log($(colpkr).find('.colorpicker_hex'));
            $(colpkr).fadeOut(500);
            return false;
        },
        onChange: function (hsb, hex, rgb) {
            $.ajax({
                type : 'POST',
                url : '/config/color',
                data : {
                    color : '#'+hex
                },
                success : function(res){
                    if(res.updated){
                        $('body').css({
                            'background' : '#'+hex
                        });
                    }
                }
            });
        }
    });
};