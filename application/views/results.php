<div class="row">
    <div style="text-align: right" class="span12">
        <p>
            <b> Add New Judgement </b> <a style="margin-left: 10px;" href="<?php echo base_url("/entry/add_judgement");?>">Add</a>
        </p>

    </div>
</div>
<div class="row">

    <div class="span12">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Appellant</th>
                <th>Respondant</th>
                <th>Date</th>
                <th>#</th>
            </tr>
            </thead>
            <tbody>
            <?php $index = $starting_index; foreach ($judgement as $row) { ?>
            <tr>
                <td>
                    <?php echo ++$index?> </td>
                <td><?php echo $row->Appellant?> </td>
                <td><?php echo $row->Respondent?></td>
                <td><?php echo $row->Date?></td>
                <td><a href="<?php echo base_url("/entry/view_judgement")."/". $row->Keycode?>"> View</a> / <a href="<?php echo base_url("/entry/edit_judgement")."/". $row->Keycode?>">Edit</a></td>
            </tr>

                <?php }?>
        </table>
    </div>

    <div class="span12" style="text-align: center">
        <?php if ($pre) { ?>
       <a href="<?php echo base_url("welcome/results")."/".$pre_val?>">Pre</a>
            <?php }?>
        <?php if (!empty($next_val)) { ?>

        <a href="<?php echo base_url("welcome/results")."/".$next_val;?>">Next</a>
        <?php }?>

    </div>
</div>