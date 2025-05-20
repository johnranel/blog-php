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
                <a data-weather="spring">
                    <figure>
                        <img src="./assets/images/ootd/thumbnail/post1.jpg" alt="Summer outfit number 1">
                        <figcaption>Summer outfit number 1</figcaption>
                    </figure>
                    <p>10 April 2025</p>
                    <h3>Daily Outfit</h3>
                </a>
                <a data-weather="winter">
                    <figure>
                        <img src="./assets/images/ootd/thumbnail/post6.jpg" alt="Summer outfit number 6">
                        <figcaption>Summer outfit number 6</figcaption>
                    </figure>
                    <p>9 April 2025</p>
                    <h3>Daily Outfit</h3>
                </a>
                <a data-weather="summer">
                    <figure>
                        <img src="./assets/images/ootd/thumbnail/post3.jpg" alt="Summer outfit number 3">
                        <figcaption>Summer outfit number 3</figcaption>
                    </figure>
                    <p>8 April 2025</p>
                    <h3>Daily Outfit</h3>
                </a>
                <a data-weather="fall">
                    <figure>
                        <img src="./assets/images/ootd/thumbnail/post8.jpg" alt="Summer outfit number 8">
                        <figcaption>Summer outfit number 8</figcaption>
                    </figure>
                    <p>7 April 2025</p>
                    <h3>Daily Outfit</h3>
                </a>
                <a data-weather="fall">
                    <figure>
                        <img src="./assets/images/ootd/thumbnail/post5.jpg" alt="Summer outfit number 5">
                        <figcaption>Summer outfit number 5</figcaption>
                    </figure>
                    <p>6 April 2025</p>
                    <h3>Daily Outfit</h3>
                </a>
                <a data-weather="spring">
                    <figure>
                        <img src="./assets/images/ootd/thumbnail/post2.jpg" alt="Summer outfit number 2">
                        <figcaption>Summer outfit number 2</figcaption>
                    </figure>
                    <p>5 April 2025</p>
                    <h3>Daily Outfit</h3>
                </a>
                <a data-weather="winter">
                    <figure>
                        <img src="./assets/images/ootd/thumbnail/post7.jpg" alt="Summer outfit number 7">
                        <figcaption>Summer outfit number 7</figcaption>
                    </figure>
                    <p>4 April 2025</p>
                    <h3>Daily Outfit</h3>
                </a>
                <a data-weather="summer">
                    <figure>
                        <img src="./assets/images/ootd/thumbnail/post4.jpg" alt="Summer outfit number 4">
                        <figcaption>Summer outfit number 4</figcaption>
                    </figure>
                    <p>3 April 2025</p>
                    <h3>Daily Outfit</h3>
                </a>
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