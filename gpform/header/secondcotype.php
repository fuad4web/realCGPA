<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate CGPA</title>
    <!-- Font awesome cdn -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">   
    <!-- Latest compiled and minified CSS 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
    <!-- Bootsrap CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!-- jquery cdn -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/form.css" />
    <script type="text/javascript">
        $(document).ready(function() {

            // changing of Greetings through time
            var thehours = new Date().getHours();
            var themessage;
            var morning = ('<h3>Good morning, It\'s Breakfast Time</h3>');
            var afternoon = ('<h3>Good afternoon, It\'s Lunch Time</h3>');
            var evening = ('<h3>Good evening, It\'s Dinner Time</h3>');
            var judgementDay =('</h3>Judgement Day</h3>');

            if (thehours >= 0 && thehours < 12) {
                themessage = morning; 

            } else if (thehours >= 12 && thehours < 17) {
                themessage = afternoon;

            } else if (thehours >= 17 && thehours < 24) {
                themessage = evening;
            } else {
                themessage = judgementDay;
            }

            $('.greeting').append(themessage);

 
            var input = '<tr><td><input class="form-control" type="text" name="code" required=""></td><td><input class="form-control score" type="text" name="score" required=""></td><td><input class="form-control grade" type="text" name="grade" required="" disabled></td><td><select name="unit" id="unit" class="form-control unit"><option value=""></option><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option></select></td><td><input type="text" class="point form-control" name="point" required="" disabled></td><td><input type="text" class="unitPoint form-control" name="unitpoint" required="" disabled></td><td><input class="btn btn-danger" type="button" name="remove" id="remove" value="Remove"></td></tr>';


            var x = 1;
            // add more input fields
            $("#add").click(function() {
                $('#table_field').append(input);
            });

            //remove input fields
            $("#table_field").on('click', '#remove', function(e) {
                e.preventDefault();
                $(this).closest('tr').remove();
            });

            
            // adding more box through number selected in the calculating of cgpa
            $(".cgpaBody").on("click", "#cgpa-years", function() {
            var cgpa = $(".cgpa-years option:selected").val();
            var cgpaTable = '<tr><td>100</td><td><input type="text" class="point form-control" name="point" required=""></td><td><input type="text" class="point form-control" name="point" required=""></td></tr>';
            if(cgpa <= 0) {
                return;
            } else {
                for(i = 1; i < cgpa; i++) {
                    $('#cgpaTable').append(cgpaTable);
                }
            }
            });
            

            /*
                // calculating of cgpa
                $(".calcCGPA").click(function() {
                // not necessary
                "use strict";
                var cgpa = $(".cgpa-years option:selected").val();
                var unIT = $(".unIT option:selected").val();
                var cgpaunIT = cgpa * unIT;
                $(".cgparesult").val(cgpaunIT);
                });
            */

        });


    </script>
</head>
<body>

