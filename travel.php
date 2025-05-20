<?php include_once("./includes/header.php"); ?>
<main>
    <section class="travel">
        <div class="container">
            <h2>TRAVEL</h2>
            <p>A GUIDE FOR YOUR OWN JOURNEY</p>
            <div class="filters">
                <button data-filter="all">ALL</button>
                <button data-filter="cultural">CULTURAL</button>
                <button data-filter="nature">NATURE</button>
                <button data-filter="city">CITY</button>
                <button data-filter="spiritual">SPIRITUAL</button>
            </div>
            <input type="text" name="search" placeholder="Enter a keyword">
            <div class="travel-posts">
                <article data-type="city">
                    <a href="travel-post.php">
                        <figure>
                            <img src="./assets/images/travel/thumbnail/sydney.png" alt="Sydney">
                            <div class="overlay">
                                <span>Read More</span>
                            </div>
                            <figcaption>Sydney</figcaption>
                        </figure>
                    </a>
                </article>
                <article data-type="city">
                    <a href="travel-post.php">
                        <figure>
                            <img src="./assets/images/travel/thumbnail/singapore.png" alt="Singapore">
                            <div class="overlay">
                                <span>Read More</span>
                            </div>
                            <figcaption>Singapore</figcaption>
                        </figure>
                    </a>
                </article>
                <article data-type="spiritual">
                    <a href="travel-post.php">
                        <figure>
                            <img src="./assets/images/travel/thumbnail/nepal.png" alt="Nepal">
                            <div class="overlay">
                                <span>Read More</span>
                            </div>
                            <figcaption>Nepal</figcaption>
                        </figure>
                    </a>
                </article>
                <article data-type="cultural">
                    <a href="travel-post.php">
                        <figure>
                            <img src="./assets/images/travel/thumbnail/hongkong.png" alt="Hong Kong">
                            <div class="overlay">
                                <span>Read More</span>
                            </div>
                            <figcaption>Hong Kong</figcaption>
                        </figure>
                    </a>
                </article>
                <article data-type="spiritual">
                    <a href="travel-post.php">
                        <figure>
                            <img src="./assets/images/travel/thumbnail/thailand.png" alt="Thailand">
                            <div class="overlay">
                                <span>Read More</span>
                            </div>
                            <figcaption>Thailand</figcaption>
                        </figure>
                    </a>
                </article>
                <article data-type="nature">
                    <a href="travel-post.php">
                        <figure>
                            <img src="./assets/images/travel/thumbnail/philippines.png" alt="Philippines">
                            <div class="overlay">
                                <span>Read More</span>
                            </div>
                            <figcaption>Philippines</figcaption>
                        </figure>
                    </a>
                </article>
            </div>
        </div>
    </section>
</main>
<?php include_once("./includes/footer.php"); ?>