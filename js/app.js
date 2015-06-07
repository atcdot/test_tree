$(function () {

    function on() {
        $('.has-child>p').on('click', function () {
            var has_child_clicked = $('#' + $(this).parent().attr('id'));
            if (has_child_clicked.hasClass('not-received')) {
                has_child_clicked.addClass('visible').removeClass('not-received');
                var item_id = $(this).parent('li').attr('id');
                $.ajax({
                    url: "receive_data.php",
                    type: 'post',
                    cache: false,
                    dataType: "json",
                    data: {item_id: item_id},
                    success: function (data) {
                        $.each(data, function (index, item) {
                            var new_item;
                            if (item.has_child == 1) {
                                new_item = $('<li id="' + item.id + '"></li>');
                                new_item.appendTo(has_child_clicked.children('ul'));
                                $('<p>' + item.name + '</p><ul></ul>').appendTo(new_item);
                                new_item.addClass('has-child not-received');
                            } else {
                                new_item = $('<li id="' + item.id + '">' + item.name + '</li>');
                                new_item.appendTo(has_child_clicked.children('ul'));
                            }
                        });
                        $('.has-child>p').off('click');
                        on();
                    }
                });

            } else {
                has_child_clicked.toggleClass('visible hidden');
                has_child_clicked.children('ul').slideToggle();
            }
        });
    }

    on();

});