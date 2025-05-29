$(document).ready(function () {
    let currentURL = window.location.pathname;
    let currentParameter = window.location.search;
    let currentPage = currentURL.substring(1, currentURL.length - 4);
    let postContainer = (currentPage === "travel-post") ? ".travel-post > .container" : ".blog-post > .container";
    
    loadPostDetails();

    async function loadPostDetails() {
        $(postContainer).empty();
        let postDetailsRes = await ajaxRequest(currentParameter);
        let postDetails = JSON.parse(postDetailsRes);
        let postLayout = "";
        if(!postDetails.hasOwnProperty("error_message")) {
            postLayout = (currentPage === "travel-post") ? travelPostLayout(postDetails) : blogPostLayout(postDetails);
        } else {
            postLayout = `<div>${postDetails.error_message}</div>`
        }
        $(postContainer).html(postLayout);
    }

    function blogPostLayout(postDetails) {
        return `
            <article>
                <p>${postDetails.date}</p>
                <h2>${postDetails.title}</h2>
                <figure>
                    <img src="${postDetails.image_url}" alt="${postDetails.title}">
                    <figcaption>${postDetails.title}</figcaption>
                </figure>
                <p>
                    ${postDetails.content}
                </p>
            </article>
        
        `;
    }

    function travelPostLayout(postDetails) {
        return `
            <article>
                <div class="images">
                    <figure>
                        <img src="${postDetails.image_url}" alt="${postDetails.title}">
                        <figcaption>${postDetails.title}</figcaption>
                    </figure>
                </div>
                <div class="stay-at-details">
                    <h2>${postDetails.title}</h2>
                    <h3>Details</h3>
                    <ul>
                        <li><p>${postDetails.content}</p></li>
                    </ul>
                </div>
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