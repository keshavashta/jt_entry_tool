<div class="row">
    <div style="text-align: right" class="span12">
        <p>
            <b> Add New Judgement </b> <a style="margin-left: 10px;" href="#">Add</a>
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
                <th>File Name</th>
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
                <td><?php echo $row->FileName?></td>
                <td><a href="<?php echo base_url("/index.php/entry/view_judgement")."/". $row->Keycode?>"> View</a> / <a href="<?php echo base_url("/index.php/entry/edit_judgement")."/". $row->Keycode?>">Edit</a></td>
            </tr>

                <?php }?>
        </table>
    </div>

    <div class="span12" style="text-align: center">
        <?php if (empty($paging)) echo "No Results Found"; else { ?>
        <?php foreach ($paging as $row) { ?>
            <a href="#"><?php echo $row ?> </a>
            <?php }
    }?>
    </div>
</div>