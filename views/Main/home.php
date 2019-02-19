


<nav>
    <ul>
        <?php foreach ($categories as $category):?>
        <li>
            <a href="?category= <?php echo $category->category_id;?>">
                <?php echo htmlspecialchars($category->name);?>
            </a>

       <?php endforeach;?>
    </ul>
</nav>

