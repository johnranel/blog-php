<?php include_once("./includes/header.php"); ?>
<main>
    <section class="landing-banner">
        <div class="banner-picture">
            <img src="./assets/images/index/banner-photo.png" alt="Jane walking">
        </div>
        <div class="banner-content">
            <div class="message">
                <h1>Welcome to <br> Life Musings by Jane</h1>
                <p>A space where everyday thoughts turn into meaningful reflections. From personal stories to life lessons, I share musings on love, growth, and the little joys that make life beautiful. Grab a cup of coffee, take a deep breath, and explore the journey with me.</p>
            </div>
        </div>
    </section>
    <section class="travel">
        <h2>TRAVEL</h2>
        <div class="travel-images">
            <article>
                <a href="travel-post.php">
                    <figure>
                        <img src="./assets/images/index/travel/sydney.png" alt="Sydney">
                        <figcaption>Sydney</figcaption>
                    </figure>
                </a>
            </article>
            <article>
                <a href="travel-post.php">
                    <figure>
                        <img src="./assets/images/index/travel/singapore.png" alt="Singapore">
                        <figcaption>Singapore</figcaption>
                    </figure>
                </a>
            </article>
            <article>
                <a href="travel-post.php">
                    <figure>
                        <img src="./assets/images/index/travel/nepal.png" alt="Nepal">
                        <figcaption>Nepal</figcaption>
                    </figure>
                </a>
            </article>
            <article>
                <a href="travel-post.php">
                    <figure>
                        <img src="./assets/images/index/travel/hongkong.png" alt="Hong Kong">
                        <figcaption>Hong Kong</figcaption>
                    </figure>
                </a>
            </article>
            <article>
                <a href="travel-post.php">
                    <figure>
                        <img src="./assets/images/index/travel/thailand.png" alt="Thailand">
                        <figcaption>Thailand</figcaption>
                    </figure>
                </a>
            </article>
            <article>
                <a href="travel-post.php">
                    <figure>
                        <img src="./assets/images/index/travel/philippines.png" alt="Philippines">
                        <figcaption>Philippines</figcaption>
                    </figure>
                </a>
            </article>
            <a href="travel.php">VIEW MORE <img src="./assets/images/flex/arrow-right.png" alt="view more arrow"/></a>
        </div>
    </section>
    <section class="blog">
        <h2>BLOG</h2>
        <p>EVERYTHING YOU WANT TO KNOW</p>
        <div class="container">
            <div class="blog-posts">
                <article class="blog-item">
                    <a href="blog-post.php">
                        <figure>
                            <img src="./assets/images/index/blog/post1.jpg" alt="Woman embracing change">
                            <div class="overlay">
                                <span>Read More</span>
                            </div>
                            <figcaption>Woman embracing change</figcaption>
                        </figure>
                        <h3>Embracing Change: Why Life’s Uncertainties Make Us Stronger</h3>
                        <p>A personal take on adapting to life’s twists and turns.</p>
                    </a>
                </article>
                <article class="blog-item">
                    <a href="blog-post.php">
                        <figure>
                            <img src="./assets/images/index/blog/post2.png" alt="The view from a plane window">
                            <div class="overlay">
                                <span>Read More</span>
                            </div>
                            <figcaption>The view from a plane window</figcaption>
                        </figure>
                        <h3>Wanderlust Chronicles: My Most Memorable Travel Experience</h3>
                        <p>A story about a special trip and lessons learned along the way.</p>
                    </a>
                </article>
                <article class="blog-item">
                    <a href="blog-post.php">
                        <figure>
                            <img src="./assets/images/index/blog/post3.png" alt="Wardrobe dresses ootd">
                            <div class="overlay">
                                <span>Read More</span>
                            </div>
                            <figcaption>Wardrobe dresses ootd</figcaption>
                        </figure>
                        <h3>5 Wardrobe Staples That Never Go Out of Style</h3>
                        <p>A guide to timeless fashion essentials.</p>
                    </a>
                </article>
                <article class="blog-item">
                    <a href="blog-post.php">
                        <figure>
                            <img src="./assets/images/index/blog/post4.png" alt="A little flower sunset">
                            <div class="overlay">
                                <span>Read More</span>
                            </div>
                            <figcaption>A little flower sunset</figcaption>
                        </figure>
                        <h3>How to Romanticize Your Life and Enjoy the Little Moments</h3>
                        <p>Tips on making everyday life feel special.</p>
                    </a>
                </article>
                <a href="blog.php">VIEW MORE <img src="./assets/images/flex/arrow-right.png" alt="view more arrow"/></a>
            </div>
        </div>
    </section>
    <section class="ootd">
        <h2>OOTD</h2>
        <div class="container">
            <div class="ootd-container">
                <figure>
                    <img src="./assets/images/index/ootd/post1.png" alt="Summer outfit number 1" />
                    <figcaption>Summer outfit number 1</figcaption>
                </figure>
                <figure>
                    <img src="./assets/images/index/ootd/post2.png" alt="Summer outfit number 2" />
                    <figcaption>Summer outfit number 2</figcaption>
                </figure>
                <figure>
                    <img src="./assets/images/index/ootd/post3.png" alt="Summer outfit number 3" />
                    <figcaption>Summer outfit number 3</figcaption>
                </figure>
                <figure>
                    <img src="./assets/images/index/ootd/post4.png" alt="Summer outfit number 4" />
                    <figcaption>Summer outfit number 4</figcaption>
                </figure>
            </div>
            <a href="blog.php">VIEW MORE <img src="./assets/images/flex/arrow-right.png" alt="view more arrow"/></a>
        </div>
        <div class="image-preview" role="dialog" aria-modal="true">
            <div class="container">
                <button><img src="./assets/images/flex/close-white.png" alt="Close image preview"></button>
                <img class="preview-image" src="" alt="">
            </div>
        </div>
    </section>
</main>
<?php include_once("./includes/footer.php"); ?>