<?php 
    /* include '../header/foot.php';
    include 'header/secondcotype.php'; 
    
    einstein
    https://www.youtube.com/watch?v=3tX6pBqP_KY 




    <img src="data:image/svg+xml;base64,PHN2ZyBoZWlnaHQ9IjUxMi4wMDAwM3B0IiB2aWV3Qm94PSIwIDAgNTEyLjAwMDAzIDUxMi4wMDAwMyIgd2lkdGg9IjUxMi4wMDAwM3B0IiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciPjxwYXRoIGQ9Im00MTEuMzgyODEyIDQwOS40NjQ4NDQtODAuMjEwOTM3IDU2LjU3NDIxOC00OC4yMTQ4NDQgMzMuODc4OTA3Yy04Ljg2MzI4MSA2LjIwNzAzMS0yMS4wNzgxMjUgNC4wNjY0MDYtMjcuMzA4NTkzLTQuNzgxMjVsLTE3LjQwNjI1LTI0LjU3NDIxOWMtMy4wNTg1OTQtNC40NTcwMzEtNy44NjcxODgtNy40MDYyNS0xMy4yMjY1NjMtOC4xMDU0NjktNDQuNzE0ODQ0LTYuMDcwMzEyLTc0LjkyMTg3NS00OC45OTIxODctNzQuOTIxODc1LTQ4Ljk5MjE4N2wtMTM1LjY3MTg3NS0xOTIuNTk3NjU2Yy05LjQzNzUtMTIuODM5ODQ0LTcuNDMzNTk0LTMwLjc3MzQzOCA0LjYwOTM3NS00MS4yMTQ4NDQgNi4zNDc2NTYtNS4wOTM3NSAxNC41MTk1MzEtNy4zNDM3NSAyMi41NzgxMjUtNi4yMTA5MzggOC4wNjI1IDEuMTI4OTA2IDE1LjMwMDc4MSA1LjUzOTA2MyAyMCAxMi4xODM1OTRsLTguNTMxMjUtMTIuMTE3MTg4LTI2LjE5OTIxOS0zNy4yMDMxMjQtOS41NTQ2ODctMTMuNDg0Mzc2Yy03LjM5MDYyNS0xMC41MTE3MTgtNy4xMTMyODEtMjQuNjA1NDY4LjY5MTQwNi0zNC44MTY0MDYgMS44NTkzNzUtMi4zNzEwOTQgNC4wMzkwNjMtNC40NjQ4NDQgNi40ODQzNzUtNi4yMzA0NjggNi4zNjcxODgtNC40OTYwOTQgMTQuMjY1NjI1LTYuMjczNDM4IDIxLjk0NTMxMi00Ljk0NTMxMyA3LjY4MzU5NCAxLjMyODEyNSAxNC41MjM0MzggNS42NTYyNSAxOS4wMTU2MjYgMTIuMDMxMjVsLTIyLjUzMTI1LTMyLjA4NTkzN2MtNi4yNS04LjU5Mzc1LTcuMzg2NzE5LTE5Ljg4NjcxOS0yLjk3MjY1Ny0yOS41NTA3ODIgNC40MTc5NjktOS42NjQwNjIgMTMuNjk5MjE5LTE2LjE5OTIxOCAyNC4yODkwNjMtMTcuMDk3NjU2IDEwLjU4NTkzNy0uODk0NTMxIDIwLjgzNTkzNyAzLjk4NDM3NSAyNi44MTI1IDEyLjc2OTUzMWwyMi42MTMyODEgMzIuMDg1OTM4Yy02LjI1MzkwNi04LjU4OTg0NC03LjM5MDYyNS0xOS44ODY3MTktMi45NzI2NTYtMjkuNTUwNzgxIDQuNDE0MDYyLTkuNjY0MDYzIDEzLjY5OTIxOS0xNi4xOTkyMTkgMjQuMjg1MTU2LTE3LjA5Mzc1IDEwLjU4OTg0NC0uODk4NDM4IDIwLjgzOTg0NCAzLjk4MDQ2OCAyNi44MTY0MDYgMTIuNzY1NjI0bDM1LjY2Nzk2OSA1MC42ODc1IDcxLjY3OTY4OCAxMDEuNzI2NTYzYzcuMDc0MjE4IDEwLjQ5NjA5NCAxNS43NzM0MzcgMTkuODAwNzgxIDI1Ljc3MzQzNyAyNy41NjI1IDUuMTEzMjgxIDMuODAwNzgxIDExLjc1NzgxMyA0Ljg4MjgxMyAxNy44MTY0MDYgMi44OTg0MzcgNi4wNTQ2ODgtMS45ODQzNzQgMTAuNzczNDM4LTYuNzg5MDYyIDEyLjY0NDUzMS0xMi44ODI4MTJ2LS4wODIwMzFjLS41MTE3MTgtMTYuMDQyOTY5LTMuNDEwMTU2LTI5Ljg2NzE4OC0zLjc1MzkwNi00Mi40MTQwNjMtLjkyOTY4Ny0zNS40MTAxNTYtNC44NTU0NjgtNzEuNjc5Njg3IDExLjE4NzUtODMuMDI3MzQ0IDE2LjA0Mjk2OS0xMS4zNDc2NTYgMzYuMDk3NjU2IDkuMjE0ODQ0IDM4LjY1NjI1IDM2Ljg2MzI4MiA0LjAwMzkwNiA0Mi42Njc5NjggMjMuMTE3MTg4IDc4Ljc2MTcxOCAzNS40MDYyNSAxMzAuMTMyODEyIDcuODUxNTYzIDMzLjI4MTI1IDIuMzA0Njg4IDc1Ljk0OTIxOS0yLjU2MjUgMTAxLjk3MjY1Ni0yLjkwNjI1IDE1LjU4MjAzMi42MDE1NjMgMzEuNjc1NzgyIDkuNzMwNDY5IDQ0LjYzMjgxM2wyLjA0Njg3NSAyLjk4NDM3NWMzLjAyMzQzOCA0LjIzODI4MSA0LjIyNjU2MiA5LjUwNzgxMiAzLjM0Mzc1IDE0LjYzNjcxOS0uODg2NzE5IDUuMTI4OTA2LTMuNzg1MTU2IDkuNjkxNDA2LTguMDU0Njg4IDEyLjY3MTg3NXptMCAwIiBmaWxsPSIjZmRkN2FkIi8+PHBhdGggZD0ibTMxNC4wNzgxMjUgMjkwLjMyMDMxMmMtLjg1OTM3NS42MDU0NjktMS44MjAzMTMgMS4wNDY4NzYtMi44NDM3NSAxLjI5Njg3Ni00LjU3MDMxMyAxLjE0NDUzMS05LjIwMzEyNS0xLjYzMjgxMy0xMC4zNDc2NTYtNi4yMDMxMjYtNC41MTU2MjUtMTcuNzQyMTg3LTIuMTk1MzEzLTM2LjUzNTE1NiA2LjQ5MjE4Ny01Mi42NDg0MzcgMi44MDA3ODItNS4zMTY0MDYgOS43MjY1NjMtMTcuNDYwOTM3IDExLjI5Njg3NS0yMC40ODA0NjkgMy43NzczNDQtOS45NzI2NTYgNS44MzU5MzgtMjAuNTExNzE4IDYuMDkzNzUtMzEuMTcxODc1IDQuMTI4OTA3IDkuMDk3NjU3IDYuNjQ4NDM4IDE4LjgzOTg0NCA3LjQ1NzAzMSAyOC43OTY4NzUtMS42NTYyNSAxMC43NTM5MDYtNC45NjA5MzcgMjEuMTkxNDA2LTkuODA0Njg3IDMwLjkzMzU5NC02LjY3NTc4MSAxMi4zODY3MTktOC40NTMxMjUgMjYuODI4MTI1LTQuOTgwNDY5IDQwLjQ2NDg0NC44Mzk4NDQgMy40MTAxNTYtLjQ5NjA5NCA2Ljk4ODI4MS0zLjM2MzI4MSA5LjAxMTcxOHptMCAwIiBmaWxsPSIjY2JiMjkyIi8+PHBhdGggZD0ibTE3NS43ODUxNTYgMzgxLjc5Njg3NWMtMS44NTE1NjIgMS4zMjQyMTktNC4xNjAxNTYgMS44NDc2NTYtNi40MDIzNDQgMS40NjA5MzctMi4yNDIxODctLjM5MDYyNC00LjIzODI4MS0xLjY1NjI1LTUuNTQyOTY4LTMuNTIzNDM3bC0zMy45MTAxNTYtNDguMTQ0NTMxYy0xLjc1NzgxMy0yLjQ5MjE4OC0yLjA1MDc4Mi01LjczNDM3NS0uNzY5NTMyLTguNXMzLjkzNzUtNC42NDA2MjUgNi45NzY1NjMtNC45MTQwNjNjMy4wMzUxNTYtLjI3NzM0MyA1Ljk4ODI4MSAxLjA4OTg0NCA3Ljc0MjE4NyAzLjU4MjAzMWwzMy45MTQwNjMgNDguMTQ0NTMyYzIuNzI2NTYyIDMuODM5ODQ0IDEuODMyMDMxIDkuMTY0MDYyLTIuMDA3ODEzIDExLjg5NDUzMXptMCAwIiBmaWxsPSIjZmVlN2NlIi8+PHBhdGggZD0ibTIxNy43MDMxMjUgNDI0LjI4NTE1NmMtMS44NTE1NjMgMS4zMDA3ODItNC4xNDA2MjUgMS44MTI1LTYuMzY3MTg3IDEuNDI1NzgyLTkuNzUzOTA3LTEuMjgxMjUtMTguNjQ0NTMyLTYuMjUtMjQuODQ3NjU3LTEzLjg4MjgxMy0yLjQzNzUtMy44MjgxMjUtMS40NTMxMjUtOC44OTA2MjUgMi4yMzgyODEtMTEuNTI3MzQ0IDMuNjg3NS0yLjYzNjcxOSA4Ljc5Njg3Ni0xLjkyNTc4MSAxMS42Mjg5MDcgMS42MjEwOTQgMy42NjAxNTYgMy45MDIzNDQgOC41NzgxMjUgNi4zODY3MTkgMTMuODkwNjI1IDcuMDE5NTMxIDMuMzg2NzE4LjYwMTU2MyA2LjA4NTkzNyAzLjE3NTc4MiA2LjgzOTg0NCA2LjUzMTI1Ljc1MzkwNiAzLjM1NTQ2OS0uNTc4MTI2IDYuODM5ODQ0LTMuMzgyODEzIDguODMyMDMyem0tMTcuMjYxNzE5LTIyLjI4MTI1LjA5Mzc1LS4wODIwMzF6bTAgMCIgZmlsbD0iI2ZlZTdjZSIvPjxwYXRoIGQ9Im0zNzcuNjI1IDM5NS42NzE4NzUtOC4wMTk1MzEgNS42NTIzNDRjLTMuODM1OTM4IDIuMzU5Mzc1LTguODQzNzUgMS4zMzU5MzctMTEuNDQ1MzEzLTIuMzQzNzUtMi41OTc2NTYtMy42NzU3ODEtMS44OTA2MjUtOC43NDIxODggMS42MTMyODItMTEuNTY2NDA3bDguMDIzNDM3LTUuNjQ4NDM3YzMuODUxNTYzLTIuNzE0ODQ0IDkuMTc1NzgxLTEuNzkyOTY5IDExLjg5MDYyNSAyLjA1ODU5NCAyLjcxNDg0NCAzLjg1NTQ2OSAxLjc4OTA2MiA5LjE3NTc4MS0yLjA2MjUgMTEuODkwNjI1em0wIDAiIGZpbGw9IiNmZWU3Y2UiLz48cGF0aCBkPSJtMzM3LjUxMTcxOSA0MjMuOTI1NzgxLTU2LjE3NTc4MSAzOS41NzAzMTNjLTMuODUxNTYzIDIuNzE0ODQ0LTkuMTc1NzgyIDEuNzkyOTY4LTExLjg5MDYyNi0yLjA1ODU5NC0yLjcxNDg0My0zLjg1NTQ2OS0xLjc5Mjk2OC05LjE3OTY4OCAyLjA1ODU5NC0xMS44OTQ1MzFsNTYuMTc1NzgyLTM5LjU2NjQwN2MzLjg1MTU2Mi0yLjcxNDg0MyA5LjE3NTc4MS0xLjc5Mjk2OCAxMS44OTA2MjQgMi4wNTg1OTQgMi43MTQ4NDQgMy44NTU0NjkgMS43OTI5NjkgOS4xNzU3ODItMi4wNTg1OTMgMTEuODkwNjI1em0wIDAiIGZpbGw9IiNmZWU3Y2UiLz48cGF0aCBkPSJtMTE5LjQ2NDg0NCA1MTJjLTY1Ljk0OTIxOS0uMDcwMzEyLTExOS4zOTQ1MzE1LTUzLjUxNTYyNS0xMTkuNDY0ODQ0LTExOS40NjQ4NDQgMC00LjcxNDg0NCAzLjgyMDMxMi04LjUzNTE1NiA4LjUzNTE1Ni04LjUzNTE1NiA0LjcxMDkzOCAwIDguNTMxMjUgMy44MjAzMTIgOC41MzEyNSA4LjUzNTE1Ni4wNjI1IDU2LjUyNzM0NCA0NS44NzEwOTQgMTAyLjMzNTkzOCAxMDIuMzk4NDM4IDEwMi4zOTg0MzggNC43MTQ4NDQgMCA4LjUzNTE1NiAzLjgyMDMxMiA4LjUzNTE1NiA4LjUzMTI1IDAgNC43MTQ4NDQtMy44MjAzMTIgOC41MzUxNTYtOC41MzUxNTYgOC41MzUxNTZ6bTAgMCIgZmlsbD0iIzQ0ODJjMyIvPjxwYXRoIGQ9Im0xMjggNDc3Ljg2NzE4OGMtNTEuODE2NDA2LS4wNjI1LTkzLjgwNDY4OC00Mi4wNTA3ODItOTMuODY3MTg4LTkzLjg2NzE4OCAwLTQuNzEwOTM4IDMuODIwMzEzLTguNTM1MTU2IDguNTM1MTU3LTguNTM1MTU2IDQuNzEwOTM3IDAgOC41MzEyNSAzLjgyNDIxOCA4LjUzMTI1IDguNTM1MTU2LjA0Njg3NSA0Mi4zOTQ1MzEgMzQuNDA2MjUgNzYuNzUzOTA2IDc2LjgwMDc4MSA3Ni44MDA3ODEgNC43MTA5MzggMCA4LjUzNTE1NiAzLjgyMDMxMyA4LjUzNTE1NiA4LjUzMTI1IDAgNC43MTQ4NDQtMy44MjQyMTggOC41MzUxNTctOC41MzUxNTYgOC41MzUxNTd6bTAgMCIgZmlsbD0iIzQ0ODJjMyIvPjxwYXRoIGQ9Im01MDMuNDY0ODQ0IDEyOGMtNC43MTA5MzggMC04LjUzMTI1LTMuODIwMzEyLTguNTMxMjUtOC41MzUxNTYtLjA2MjUtNTYuNTI3MzQ0LTQ1Ljg3MTA5NC0xMDIuMzM1OTM4LTEwMi4zOTg0MzgtMTAyLjM5ODQzOC00LjcxNDg0NCAwLTguNTM1MTU2LTMuODIwMzEyLTguNTM1MTU2LTguNTMxMjUgMC00LjcxNDg0NCAzLjgyMDMxMi04LjUzNTE1NiA4LjUzNTE1Ni04LjUzNTE1NiA2NS45NDkyMTkuMDcwMzEyNSAxMTkuMzk0NTMyIDUzLjUxNTYyNSAxMTkuNDY0ODQ0IDExOS40NjQ4NDQgMCA0LjcxNDg0NC0zLjgyMDMxMiA4LjUzNTE1Ni04LjUzNTE1NiA4LjUzNTE1NnptMCAwIiBmaWxsPSIjNDQ4MmMzIi8+PHBhdGggZD0ibTQ2OS4zMzIwMzEgMTM2LjUzNTE1NmMtNC43MTA5MzcgMC04LjUzMTI1LTMuODI0MjE4LTguNTMxMjUtOC41MzUxNTYtLjA0Njg3NS00Mi4zOTQ1MzEtMzQuNDA2MjUtNzYuNzUzOTA2LTc2LjgwMDc4MS03Ni44MDA3ODEtNC43MTA5MzggMC04LjUzNTE1Ni0zLjgyMDMxMy04LjUzNTE1Ni04LjUzMTI1IDAtNC43MTQ4NDQgMy44MjQyMTgtOC41MzUxNTcgOC41MzUxNTYtOC41MzUxNTcgNTEuODE2NDA2LjA2MjUgOTMuODA0Njg4IDQyLjA1MDc4MiA5My44NjcxODggOTMuODY3MTg4IDAgNC43MTA5MzgtMy44MjAzMTMgOC41MzUxNTYtOC41MzUxNTcgOC41MzUxNTZ6bTAgMCIgZmlsbD0iIzQ0ODJjMyIvPjxnIGZpbGw9IiNjYmIyOTIiPjxwYXRoIGQ9Im0xMTkuMTUyMzQ0IDI2Ny4yMTA5MzhjMS43NTM5MDYgMi40OTYwOTMgMi4wNDY4NzUgNS43MzQzNzQuNzY1NjI1IDguNS0xLjI3NzM0NCAyLjc2OTUzMS0zLjkzNzUgNC42NDA2MjQtNi45NzI2NTcgNC45MTc5NjgtMy4wMzkwNjIuMjczNDM4LTUuOTkyMTg3LTEuMDkzNzUtNy43NDYwOTMtMy41ODU5MzdsLTU3LjU2NjQwNy04MS41NzgxMjVjLTQuNS02LjM3ODkwNi0xMS4zNDc2NTYtMTAuNzE0ODQ0LTE5LjAzOTA2Mi0xMi4wNTg1OTQtNC43MTg3NS0uODA4NTk0LTkuNTY2NDA2LS40NzI2NTYtMTQuMTI4OTA2Ljk4MDQ2OSAxLjMyMDMxMi0xLjc2OTUzMSAyLjg1NTQ2OC0zLjM3NSA0LjU2NjQwNi00Ljc3NzM0NCAzLjgzNTkzOC0zLjA2NjQwNiA4LjM4NjcxOS01LjEyMTA5NCAxMy4yMjY1NjItNS45NzI2NTYgMy4zOTg0MzgtLjYzMjgxMyA2Ljg4MjgxMy0uNjQ4NDM4IDEwLjI4OTA2My0uMDUwNzgxIDcuNjk1MzEzIDEuMzQzNzUgMTQuNTM5MDYzIDUuNjc5Njg3IDE5LjAzOTA2MyAxMi4wNjY0MDZ6bTAgMCIvPjxwYXRoIGQ9Im02NS40NDkyMTkgODguODc1IDk2LjEyMTA5MyAxMzYuNDU3MDMxYzEuODU1NDY5IDIuNDg4MjgxIDIuMjE0ODQ0IDUuNzg1MTU3LjkzNzUgOC42MTMyODEtMS4yNzczNDMgMi44MzIwMzItMy45ODgyODEgNC43NDIxODgtNy4wODIwMzEgNC45OTYwOTQtMy4wOTM3NS4yNS02LjA3ODEyNS0xLjE5NTMxMi03LjgwMDc4MS0zLjc4MTI1bC05Ni4xMjUtMTM2LjQ1NzAzMWMtNC40ODA0NjktNi40MTc5NjktMTEuMzU1NDY5LTEwLjc2MTcxOS0xOS4wNzQyMTktMTIuMDU0Njg3LTQuNzczNDM3LS44MDQ2ODgtOS42NzU3ODEtLjQzNzUtMTQuMjczNDM3IDEuMDc0MjE4IDEuODYzMjgxLTIuMjQ2MDk0IDQtNC4yNSA2LjM1NTQ2OC01Ljk3MjY1NiA2LjM2MzI4Mi00LjQ3NjU2MiAxNC4yMzQzNzYtNi4yNTM5MDYgMjEuOTA2MjUtNC45NDkyMTkgNy43MDcwMzIgMS4zMDQ2ODggMTQuNTcwMzEzIDUuNjU2MjUgMTkuMDM1MTU3IDEyLjA3NDIxOXptMCAwIi8+PHBhdGggZD0ibTkxLjEwMTU2MiAyMi44OTQ1MzEgMjIuNjA1NDY5IDMyLjA5Mzc1IDM1LjYyNSA1MC42OTUzMTMgNjAuNDY4NzUgODUuNjk1MzEyYzEuNzUzOTA3IDIuNDkyMTg4IDIuMDQ2ODc1IDUuNzMwNDY5Ljc2OTUzMSA4LjQ5NjA5NC0xLjI4MTI1IDIuNzY5NTMxLTMuOTQxNDA2IDQuNjQwNjI1LTYuOTc2NTYyIDQuOTE3OTY5LTMuMDM1MTU2LjI3MzQzNy01Ljk4ODI4MS0xLjA5Mzc1LTcuNzQ2MDk0LTMuNTg1OTM4bC02MC40OTIxODctODUuNjkxNDA2LTM1LjYwMTU2My01MC42NjQwNjMtMjIuNjA1NDY4LTMyLjEyNWMtNy40ODgyODItMTAuNjA1NDY4LTIxLjAxNTYyNi0xNS4wODU5MzctMzMuMzU1NDY5LTExLjA1MDc4MSAxLjc2MTcxOS0yLjI5Njg3NSAzLjg2NzE4Ny00LjMxMjUgNi4yMzgyODEtNS45NzI2NTYgMTMuMzM5ODQ0LTkuMzA0Njg3IDMxLjY4NzUtNi4wODk4NDQgNDEuMDcwMzEyIDcuMTkxNDA2em0wIDAiLz48cGF0aCBkPSJtMzA5Ljc2MTcxOSAyMDQuNjcxODc1Yy0yLjczMDQ2OSA0Ljk1MzEyNS03LjQ2ODc1IDguNDg0Mzc1LTEzIDkuNjc1NzgxLTUuNTI3MzQ0IDEuMTkxNDA2LTExLjMwMDc4MS0uMDcwMzEyLTE1LjgyODEyNS0zLjQ2NDg0NC05Ljk4NDM3NS03Ljc3NzM0My0xOC42ODM1OTQtMTcuMDc4MTI0LTI1Ljc3NzM0NC0yNy41NjI1bC0xMDcuMzMyMDMxLTE1Mi4zNjMyODFjLTcuMzk4NDM4LTEwLjYwMTU2Mi0yMC44NDM3NS0xNS4xNDA2MjUtMzMuMTUyMzQ0LTExLjE5NTMxMiAxLjcxMDkzNy0yLjI2MTcxOSAzLjc2OTUzMS00LjI0MjE4OCA2LjEwMTU2My01Ljg1OTM3NSA2LjM4MjgxMi00LjQ5MjE4OCAxNC4yOTI5NjgtNi4yNTc4MTMgMjEuOTgwNDY4LTQuOTAyMzQ0IDcuNjg3NSAxLjM1OTM3NSAxNC41MTk1MzIgNS43MjI2NTYgMTguOTc2NTYzIDEyLjEyODkwNmwxMDcuMzU5Mzc1IDE1Mi4zNzEwOTRjNy4wOTc2NTYgMTAuNDc2NTYyIDE1Ljc5Njg3NSAxOS43NzM0MzggMjUuNzgxMjUgMjcuNTU0Njg4IDQuMjkyOTY4IDMuMTEzMjgxIDkuNjQ0NTMxIDQuNDE0MDYyIDE0Ljg5MDYyNSAzLjYxNzE4N3ptMCAwIi8+PC9nPjwvc3ZnPg==" class="hand-icon"/>,  */
?>