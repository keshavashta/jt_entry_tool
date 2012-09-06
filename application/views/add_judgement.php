<div class="row">
    <div class="span12">
        <form method="post" action="<?php echo base_url("/entry/new_judgement"); ?>">
            <label>Date (yyyy-mm-dd as 2012-12-20)</label>
            <input type="text" class="span6" placeholder="Enter Date in format yyyy-mm-dd" id="date" name="date">
            <label>Advocates</label>
            <input type="text" class="span6" name="advocates" id="advocates" placeholder="Enter">
            <label>Judges</label>
            <input type="text" class="span6" name="judges" id="judges" placeholder="Enter">
            <label>Case Number</label>
            <input type="text" class="span6" name="case_number" id="case_number" placeholder="Enter">
            <label>Appellant</label>
            <input type="text" class="span6" name="appellant" id="appellant" placeholder="Enter">
            <label>Respondant</label>
            <input type="text" class="span6" name="respondant" id="respondant" placeholder="Enter">
<!--            <label>File Name</label>-->
<!--            <input type="text" class="span6" name="file_name" id="file_name" placeholder="Enter">-->
            <label>Headnote</label>
            <textarea name="headnote" class="span9" id="headnote" rows="5"></textarea>
            <label>Judgement</label>
            <textarea name="judgement" class="span9" id="judgement" rows="5"></textarea>

            <?php for ($index = 1; $index < 7; ++$index) { ?>
            <label>Citation <?php echo $index?> </label>


            <div class="span12">
                <div class="span1"><p>Journal</p>
                    <input type="text" class="span1" name="<?php echo "journal".$index?>" id="<?php echo "journal".$index?>" placeholder="Enter">
                </div>
                <div class="span1">
                    <p>Year</p>
                    <input type="text" class="span1" name="<?php echo "year".$index?>" id="<?php echo "year".$index?>" placeholder="Enter">
                </div>
                <div class="span1">
                    <p>Volume</p>
                    <input type="text" class="span1" name="<?php echo "volume".$index?>" id="<?php echo "volume".$index?>" placeholder="Enter">
                </div>
                <div class="span1">
                    <p>Page</p>
                    <input type="text" class="span1" name="<?php echo "page".$index?>" id="<?php echo "page".$index?>" placeholder="Enter">
                </div>
            </div>


            <?php } ?>


            </br>
            <button type="submit" class="btn">Add</button>
        </form>
    </div>
</div>