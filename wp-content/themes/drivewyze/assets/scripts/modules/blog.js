const posts = {
    select: function () {
        $(".blog-select").change(function() {
            window.location.href = $(this).val()
        });
    },

    load_more: function () {
        let btn_load_post = $('#load-post'),
            post_type = btn_load_post.attr('data-type'),
            post_orderby = btn_load_post.attr('data-orderby'),
            post_order = btn_load_post.attr('data-order'),
            post_category = btn_load_post.attr('data-category'),
            post_count = btn_load_post.attr('data-post'),
            post_count_per_page = btn_load_post.attr('data-count'),
            list = $('.load-posts-block'),
            page = 1;

        function toggle_load_more(response) {
            if (response) {
                let response_count = $.parseHTML(response);

                response_count = response_count.length / 2;
                (response_count < post_count_per_page) ? btn_load_post.hide() : btn_load_post.show();
                (list.children().length >= post_count) ? btn_load_post.hide() : '';
            } else {
                btn_load_post.hide();
            }
        }

        function ajax_load() {
            page++;

            $.ajax({
                type: "POST",
                data: {
                    paged: page,
                    type: post_type,
					orderby: post_orderby,
					order: post_order,
                    category: post_category,
                    posts_per_page: post_count_per_page,
                    action: 'filters_ajax',
                },
                dataType: "html",
                url: themeVars.ajaxurl,

                beforeSend: function () {
                    $('.ajax-preloader').show();
                },
                success: function (response) {
                    $(response).appendTo(list);
                    toggle_load_more(response);
                },
                complete: function () {
                    $('.ajax-preloader').hide();
                },
            });
		}

        btn_load_post.on('click', function () {
            ajax_load();
        });
    },
};

export default posts;
