<table class="table table-responsive" id="datatablesSimple">
    <thead>
        <tr>
            <th scope="col">SNo.</th>
            <th scope="col">Image</th>
            <th scope="col">Product Title</th>
            <th scope="col">Product Discription</th>
            <th scope="col">Status</th>
            <th scope="col">Tag</th>
            <th scope="col">Created On</th>
            <th scope="col">Modified On</th>
            <th scope="col" colspan='3'>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $sno = 1;
        // dd(count($productList));
        if (count($categoryList) > 0) {
            foreach ($productList as $results) :
        ?>
                <tr>
                    <th scope="row"><?= $sno++ ?></th>
                    <th scope="row"><?= $this->Html->image(h($results->product_image), array('class' => 'rounded-circle myproduct')) ?></th>
                    <th scope="row"><?= h($results->product_title) ?></th>
                    <td width='260px' class=" fw-bold discription"><?= h($results->product_description) ?></td>
                    <td class="fw-bold">
                        <?php if ($results->status == 0) : ?>
                            <?=
                            $this->Form->postLink(
                                $this->Html->image('toggle-on.png', array('height' => '60px', 'class' => 'toggle')),
                                ['action' => 'productStatus', $results->id, $results->status],
                                ['confirm' => __('Are You Sure you want to deactivate {0}?', $results->product_title), 'escape' => false, 'title' => 'Active']
                            ) ?>
                        <?php else : ?>
                            <?=
                            $this->Form->postLink(
                                $this->Html->image('toggle-off.png', array('height' => '60px', 'class' => 'toggle')),
                                ['action' => 'productStatus', $results->id, $results->status],
                                ['confirm' => __('Are You Sure you want to Activate {0}?', $results->product_title), 'escape' => false, 'title' => 'Deactive']
                            ) ?>
                        <?php endif; ?>
                    </td>
                    <td class="fw-bold"><?= h($results->product_tags) ?></td>
                    <td class="fw-bold"><?= h($results->created_date) ?></td>
                    <td class="fw-bold">
                        <?php
                        if ($results->modified_date == null) {
                            echo '<span class="mx-5">---</span>';
                        } else {
                            echo h($results->modified_date);
                        }
                        ?>
                    </td>
                    <td class="fw-bold">
                        <?= $this->Html->link('<i class="fa-solid fa-eye"></i><span class="sr-only">' . __('View') . '</span>', ['action' => 'productview', $results->id], ['escape' => false, 'title' => __('VIEW'), 'class' => 'btn btn-info']) ?>
                        <?= $this->Html->link('<i class="fa-sharp fa-solid fa-pen-to-square"></i><span class="sr-only">' . __('Edit') . '</span>', ['action' => 'productedit', $results->id], ['escape' => false, 'title' => __('EDIT'), 'class' => 'btn btn-primary']) ?>
                        <?= $this->Form->postLink('<i class="fa-solid fa-trash"></i><span class="sr-only">' . __('Delete') . '</span>', ['action' => 'productdelete', $results->id], ['confirm' => __('Are you sure you want to delete {0}?', $results->product_title), 'class' => 'btn btn-danger', 'escape' => false, 'title' => __('DELETE')]) ?>
                    </td>
                    </td>
                </tr>
            <?php
            endforeach;
        } else { ?>
            <tr>
                <td colspan="5" class="text-center fw-bold">No Products To Show</td>
            </tr>
        <?php
        }

        ?>
    </tbody>
</table>

<!-- <select class="form-select float-end mt-3" id="select" aria-label="Default select example">
    <option selected>Filter</option>
    <option value="0">Active</option>
    <option value="1">Deactive</option>
</select> -->