const posts = {
    select: function () {
        $(".blog-select").click(function() {
            var open = $(this).data("isopen");
            if(open) {
                window.location.href = $(this).val()
            }
            $(this).data("isopen", !open);
        });
    },
};

export default posts;