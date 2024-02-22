
<!-- Calculator form -->
<form action="/<?= $tool->slug ?>" method="post">
    <!-- Input fields specific to GST Calculator -->
    <div class="form-group mb-3">
        <label for="amount" class="form-label">Amount:</label>
        <input type="text" name="amount" id="amount" placeholder="Amount" class="form-control">
    </div>
    <div class="form-group mb-3">
        <label for="rate" class="form-label">GST Rate:</label>
        <input type="text" name="rate" id="rate" placeholder="GST Rate" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Calculate</button>
</form>

<hr>
<!-- Output Container -->
<div class="tool-container--content__output">
    <?php if($result !== ''):?>
        Result: <?=$result?>
    <?php endif; ?>
</div>