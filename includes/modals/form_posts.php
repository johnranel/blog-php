<div class="form-modal" data-modal_name="form_posts_modal" role="dialog" aria-modal="true">
    <div class="container">
        <div class="modal-inner">
            <button class="close-modal" data-modal_name="form_posts_modal" ><img src="<?php echo SITE_URL; ?>/assets/images/flex/close.png" alt="Close image preview"></button>
            <form class="posts_form form-posts" enctype="multipart/form-data">
                <div>
                    <label for="post_image">Post image</label>
                    <input type="file" name="post_image" accept=".png,.jpeg,.jpg,.webp"/>
                </div>
                <div>
                    <label for="name">Title</label>
                    <input type="text" name="title" placeholder="Enter title here" required/>
                </div>
                <?php
                    $elems = "";
                    if(SITE_PATH === "/admin/blog") {
                        $elems .= '
                            <div>
                                <label for="short_description">Short Description</label>
                                <input type="text" name="short_description" placeholder="Enter short description here" required/>
                            </div>
                        ';
                    }
                    if(SITE_PATH === "/admin/blog" || SITE_PATH === "/admin/travel") {
                        $elems .= '
                            <div>
                                <label for="content">Content</label>
                                <textarea name="content" rows="10" placeholder="Enter content here" required></textarea>
                            </div>
                        ';
                    }
                    echo $elems;
                ?>
                <div>
                    <label for="category">Category</label>
                    <select type="text" name="category" required>
                        <option>Select a category.</option>
                        <?php
                            $categories = ["cultural","nature","city","spiritual"];
                            for($i = 0; $i < count($categories); $i++) {
                                echo "<option value=" . $categories[$i] . ">" . strtoupper($categories[$i]) . "</option>";
                            }
                        ?>
                    </select>
                </div>
                <div>
                    <label for="date">Date</label>
                    <input type="date" name="date" required/>
                </div>
                <button type="submit" class="form-posts-btn">Create</button>
            </form>
        </div>
    </div>
</div>