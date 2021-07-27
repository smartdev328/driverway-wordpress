const UserBack = () => {
    Userback = window.Userback || {};
    Userback.access_token = userback_data.api_key;

    Userback.custom_data = {
        project_id: userback_data.project,
    };

    (function (id) {
        var s = document.createElement('script');
        s.async = 1;
        s.src = 'https://static.userback.io/widget/v1.js';
        var parent_node = document.head || document.body;
        parent_node.appendChild(s);
    })('userback-sdk');
}

document.addEventListener("DOMContentLoaded",() => {
    setTimeout(() => UserBack(), userback_data.timeout);
})
//# sourceMappingURL=userback.js.map
