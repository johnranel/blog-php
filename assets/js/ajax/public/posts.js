$(document).ready(function () {
    let currentURL = window.location.pathname;
    let currentPage = currentURL.substring(1, currentURL.length - 4);
    let postDisplay = (currentPage === "travel" || currentPage === "blog") ? 6 : (currentPage === "ootd") ? 10 : 0;
    let postContainer = (currentPage === "travel") ? ".travel-posts" : (currentPage === "blog") ? ".blog-posts" : (currentPage === "ootd") ? ".ootd-posts" : "" ;

    loadPostCards(postDisplay, 0);

    async function loadPostCards(limit, offset) {
        let postsDataRes = await ajaxRequest(`?type=${currentPage}&limit=${limit}&offset=${offset}`);
        loopThroughPostsData(postsDataRes);
    }

    $(document).on("click", ".filters > button", async function () {
        let filter_key = $(this).attr("data-filter");
        if(filter_key == "all") {
            loadPostCards(postDisplay, 0, postContainer);
        } else {
            searchPosts(filter_key);
        }
    });

    $(document).on("keyup", ".container > input", async function() {
        let search_key = $(this).val();
        searchPosts(search_key);
    });

    async function searchPosts(search_key) {
        let postsDataRes = await ajaxRequest(`?type=${currentPage}&search_key=${search_key}`);
        loopThroughPostsData(postsDataRes);
    }

    function loopThroughPostsData(postsDataRes) {
        let posts_data = JSON.parse(postsDataRes);
        $(postContainer).empty();
        let post_cards = "";
        if(posts_data.length !== 0) {
            for(let i = 0; i < posts_data.length; i++) {
                if(currentPage === "travel") {
                    post_cards += travelPostsCards(posts_data[i]);
                }
                if(currentPage === "ootd") {
                    post_cards += ootdPostsCards(posts_data[i]);
                }

                if(currentPage === "blog") {
                    post_cards += blogPostsCards(posts_data[i]);
                }
            }
        } else {
            post_cards += `<div class="empty-message">No Post Available.</div>`;
        }
        $(postContainer).append(post_cards);
    }

    function travelPostsCards(posts_data) {
        return `
            <article data-type="${posts_data.category}">
                <a href="travel-post.php?slug_title=${posts_data.slug_title}">
                    <figure>
                        <img src="${posts_data.image_url}" alt="${posts_data.title}">
                        <div class="overlay">
                            <span>Read More</span>
                        </div>
                        <figcaption>${posts_data.title}</figcaption>
                    </figure>
                </a>
            </article>
        `;
    }

    function ootdPostsCards(posts_data) {
        return `
            <a data-weather="${posts_data.category}">
                <figure>
                    <img src="${posts_data.image_url}" alt="${posts_data.title} ${posts_data.category}">
                    <figcaption>${posts_data.title} ${posts_data.category}</figcaption>
                </figure>
                <p>${posts_data.date}</p>
                <h3>${posts_data.title}</h3>
            </a>
        `;
    }

    function blogPostsCards(posts_data) {
        return `
            <article data-category="${posts_data.category}">
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