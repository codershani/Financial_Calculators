
<!-- Calculator form -->
<form action="/<?= $tool->slug ?>" method="post">
    <!-- Input fields specific to GST Calculator -->
    <div class="row">
        <div class="form-group mb-3 col-md-6 col-12">
            <label for="targetWealth" class="form-label"><span id="frequency">Targeted Wealth:</label>
            <input type="text" name="targetWealth" id="targetWealth" placeholder="Ex: 1000" class="form-control" onkeyup="wordWealth.innerHTML=convertNumberToWords(this.value)">
            <div id="wordWealth" class="wording"></div>
        </div>
        <div class="form-group mb-3 col-md-6 col-12">
            <label for="investmentAmount" class="form-label"><span id="frequency">Single Investment Amount:</label>
            <input type="text" name="investmentAmount" id="investmentAmount" placeholder="Ex: 1000" class="form-control" onkeyup="wordAmount.innerHTML=convertNumberToWords(this.value)">
            <div id="wordAmount" class="wording"></div>
        </div>
    </div>
    <div class="row">
        <div class="form-group mb-3 col-md-6 col-12">
            <label for="rateOfReturn" class="form-label">Expected Rate of Return (P.A.):</label>
            <input type="text" name="rateOfReturn" id="rateOfReturn" placeholder="Ex: 12%" class="form-control PerTxt">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Calculate Time Duration</button>
</form>

<hr>
<!-- Output Container -->
<?php if($result):?>
<div class="tool-container--content__output">
    <h5 class="mb-3">Required Time Duration: <strong><?=$result['years']?> Years <?=$result['months']?> Months <?=$result['days']?> Days</strong></h5>
</div>
<?php endif; ?>
