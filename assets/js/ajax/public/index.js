$(document).ready(function() {
    loadSection("travel", 6);
    loadSection("blog", 4);
    loadSection("ootd", 4);


    async function loadSection(type, limit) {
        let posts_data_res = await ajaxRequest(`?type=${type}&limit=${limit}&offset=0`);
        let posts_data = JSON.parse(posts_data_res);
        let posts_cards = "";
        if(posts_data.length !== 0) {
            for(let i = 0; i < posts_data.length; i++) {
                if(type === "travel")
                    posts_cards += travelImages(posts_data[i]);
                if(type === "blog")
                    posts_cards += blogPosts(posts_data[i]);
                if(type === "ootd")
                    posts_cards += ootdImages(posts_data[i]);
            }
        } else {
            posts_cards += `<div class="empty-message">No Post Available.</div>`;
        }
        let elem = (type === "travel") ? ".travel-images" : (type === "blog") ? ".blog-posts" : ".ootd-container";
        $(elem).append(posts_cards);
    }

    function travelImages(posts_data) {
        return `
            <article>
                <a href="travel-post.php?slug_title=${posts_data.slug_title}">
                    <figure>
                        <img src="${posts_data.image_url}" alt="${posts_data.title}">
                        <figcaption>${posts_data.title}</figcaption>
                    </figure>
                </a>
            </article>
        `;
    }

    function blogPosts(posts_data) {
        return `
            <article class="blog-item">
                <a href="blog-post.php?slug_title=${posts_data.slug_title}">
                    <figure>
                        <img src="${posts_data.image_url}" alt="${posts_data.title}">
                        <div class="overlay">
                            <span>Read More</span>
                        </div>
                        <figcaption>${posts_data.title}</figcaption>
                    </figure>
                    <h3>${posts_data.title}</h3>
                    <p>${posts_data.short_description}</p>
                </a>
            </article>
        `;
    }

    function ootdImages(posts_data) {
        return `
            <figure>
                <img src="${posts_data.image_url}" alt="${posts_data.title}" />
                <figcaption>${posts_data.title}</figcaption>
            </figure>
        `;
    }

    async function ajaxRequest(request_data) {
        let res_ajax;
        await $.ajax({
            method: "GET",
            url: `/controllers/post.php${request_data}`,
            contentType: false,
            processData: false,
            success: function (res) {
                res_ajax = res;
            }
        });

        return res_ajax;
    }
});