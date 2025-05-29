$(document).ready(function () {
    loadDashboardStats();

    async function loadDashboardStats() {
        let postStatsRes = await ajaxRequest("/controllers/post.php?posts_count=true");
        let postStats = JSON.parse(postStatsRes);
        postStats.map(function(value) {
            $(`.statistics>.${value.type}>span`).text(value.count);
        });


        let userStatsRes = await ajaxRequest("/controllers/user.php?user_count=true");
        let userStats = JSON.parse(userStatsRes);
        $(`.statistics>.user>span`).text(userStats.count);
    }

    async function ajaxRequest(request_link) {
        let res_ajax;
        await $.ajax({
            method: "GET",
            url: `${request_link}`,
            contentType: false,
            processData: false,
            success: function (res) {
                res_ajax = res;
            }
        });

        return res_ajax;
    }
});