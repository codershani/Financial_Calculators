
<!-- Calculator form -->
<form action="/<?= $tool->slug ?>" method="post">
    <!-- Input fields specific to GST Calculator -->
    <div class="row">
        <div class="form-group mb-3 col-md-6 col-12">
            <label for="frequencyOfInvestment" class="form-label">Frequency of Investment</label>
            <select name="frequencyOfInvestment" id="frequencyOfInvestment" class="form-control" onclick="frequency.innerHTML=this.value">
                <option selected="selected" value="Monthly">Monthly</option>
                <option value="Yearly">Yearly</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="form-group mb-3 col-md-6 col-12">
            <label for="targetedWealth" class="form-label">Targeted Wealth:</label>
            <input type="text" name="targetedWealth" id="targetedWealth" placeholder="Ex: 1000" class="form-control" onkeyup="word.innerHTML=convertNumberToWords(this.value)">
            <div id="word" class="wording"></div>
        </div>
        <div class="form-group mb-3 col-md-6 col-12">
            <label for="investmentAmount" class="form-label">Investment Amount (P.M.):</label>
            <input type="text" name="investmentAmount" id="investmentAmount" placeholder="Ex: 10" class="form-control">
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
    <?php if($result['type'] === 'Monthly'): ?>
        <h5 class="mb-3">Required Time Duration: <strong><?=$result['years']?> Years <?=$result['months']?> Months</strong></h5>
    <?php elseif($result['type'] === 'Yearly'): ?>
        <h5 class="mb-3">Required Time Duration: <strong><?=$result['years']?> Years</strong></h5>
    <?php endif; ?>
</div>
<?php endif; ?>