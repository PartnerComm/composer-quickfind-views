<?php

$col_count = count($table['cols']);

if($col_count == 3) {
    $col_width = 'width="33%"';
}
elseif($col_count == 2) {
    $col_width = 'width="50%"';
}
else {
    $col_width = '';
}
?>

<div class="container">
    <div class="col_compare_container qf_view col-12">
        <div class="article_content respondtable <?php echo $view; ?>">
            <table class="table_rendered">
                <thead>
                    <tr>
                    <?php foreach($table['cols'] as $col): ?>
                        <th class="<?php echo $col->getTermSlug(); ?>" <?php echo $col_width; ?>><?php echo $col->getTermName(); ?></th>
                    <?php endforeach; ?>
                    </tr>
                </thead>
                <tbody>

                <?php foreach($table['byRows'] as $row): ?>
                    <tr class="<?php echo $row['row']->getTermSlug(); ?>">
                        <th>
                            <span><?php echo $row['row']->getTermName(); ?></span>
                        </th>
                        <?php foreach($row['cols'] as $col): ?>
                        <td data-title="<?php echo $col['column']->getTermName(); ?>" class="<?php echo $col['column']->getTermSlug() . ' ' . $col['post']->getPostTitle(); ?>">
                            <h3><?php echo $row['row']->getTermName(); ?></h3>
                            <?php echo $col['post']->getPostContent(); ?>
                        </td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>