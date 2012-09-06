<div class="row">
    <div class="span12">
        <p><b>Date :</b> <?php echo $judgement->Date ?></p>

    </div>
    <div class="span12">
                <p><b>Advocates :</b> <?php echo $judgement->Advocates ?></p>
    </div>
    <div class="span12">
        <p style="text-align: justify"><b> Judges:</b> <?php echo $judgement->Judges ?></p>
    </div>
    <div class="span12">
        <p style="text-align: justify"><b> Case Number:</b> <?php echo $judgement->CaseNo ?></p>
    </div>
    <div class="span12">
        <p style="text-align: justify"><b> Appellant:</b> <?php echo $judgement->Appellant ?></p>
    </div>
    <div class="span12">
        <p style="text-align: justify"><b> Respondant:</b> <?php echo $judgement->Respondent ?></p>
    </div>
<!--    <div class="span12">-->
<!--        <p style="text-align: justify"><b> File Name:</b> --><?php //echo $judgement->FileName ?><!--</p>-->
<!--    </div>-->
    <div class="span12">
        <p style="text-align: justify"><b> Headnote:</b> <?php echo  get_line_seperated_text($judgement->Headnote); ?></p>
    </div>
    <div class="span12">
        <p style="text-align: justify"><b> Judgement:</b> <?php echo  get_line_seperated_text($judgement->Judgement); ?></p>
    </div>
    <?php foreach($citation as $row) {?>
    <div class="span12">
        <p ><b> Journal:</b> <?php echo  $row->Journal ?>
            <b>  Year:</b> <?php echo  $row->Year ?>
            <b>  Page:</b> <?php echo  $row->Page ?>
            <b>  Volume:</b> <?php echo  $row->Volume ?>
        </p>
    </div>
    <?php }?>

</div>