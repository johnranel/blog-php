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
            </div>
        </div>
    </section>
</main>
<?php include_once("./includes/footer.php"); ?>