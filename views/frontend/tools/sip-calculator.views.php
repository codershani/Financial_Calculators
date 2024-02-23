
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
            <label for="investmentAmount" class="form-label"><span id="frequency">Monthly</span> Investment Amount:</label>
            <input type="text" name="investmentAmount" id="investmentAmount" placeholder="Ex: 1000" class="form-control" onkeyup="word.innerHTML=convertNumberToWords(this.value)">
            <div id="word" class="wording"></div>
        </div>
        <div class="form-group mb-3 col-md-6 col-12">
            <label for="rateOfReturn" class="form-label">Expected Rate of Return:</label>
            <input type="text" name="rateOfReturn" id="rateOfReturn" placeholder="Ex: 12%" class="form-control PerTxt">
        </div>
    </div>
    <div class="row">
        <div class="form-group mb-3 col-md-6 col-12">
            <label for="tenureTime" class="form-label">Tenure (in years):</label>
            <input type="text" name="tenureTime" id="tenureTime" placeholder="Ex: 10" class="form-control">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Plan My Wealth</button>
</form>

<hr>
<!-- Output Container -->
<?php if($result):?>
<div class="tool-container--content__output">
    <h5 class="mb-3">Your Corpus Value: <strong>₹ <?=$result['corpusValue']?> (<?=$result['corpusValueText']?>)</strong></h5>
    <h5 class="mb-3">Total Earnings: <strong>₹ <?=$result['totalEarning']?> (<?=$result['totalEarningText']?>)</strong></h5>
    <h5 class="mb-3">Total Deposited Amount: <strong>₹ <?=$result['depositedAmount']?> (<?=$result['depositedAmountText']?>)</strong></h5>
</div>
<?php endif; ?>