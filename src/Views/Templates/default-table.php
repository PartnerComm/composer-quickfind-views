<?php
$col_count = count($table['cols']);
$col_percent = 100/$col_count;
$col_width = 'width="' . $col_percent . '%"';
?>
<div class="wrap_default_table">
    <div class="container">
        <div class="default_table_container qf_view col-12">
            <p class=error">Error Loading: <?php echo $view; ?></p>
            <div class="article_content respondtable chart <?php echo $view; ?>">
                <table class="table_rendered">
                    <thead>
                    <tr>
                        <?php $subhead = false; ?>
                        <?php foreach($table['cols'] as $col): ?>
                            <th class="<?php echo $col->getTermSlug(); ?>" <?php echo $col_width; ?>>
                                <?php echo $col->getTermName(); ?>
                            </th>
                        <?php endforeach; ?>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $alt_count = 1; ?>
                    <?php foreach($table['byRows'] as $row): ?>
                        <?php
                        $is_placeholder = false;
                        // check to see if post is false
                        if(!$row['cols'][0]['post']) {
                            $is_placeholder = true;
                            $rowhead_class = 'chart-rowhead';
                        } else {
                            $rowhead_class = ($row['cols'][0]['post']->getStructure()->getGroupView() != '') ? $row['cols'][0]['post']->getStructure()->getGroupView() : 'chart-rowhead';
                        }
                        ?>
                        <tr class="<?php echo $rowhead_class; ?>">
                            <th colspan="<?php echo $col_count; ?>">
                                <span><?php echo $row['row']->getTermName(); ?></span>
                            </th>
                        </tr>
                        <?php
                        if($alt_count % 2) {
                            $row_class = "alt_row";
                        } else {
                            $row_class = "row";
                        }
                        ?>
                        <tr class="<?php echo $row_class; ?>">
                            <?php
                            if(!$is_placeholder) {
                                foreach($row['cols'] as $col) {
                                    $col_class =  ( $col['post']->getStructure()->getView() != '' ) ? $col['post']->getStructure()->getView() : 'compare_cell';
                                    if(!empty($col['post'])) {
                                        $post_name = $col['post']->getPostTitle();
                                        $post_content = $col['post']->getPostContent(); ?>
                                        <td data-title="<?php echo $col['post']->getPostTitle(); ?>"
                                            class="<?php echo $col['column']->getTermSlug(); ?> <?php echo $col_class; ?> <?php echo $post_name; ?>">
                                            <?php echo $post_content; ?>
                                        </td>
                                    <?php }
                                }
                            }
                            ?>
                        </tr>
                        <?php $alt_count ++; ?>
                    <?php endforeach ; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>