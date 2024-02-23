            
    <script>
        function convertNumberToWords(amount) {
    var words = ['', 'One', 'Two', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten', 'Eleven', 'Twelve', 'Thirteen', 'Fourteen', 'Fifteen', 'Sixteen', 'Seventeen', 'Eighteen', 'Nineteen', 'Twenty', 'Thirty', 'Forty', 'Fifty', 'Sixty', 'Seventy', 'Eighty', 'Ninety'];
    
    amount = amount.toString();
    var atemp = amount.split(".");
    var number = atemp[0].split(",").join("");
    
    var n_length = number.length;
    var words_string = "";
    
    if (n_length <= 9) {
        var n_array = new Array(0, 0, 0, 0, 0, 0, 0, 0, 0);
        var received_n_array = new Array();
        
        for (var i = 0; i < n_length; i++) {
            received_n_array[i] = number.substr(i, 1);
        }
        
        for (var i = 9 - n_length, j = 0; i < 9; i++, j++) {
            n_array[i] = received_n_array[j];
        }
        
        for (var i = 0, j = 1; i < 9; i++, j++) {
            if (i == 0 || i == 2 || i == 4 || i == 7) {
                if (n_array[i] == 1) {
                    n_array[j] = 10 + parseInt(n_array[j]);
                    n_array[i] = 0;
                }
            }
        }
        
        var value = "";
        for (var i = 0; i < 9; i++) {
            if (i == 0 || i == 2 || i == 4 || i == 7) {
                value = n_array[i] * 10;
            } else {
                value = n_array[i];
            }
            
            if (value != 0) {
                words_string += words[value] + " ";
            }
            
            if ((i == 1 && value != 0) || (i == 0 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Crores ";
            }
            
            if ((i == 3 && value != 0) || (i == 2 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Lakhs ";
            }
            
            if ((i == 5 && value != 0) || (i == 4 && value != 0 && n_array[i + 1] == 0)) {
                words_string += "Thousand ";
            }
            
            if (i == 6 && value != 0 && (n_array[i + 1] != 0 && n_array[i + 2] != 0)) {
                words_string += "Hundred and ";
            } else if (i == 6 && value != 0) {
                words_string += "Hundred ";
            }
        }
        words_string = words_string.split("  ").join(" ");
    }
    
    return words_string;
}

document.addEventListener('DOMContentLoaded', function () {
    var inputElement = document.querySelector('.PerTxt');
    
    inputElement.addEventListener('keyup', function (e) {
        if (e.which == 8) {
            var dd = inputElement.value.replace('%', '');
            inputElement.value = dd;
            return;
        }
        
        if (inputElement.value == '' || inputElement.value == '%') {
            inputElement.value = '';
            return;
        }
        
        inputElement.value = inputElement.value.replace(/[^0-9\.]/g, '') + '%';
    });
});

    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="<?=SITE_ASSETS_PATH?>/extras/jquery/jquery.min.js"></script>
    <script src="<?=SITE_ASSETS_PATH?>/extras/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=SITE_ASSETS_PATH?>/extras/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=SITE_ASSETS_PATH?>/js/admin.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?=SITE_ASSETS_PATH?>/extras/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?=SITE_ASSETS_PATH?>/js/demo/chart-area-demo.js"></script>
    <script src="<?=SITE_ASSETS_PATH?>/js/demo/chart-pie-demo.js"></script>

</body>

</html>