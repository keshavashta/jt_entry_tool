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
    <div class="span12">
        <p style="text-align: justify"><b> File Name:</b> <?php echo $judgement->FileName ?></p>
    </div>
    <div class="span12">
        <p style="text-align: justify"><b> Judgement:</b> <?php echo  str_replace("\n","</br>" , $judgement->Judgement); ?></p>
    </div>

</div>