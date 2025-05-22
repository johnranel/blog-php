<h1 class="page-title"></h1>
<button class="create-post" data-modal_name="form_posts_modal">Create New Post</button>
<table>
    <thead>
        <tr class="table-head">
            <th>TITLE</th>
            <?php echo (SITE_PATH === "/admin/blog") ? "<th>SHORT DESCRIPTION</th>" : ""; ?>
            <th>CATEGORY</th>
            <th>DATE</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody class="table-body">
    </tbody>
</table>
<div class="pagination">
    <ul></ul>
</div>