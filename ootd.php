<?php include_once("./includes/header.php"); ?>
<main>
    <section class="ootd">
        <div class="container">
            <h2>OOTD</h2>
            <p>FASHION GALLERY GUIDE</p>
            <div class="filters">
                <button data-filter="all">ALL</button>
                <button data-filter="spring">SPRING</button>
                <button data-filter="summer">SUMMER</button>
                <button data-filter="winter">WINTER</button>
                <button data-filter="fall">FALL</button>
            </div>
            <div class="ootd-posts">
            </div>
            <div class="image-preview" role="dialog" aria-modal="true">
                <div class="container">
                    <button><img src="./assets/images/flex/close-white.png" alt="Close image preview"></button>
                    <img class="preview-image" src="" alt="">
                </div>
            </div>
        </div>
    </section>
</main>
<?php include_once("./includes/footer.php"); ?>