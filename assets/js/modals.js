$(document).on("click", ".create-post", function(event) {
    event.preventDefault();
    let modal_name = $(this).attr("data-modal_name");
    $(".form-modal[data-modal_name='" + modal_name + "']").css("display", "block");
});

$(document).on("click", ".edit-post", async function(event) {
    event.preventDefault();
    let modal_name = $(this).attr("data-modal_name");
    $(".form-modal[data-modal_name='" + modal_name + "']").css("display", "block");
});

$(document).on("click", ".close-modal", function() {
    let modal_name = $(this).attr("data-modal_name");
    $(".form-modal[data-modal_name='" + modal_name + "']").css("display", "none");
});

$(document).on("click", ".delete-post", function(event) {
    event.preventDefault();
    let modal_name = $(this).attr("data-modal_name");
    $(".form-modal[data-modal_name='" + modal_name + "']").css("display", "block");
});