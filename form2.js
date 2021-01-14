$(document).ready(function() {

              // adding more box through number selected in the calculating of cgpa
            //$(".cgpaBody").on("click", "#cgpa-years", function() {
              $(".cgpa-years").on("change", function() {
                var cgpa = $(this).val();
                //var cgpa = $(this).val();
                var cgpaTable = '<tr><td class="levelNo"></td><td><input type="text" class="point form-control" name="point" required=""></td><td><input type="text" class="point form-control" name="point" required=""></td></tr>';
                if(cgpa <= 0) {
                    return;
                } else {
                        
                        for(i = 1; i < cgpa; i++) {
                        $('#cgpaTable').append(cgpaTable);
                    }
                }
              });

});
