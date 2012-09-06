<div class="row">
    <div class="span12">
        <form method="post" action="<?php echo base_url("/entry/update_judgement"); ?>">
            <label>Date (yyyy-mm-dd as 2012-12-20)</label>
            <input type="text" class="span6" placeholder="Enter Date in format yyyy-mm-dd"
                   value="<?php echo $judgement->Date?>" id="date" name="date">
            <label>Advocates</label>
            <input type="text" class="span6" name="advocates" id="advocates" value="<?php echo $judgement->Advocates?>"
                   placeholder="Enter">
            <label>Judges</label>
            <input type="text" class="span6" name="judges" id="judges" value="<?php echo $judgement->Judges?>"
                   placeholder="Enter">
            <label>Case Number</label>
            <input type="text" class="span6" name="case_number" id="case_number" value="<?php echo $judgement->CaseNo?>"
                   placeholder="Enter">
            <label>Appellant</label>
            <input type="text" class="span6" name="appellant" id="appellant" value="<?php echo $judgement->Appellant?>"
                   placeholder="Enter">
            <label>Respondant</label>
            <input type="text" class="span6" name="respondant" id="respondant"
                   value="<?php echo $judgement->Respondent?>" placeholder="Enter">
            <!--            <label>File Name</label>-->
            <!--            <input type="text"  class="span6" name="file_name" id="file_name" value="-->
            <?php //echo $judgement->FileName?><!--" placeholder="Enter">-->
            <label>Headnote</label>
            <textarea name="headnote" class="span9" id="headnote" rows="5"><?php echo $judgement->Headnote?></textarea>
            <label>Judgement</label>
            <textarea name="judgement" class="span9" id="judgement"
                      rows="5"><?php echo $judgement->Judgement?></textarea>
            <input type="hidden" name="keycode" value="<?php  echo $keycode;?>">

<!--            for loop to iterate over existing citations if citation size is 6 then the proccess will be continued in next for as-->
<!--            those were new and citation would be null-->
            <?php $citation_count = sizeof($citations)?>
            <?php $index = 1; foreach ($citations as $citation) { ?>
            <label>Citation <?php echo $index?> </label>


            <div class="span12">
                <div class="span1"><p>Journal</p>
                    <input type="text" class="span1" name="<?php echo "journal" . $index?>"
                           value="<?php echo $citation->Journal?>"
                           id="<?php echo "journal" . $index?>" placeholder="Type something…">
                </div>
                <div class="span1">
                    <p>Year</p>
                    <input type="text" class="span1" name="<?php echo "year" . $index?>"
                           value="<?php echo $citation->Year?>"
                           id="<?php echo "year" . $index?>" placeholder="Type something…">
                </div>
                <div class="span1">
                    <p>Volume</p>
                    <input type="text" class="span1" name="<?php echo "volume" . $index?>"
                           value="<?php echo $citation->Volume?>"
                           id="<?php echo "volume" . $index?>" placeholder="Type something…">
                </div>
                <div class="span1">
                    <p>Page</p>
                    <input type="text" class="span1" name="<?php echo "page" . $index?>"
                           value="<?php echo $citation->Page?>"
                           id="<?php echo "page" . $index?>" placeholder="Type something…">
                </div>
            </div>


            <?php ++$index;} ?>

<!--loop will iterate over 6- citation size-->
            <?php  for ($counter = $citation_count+1; $counter < 7; ++$counter) { ?>
            <label>Citation <?php echo $counter?> </label>


            <div class="span12">
                <div class="span1"><p>Journal</p>
                    <input type="text" class="span1" name="<?php echo "journal" . $counter?>"
                           id="<?php echo "journal" . $counter?>" placeholder="Type something…">
                </div>
                <div class="span1">
                    <p>Year</p>
                    <input type="text" class="span1" name="<?php echo "year" . $counter?>"
                           id="<?php echo "year" . $counter?>" placeholder="Type something…">
                </div>
                <div class="span1">
                    <p>Volume</p>
                    <input type="text" class="span1" name="<?php echo "volume" . $counter?>"
                           id="<?php echo "volume" . $counter?>" placeholder="Type something…">
                </div>
                <div class="span1">
                    <p>Page</p>
                    <input type="text" class="span1" name="<?php echo "page" . $counter?>"
                           id="<?php echo "page" . $counter?>" placeholder="Type something…">
                </div>
            </div>


            <?php } ?>

            </br>
            <button type="submit" class="btn">Update</button>
        </form>
    </div>
</div>