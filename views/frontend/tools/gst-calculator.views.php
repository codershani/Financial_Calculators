
<!-- Calculator form -->
<form action="/<?= $tool->slug ?>" method="post">
    <!-- Input fields specific to GST Calculator -->
    <div class="row px-3">
        <div class="form-check mb-3 col-md-6 col-12">
            <input class="form-check-input" type="radio" name="gstType" id="gstType1" value="exclusive" checked>
            <label class="form-check-label" for="gstType1">GST Exclusive</label>
        </div>
        <div class="form-check mb-3 col-md-6 col-12">
            <input class="form-check-input" type="radio" name="gstType" id="gstType1" value="inclusive">
            <label class="form-check-label" for="gstType1">GST Inclusive</label>
        </div>
    </div>
    <div class="row">
        <div class="form-group mb-3 col-md-6 col-12">
            <label for="amount" class="form-label">Amount:</label>
            <input type="text" name="amount" id="amount" placeholder="Ex: 5000" class="form-control" onkeyup="word.innerHTML=convertNumberToWords(this.value)">
            <div id="word" class="wording"></div>
        </div>
        <div class="form-group mb-3 col-md-6 col-12">
            <label for="taxRate" class="form-label">GST:</label>
            <select name="taxRate" id="taxRate" class="form-control" onclick="frequency.innerHTML=this.value">
                <option selected="selected" value="5%">5%</option>
                <option value="12%">12%</option>
                <option value="18%">18%</option>
                <option value="28%">28%</option>
            </select>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Calculate GST</button>
</form>

<hr>
<!-- Output Container -->
<?php if($result):?>
<div class="tool-container--content__output">
    <h5 class="mb-3">Total GST: <strong>₹ <?=$result['gstAmount']?> (<?=$result['gstAmountText']?>)</strong></h5>
    <?php if ($result['gstType'] === 'exclusive'): ?>
        <h5 class="mb-3">POST-GST Amount: <strong>₹ <?=$result['totalAmount']?> (<?=$result['totalAmountText']?>)</strong></h5>
    <?php elseif($result['gstType'] === 'inclusive'): ?>
        <h5 class="mb-3">PRE-GST Amount: <strong>₹ <?=$result['totalAmount']?> (<?=$result['totalAmountText']?>)</strong></h5>
    <?php endif; ?>
</div>
<?php endif; ?>