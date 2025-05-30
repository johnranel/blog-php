$(document).ready(function() {
    let currentURL = window.location.pathname;
    let type = currentURL.substring(7, currentURL.length - 4);

    loadPostsTable(10, 0);
    loadPagination();

    async function loadPostsTable(limit, offset) {
        $(".table-body").empty();
        let table_data_res = await ajaxRequest("GET", "", `?type=${type}&limit=${limit}&offset=${offset}`);
        let table_data = JSON.parse(table_data_res);
        let table_rows = "";
        if(table_data.length !== 0 && !table_data.hasOwnProperty("error_message")) {
            for(let i = 0; i < table_data.length; i++) {
                table_rows += `
                    <tr>
                        <td>${table_data[i].title}</td>
                        ${type === "blog" ? `<td>${table_data[i].short_description}</td>` : "" }
                        <td>${table_data[i].category}</td>
                        <td>${table_data[i].date}</td>
                        <td>
                            <button class="edit-post" data-modal_name="form_posts_modal" data-id=${table_data[i].id}>Edit</button>
                            <button class="delete-post-btn" data-modal_name="delete_post_modal" data-id=${table_data[i].id} data-image_id=${table_data[i].image_id} data-image_url=${table_data[i].image_url}>Delete</button>
                        </td>
                    </tr>
                `;
            }
        } else if(table_data.hasOwnProperty("error_message")) {
            table_rows += `
                <tr>
                    <td ${type === "blog" ? 'colspan="5"' : 'colspan="4"' } >${table_data.error_message}</td>
                </tr>
            `;
        } else {
            table_rows += `
                <tr>
                    <td ${type === "blog" ? 'colspan="5"' : 'colspan="4"' } >No data available.</td>
                </tr>
            `;
        }
        
        $(".table-body").append(table_rows);
    }

    async function loadPagination() {
        $(".pagination>ul").empty();
        let pagination_data_res = await ajaxRequest("GET", "", `?posts_count=true`);
        let pagination_data_array = JSON.parse(pagination_data_res);
        let pagination_data = pagination_data_array.find(function(obj) {
            return obj.type === type;
        });
        
        let pagination_count = Math.ceil(pagination_data.count/10);
        let offset = 0;
        for(let i = 1; i <= pagination_count; i++) {
            $(".pagination>ul").append(`<li data-offset="${offset}">${i}</li>`);
            offset += 10;
        }
    }

    $(document).on("click", ".pagination>ul>li", function () {
        let offset = $(this).attr("data-offset");
        loadPostsTable(10, offset);
    });

    $(document).on("click", ".create-post", function(event) {
        $("form")[0].reset();
        $(this).removeAttr("data-id");
        $(this).removeAttr("data-image_url");
        $(this).removeAttr("data-image_id");
        toggleFormClass("create");
    });

    $(document).on("submit", "form", async function (event) {
        event.preventDefault();
        let form_data = new FormData(this);
        form_data.append("type", type);
        if($(this).hasClass("create")) {
            await ajaxRequest("POST", form_data, "?create=true");
        } else {
            form_data.append("id", $(this).attr("data-id"));
            form_data.append("image_url", $(this).attr("data-image_url"));
            form_data.append("image_id", $(this).attr("data-image_id"));
            await ajaxRequest("POST", form_data, "?update=true");
        }
        await loadPostsTable(10, 0);
        $(".close-modal").trigger("click");
    });

    $(document).on("click", ".edit-post", async function () {
        let post_id = $(this).attr("data-id");
        $("form").attr("data-id", post_id);
        toggleFormClass("update");
        let post_db_res = await ajaxRequest("GET", "", `?id=${post_id}`);
        let post_data = JSON.parse(post_db_res);
        $("form").attr("data-image_url", post_data["image_url"]);
        $("form").attr("data-image_id", post_data["image_id"]);
        setInputData(post_data);
    });

    $(document).on("click", ".delete-post-btn", function () {
        let post_id = $(this).attr("data-id");
        let image_id = $(this).attr("data-image_id");
        let image_url = $(this).attr("data-image_url");
        $(".delete-post-confirm").attr("data-id", post_id);
        $(".delete-post-confirm").attr("data-image_id", image_id);
        $(".delete-post-confirm").attr("data-image_url", image_url);
    });

    $(document).on("click", ".delete-post-confirm", async function () {
        let post_id = $(this).attr("data-id");
        let image_id = $(this).attr("data-image_id");
        let image_url = $(this).attr("data-image_url");
        await ajaxRequest("DELETE", "", `?id=${post_id}&image_id=${image_id}&image_url=${image_url}`);
        await loadPostsTable(10, 0);
        $(".close-modal").trigger("click");
    });

    function toggleFormClass(add_class_name) {
        $remove_class = add_class_name === "create" ? "update" : "create";
        if($("form").hasClass($remove_class))
            $("form").removeClass($remove_class);
        $("form").addClass(add_class_name);
    }

    function setInputData(post_data) {
        $("input[name=title]").val(post_data.title);
        $("input[name=short_description]").val(post_data.short_description);
        $("textarea[name=content]").val(post_data.content);
        $("select[name=category]").val(post_data.category);
        $("input[name=date]").val(post_data.date);
    }

    async function ajaxRequest(method, form_data, request_data) {
        let res_ajax;
        await $.ajax({
            method: method,
            url: `/controllers/post.php${request_data}`,
            data: form_data,
            contentType: false,
            processData: false,
            success: function (res) {
                res_ajax = res;
            }
        });

        return res_ajax;
    }
});